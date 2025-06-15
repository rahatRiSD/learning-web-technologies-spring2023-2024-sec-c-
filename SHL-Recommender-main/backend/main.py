from fastapi import FastAPI
from pydantic import BaseModel
import pandas as pd
import faiss
import numpy as np
from sentence_transformers import SentenceTransformer
import httpx
import os
from dotenv import load_dotenv

load_dotenv()
GEMINI_API_KEY = os.getenv("GEMINI_API_KEY")

app = FastAPI()
model = SentenceTransformer('all-MiniLM-L6-v2')
df = pd.read_pickle("shl_data.pkl")
index = faiss.read_index("shl_index.faiss")

class QueryRequest(BaseModel):
    query: str

@app.get("/healthcheck")
def health():
    return {"status": "ok"}

@app.post("/recommend")
async def recommend(query_data: QueryRequest):
    query = query_data.query
    query_embedding = model.encode([query])
    D, I = index.search(np.array(query_embedding), 10)
    retrieved = df.iloc[I[0]].to_dict(orient="records")

    prompt = f"""
You are an SHL assessment advisor.
The recruiter wrote: "{query}"

Based on this, choose the best 3–5 assessments from this list:
{retrieved}

Explain your reasoning in simple bullet points.
"""

    async with httpx.AsyncClient() as client:
        response = await client.post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent",
            params={"key": GEMINI_API_KEY},
            json={"contents": [{"parts": [{"text": prompt}]}]}
        )
        answer = response.json()['candidates'][0]['content']['parts'][0]['text']

    return {"recommendations": retrieved, "generated_answer": answer}
