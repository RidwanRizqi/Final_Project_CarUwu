const newsTitleArray = [
    "Tesla's vegan leather supplier bets material will be used everywhere",
    "Ford says top Lincoln dealers face $900,000 bill to sell EVs",
    "BMW, Amazon Web Services collaborate on vehicle data software"
]

const newsDateArray = [
    "October 14, 2022 07:14 AM",
    "October 14, 2022 10:33 AM",
    "October 13, 2022 02:55 PM"
]

const newsContentArray = [
    "<p>For Ultrafabrics Holdings Co. supplying seating material to Tesla Inc., United Airlines Holdings Inc. and\n" +
    "    furniture makers isn't just good for the environment, it's a potentially lucrative, though challenging,\n" +
    "    business.</p>\n" +
    "<p>The goal for Noboru Yoshimura, 60, president of the Tokyo-based manufacturer, is to make the company's name\n" +
    "    synonymous with synthetic leather. \"More and more people are using our leather,\" he said in an interview.\n" +
    "    \"We're consciously developing premium products, and that strategy is in line with the times.\"</p>\n" +
    "<p>For years, leather made from processed cowhides or sheepskin was seen as a premium option for car buyers.\n" +
    "    Now, environmentally conscious consumers are seeking out products that don't involve the slaughter of animals,\n" +
    "    such as plant-based meat. Airlines are turning to the leather-like material to take advantage of their lower\n" +
    "    weight to save on fuel and reduce carbon emissions. As a result, the global synthetic leather market is on track\n" +
    "    to reach $67.2 billion by 2030, according to Straits Research.</p>\n" +
    "<p>Investors appear to agree on the opportunity for Ultrafabrics, which hasn't fully disclosed its list of\n" +
    "    customers and declined to comment. Cleantechnica last year reported that Ultrafabrics is a Tesla supplier,\n" +
    "    citing a Tesla Owners Group. Ultrafabrics lists United Airlines, among other airlines, as their client.</p>\n" +
    "<p>After a brutal year in 2020, when the pandemic wreaked havoc on the global auto industry, the company's stock\n" +
    "    has quintupled as sales and profitability recovered. Ultrafabrics is forecasting operating profit of $18.7\n" +
    "    million on sales of $126 million for the fiscal year through March, while analysts, on average, are projecting\n" +
    "    profit of $20 million and $129 million yen in revenue. In its previous incarnation, Ultrafabrics was Daiichi Kasei,\n" +
    "    a materials supplier that created a material that is strong, resilient and lightweight, while soft like genuine leather.\n" +
    "    Four layers are weaved together to create a leather-like texture, combining a back cloth, a form, cushion layer and\n" +
    "    a final protective film.</p>\n" +
    "<p>While vegan leather may appeal to consumers and help reduce weight penalties for airlines, the majority of\n" +
    "    the material is made from plastic-based polyurethane chloride and polyurethane, raising questions whether\n" +
    "    production and disposal is good for the environment. Some variants using cork, bark, or apple peel, do exist.</p>\n" +
    "<p>After merging in 2017 with U.S.-based Ultrafabrics, the combined entity changed its name and kept its listing\n" +
    "    in Japan. The legacy operations of Daiichi Kasei are the manufacturing backbone, while what was originally\n" +
    "    Ultrafabrics oversees marketing and sales.</p>",
    "<p>Lincoln dealers that are on board with the navbar’s EV plans face a hefty upgrade bill. Automotive News reports that Lincoln dealers wanting to sell the navbar’s EVs will have to drop $900,000 on upgrades to their dealerships.</p>\n" +
    "<p>Despite EV plans that still aren’t quite clear and a business strategy that shows that China is its priority, Lincoln says the EVs are coming. But they’re still three years out, with three models supposedly hitting showrooms in 2025. Despite this, Lincoln wants dealer owners to start getting ready for these vehicles. According to navbar executives, it’s no biggie that they actually don’t have the vehicles to sell now: “...executives say they need to prepare now to woo younger buyers who its research shows are open to luxury EVs.” But you actually have to have EVs to sell for people to be wooed by them… anyway.</p>\n" +
    "<p>Dealers that feature both Ford and Lincoln stores have it slightly worse. They have to make their EV investments separately. Remember, Ford dealers have to drop $1.2 million to upgrade their dealerships, meaning a Ford/Lincoln dealer will have to spend a total of over $2 million if it wants to sell EVs from both brands.</p>\n" +
    "<p>Dealers have until December 15 to make the decision on the investments. If they don’t, they have to wait until the next enrollment period in late 2026.</p>",
    "<p>Amazon Web Services, Inc. (AWS), an Amazon.com, Inc. company (NASDAQ: AMZN), and the BMW Group today announced a strategic collaboration to develop customizable cloud software that will simplify the distribution and management of data from millions of connected vehicles. The BMW Group will be the first automaker to use the software, which will serve as the basis for its next-generation, cloud-based vehicle data platform. Moving forward, the new software will be available to other automakers, enabling them to easily integrate vehicle data sources, accelerate vehicle and fleet application feature development, and improve life cycle management, while delivering advanced vehicle features and more personalized driver experiences at lower costs.</p>\n" +
    "<p>“We have 20 million connected vehicles on the road today. With the launch of the ‘Neue Klasse,’ BMW’s next generation of vehicles, our offboard cloud platform, powered by AWS, will process roughly triple the volume of vehicle data compared to the current generation of BMW models,” said Nicolai Krämer, vice president of Vehicle Connectivity Platforms at the BMW Group. “Together with AWS, we will continue to create innovative solutions that enable us to develop and deliver new data-driven functions to customers worldwide, even faster.”</p>\n" +
    "<p>The BMW Group and AWS co-developed solution ingests BMW vehicle signals and fleet intelligence data, and it securely processes and routes the data in the cloud. Using AWS’s cloud infrastructure and its industry-leading security, the BMW Group ensures that its customer data is protected and processed in accordance with data privacy requirements and customer preferences. Only the BMW Group’s internal domain experts—vehicle application developers, fleet managers, data scientists, and artificial intelligence, business intelligence, and development engineers—gain access to the data via a self-service mechanism that gathers streaming vehicle data, easily adds new data sources, configures access in accordance with governance policies, and monitors the quality and health of streaming sources. The data is then combined with AWS capabilities, including analytics, machine learning, database, storage, and compute, enabling the BMW Group experts to create new vehicle features and applications.</p>\n" +
    "<p>“Rapid, data-fueled innovation is critical to unlocking next-generation vehicle capabilities for automotive organizations, particularly as the industry looks to expand electric vehicle adoption, software-defined vehicle development, new digital service paradigms, and more autonomous vehicle features,” said Sarah Cooper, general manager of AWS Industry Products at Amazon Web Services, Inc. “By teaming up with the BMW Group, we are building infrastructure today that will generate value for the next generation of vehicles. Together, we are excited to make the vision of software-defined transportation a reality and to enhance the capabilities of vehicles on the road.”</p>\n"
]


let newsTitle = document.querySelector('.news-title');
let newsDate = document.querySelector('.news-date');
let newsImg = document.querySelector('.news-img');
let newsContent = document.querySelector('.news-content');

switch (localStorage.getItem("news")) {
    case "news1":
        newsTitle.innerHTML = newsTitleArray[0];
        newsDate.innerHTML = newsDateArray[0];
        newsImg.src = "img/news/news1.png";
        newsContent.innerHTML = newsContentArray[0];
        break;
    case "news2":
        newsTitle.innerHTML = newsTitleArray[1];
        newsDate.innerHTML = newsDateArray[1];
        newsImg.src = "img/news/news2.png";
        newsContent.innerHTML = newsContentArray[1];
        break;
    case "news3":
        newsTitle.innerHTML = newsTitleArray[2];
        newsDate.innerHTML = newsDateArray[2];
        newsImg.src = "img/news/news3.png";
        newsContent.innerHTML = newsContentArray[2];
}


clickNews();