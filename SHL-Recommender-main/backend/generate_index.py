from sentence_transformers import SentenceTransformer
import pandas as pd
import faiss
import numpy as np
import os

csv_path = "/Users/sudo/Documents/GitHub/SHL-Recommender/data/assessments.csv"

# Check if the file exists and is not empty
if not os.path.exists(csv_path) or os.path.getsize(csv_path) == 0:
    raise ValueError("The file assessments.csv is missing or empty. Please populate it before running this script.")

# Load the CSV
df = pd.read_csv(csv_path)

# Ensure the required column exists
if 'name' not in df.columns:
    raise ValueError("The file assessments.csv does not contain the required 'name' column.")

# Generate embeddings and FAISS index
model = SentenceTransformer('all-MiniLM-L6-v2')
embeddings = model.encode(df['name'].tolist())

index = faiss.IndexFlatL2(embeddings.shape[1])
index.add(np.array(embeddings))

faiss.write_index(index, "shl_index.faiss")
df.to_pickle("shl_data.pkl")

print("✅ FAISS index and catalog saved.")
