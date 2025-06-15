import scrapy
from scrapy_playwright.page import PageMethod

class ShlCatalogSpider(scrapy.Spider):
    name = "shl_catalog"
    start_urls = ["https://www.shl.com/solutions/products/product-catalog/"]

    custom_settings = {
        "PLAYWRIGHT_PAGE_METHODS": [
            # Scroll to bottom multiple times
            PageMethod("evaluate", "(async () => { for(let i=0;i<6;i++){ window.scrollBy(0, document.body.scrollHeight); await new Promise(r => setTimeout(r, 1500)); } })()"),
        ],
        "FEEDS": {
            "assessments.csv": {
                "format": "csv",
                "overwrite": True
            }
        },
        "PLAYWRIGHT_DEFAULT_NAVIGATION_TIMEOUT": 60000
    }

    async def parse(self, response):
        cards = response.css("div.shl-card")

        self.logger.info(f"📦 Found {len(cards)} cards")

        for card in cards:
            name = card.css("div.shl-card-title::text").get(default="").strip()
            link = card.css("a::attr(href)").get()
            full_url = response.urljoin(link)
            yield {
                "name": name,
                "url": full_url,
                "remote_support": "Yes",  # You can refine this later
                "adaptive_support": "Yes",
                "duration": "30 mins",
                "test_type": "Unknown"
            }
