import streamlit as st
import requests
import pandas as pd

st.set_page_config("SHL RAG Recommender", layout="centered")
st.title("🤖 SHL GenAI Assessment Recommender")

query = st.text_area("Enter a job description or hiring requirement:")

if st.button("Recommend"):
    if not query.strip():
        st.warning("Please enter something first.")
    else:
        with st.spinner("Thinking..."):
            res = requests.post("http://localhost:8000/recommend", json={"query": query})
            data = res.json()

            st.subheader("🔍 Top Retrieved Assessments")
            df = pd.DataFrame(data["recommendations"])
            st.dataframe(df)

            st.subheader("💡 AI-Powered Recommendation")
            st.markdown(data["generated_answer"])
