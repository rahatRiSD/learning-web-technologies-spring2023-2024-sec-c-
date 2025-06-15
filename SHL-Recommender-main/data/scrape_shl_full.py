from playwright.sync_api import sync_playwright
from bs4 import BeautifulSoup
import pandas as pd
import requests

assessments = []

with sync_playwright() as p:
    browser = p.chromium.launch(headless=False)  # Set to True to run invisibly
    page = browser.new_page()

    print("🌐 Navigating to SHL catalog...")
    page.goto(
        "https://www.shl.com/solutions/products/product-catalog/",
        wait_until='networkidle',
        timeout=60000
    )

    # Scroll multiple times to load all content
    for _ in range(6):
        page.mouse.wheel(0, 10000)
        page.wait_for_timeout(3000)

    # Try waiting for one known element from a tile
    try:
        page.wait_for_selector("div.shl-card", timeout=10000)
        print("✅ Assessment tiles loaded.")
    except Exception:
        print("❌ Timeout: 'shl-card' elements did not appear.")
        content = page.content()
        with open("debug_page.html", "w", encoding="utf-8") as f:
            f.write(content)
        browser.close()
        exit()

    content = page.content()
    browser.close()

# Now use BeautifulSoup to parse all loaded HTML
soup = BeautifulSoup(content, "html.parser")
cards = soup.find_all("div", class_="shl-card")

print(f"🔍 Found {len(cards)} assessments")

# Extract and enrich metadata
for card in cards:
    try:
        name = card.find("div", class_="shl-card-title").text.strip()
        link = card.find("a")["href"]
        full_url = f"https://www.shl.com{link}"

        # Visit individual test page to extract more info
        res = requests.get(full_url)
        detail = BeautifulSoup(res.text, "html.parser")
        page_text = res.text.lower()

        # Extract fields
        duration = detail.find(string=lambda s: s and "minute" in s.lower())
        duration = duration.strip() if duration else "Unknown"

        adaptive = "Yes" if "adaptive" in page_text or "irt" in page_text else "No"
        remote = "Yes" if "remote" in page_text or "proctor" in page_text else "No"

        if any(kw in name.lower() for kw in ["cognitive", "reasoning", "logic"]):
            test_type = "Cognitive"
        elif any(kw in name.lower() for kw in ["personality", "behavior", "trait"]):
            test_type = "Personality"
        elif any(kw in name.lower() for kw in ["developer", "java", "python", "sql", "coding"]):
            test_type = "Technical"
        elif any(kw in name.lower() for kw in ["communication", "sales", "leadership"]):
            test_type = "Soft Skills"
        else:
            test_type = "Unknown"

        assessments.append({
            "name": name,
            "url": full_url,
            "remote_support": remote,
            "adaptive_support": adaptive,
            "duration": duration,
            "test_type": test_type
        })

        print(f"✅ {name}")

    except Exception as e:
        print(f"⚠️ Skipped one due to: {e}")
        continue

# Save the dataset
df = pd.DataFrame(assessments)
df.to_csv("assessments.csv", index=False)
print("📁 Saved to assessments.csv")
