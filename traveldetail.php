<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Trip Details - Compass</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fdfdfd;
      color: #333;
    }

    .top-bar {
      background-color: #000080;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .main {
      display: flex;
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
      gap: 20px;
    }

    .container {
      flex: 3;
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      flex: 1;
      background-color: #ffcc66;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .trip-image {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    h2 {
      color: #cc6600;
      margin-top: 10px;
    }

    .section {
      margin-top: 20px;
    }

    .section h3 {
      margin-bottom: 5px;
      color: #333;
    }

    ul {
      margin-top: 0;
      padding-left: 20px;
    }

    .highlight {
      background-color: #ffffcc;
      border-left: 4px solid orange;
      padding: 10px;
      margin-top: 15px;
      border-radius: 5px;
    }

    .package-box {
      background-color: #005ea6;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .package-box h4 {
      margin: 0 0 10px 0;
    }

    .package-icons {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

    .package-icons div {
      background-color: #ff9900;
      padding: 5px;
      border-radius: 3px;
      text-align: center;
      font-weight: bold;
    }

    .photo-box {
      background: #fff;
      border: 1px solid #a00;
      padding: 10px;
      text-align: center;
    }

    .photo-box img {
      width: 60px;
    }

    .photo-box h5 {
      margin: 10px 0 5px 0;
      color: #a00;
    }
  </style>
</head>
<body>

  <div class="top-bar">Compass Travel Details</div>

  <div class="main">
    <!-- Sidebar now comes first -->
    <div class="sidebar">
      <div class="package-box">
        <h4>Package Includes:</h4>
        <div class="package-icons">
          <div>✈ AIRFARE</div>
          <div>🏨 LODGING</div>
          <div>🍽 FOOD</div>
          <div>👨‍✈️ LOCAL GUIDE</div>
        </div>
      </div>

      <div class="photo-box">
        <img src="camera_icon.png" alt="Camera icon" />
        <h5>Other Things To Do:</h5>
        <p>Take a look at our slide show. We've got several snapshots of the area around your hotel, including great places to eat, drink, or just hang out.</p>
      </div>
    </div>

    <!-- Trip content is now on the right -->
    <div class="container" id="trip-content">
      <!-- Trip details will be injected here -->
    </div>
  </div>

  <script>
    const trips = {
      surf: {
        title: "California Surfing Safari",
        image: "pics/surfing.jpg",
        duration: "3 Days / 2 Nights",
        itinerary: [
          "Day 1: Arrival & orientation in Malibu",
          "Day 2: Surfing lessons + beach bonfire",
          "Day 3: Sunrise surf session & farewell brunch"
        ],
        accommodation: "Oceanfront Surf Bungalows",
        meals: "Beach BBQ, fresh seafood, all meals included",
        activities: [
          "Surfing with pro instructors",
          "Board and wetsuit rental",
          "Optional sunrise yoga"
        ],
        includes: "Lodging, food, airfare, equipment rental",
        price: "$960"
      },
      bike: {
        title: "Bike New Zealand",
        image: "pics/biking.jpg",
        duration: "5 Days / 4 Nights",
        itinerary: [
          "Day 1: Arrival in Queenstown",
          "Days 2–4: Guided rides through Rotorua and Lake Taupō",
          "Day 5: Leisure ride & departure"
        ],
        accommodation: "Cozy mountain lodges",
        meals: "Daily breakfast, trail lunches",
        activities: [
          "Mountain biking with expert guides",
          "Bike & helmet rental",
          "Evening campfire socials"
        ],
        includes: "Lodging, food, bike gear, guide services",
        price: "$1490"
      },
      climb: {
        title: "Devil’s Tower Rock Climb",
        image: "pics/rockclimb.jpg",
        duration: "2 Days / 1 Night",
        itinerary: [
          "Day 1: Safety briefing & practice climb",
          "Day 2: Guided summit climb & photos"
        ],
        accommodation: "Campground at base with tent gear",
        meals: "Campfire meals (dinner & breakfast)",
        activities: [
          "Beginner to expert climbing routes",
          "Certified climbing instructors",
          "Gear rental (harness, helmet, ropes)"
        ],
        includes: "Airfare, equipment, instructor support",
        price: "$740"
      }
    };

    const params = new URLSearchParams(window.location.search);
    const tripKey = params.get("trip");
    const trip = trips[tripKey];

    if (trip) {
      document.getElementById("trip-content").innerHTML = `
        <img class="trip-image" src="${trip.image}" alt="${trip.title}" />
        <h2>${trip.title}</h2>
        <div class="section"><strong>📅 Duration:</strong> ${trip.duration}</div>
        <div class="section"><h3>📝 Itinerary:</h3><ul>${trip.itinerary.map(item => `<li>${item}</li>`).join('')}</ul></div>
        <div class="section"><strong>🏨 Accommodation:</strong> ${trip.accommodation}</div>
        <div class="section"><strong>🍽️ Meals:</strong> ${trip.meals}</div>
        <div class="section"><h3>🎯 Activities:</h3><ul>${trip.activities.map(item => `<li>${item}</li>`).join('')}</ul></div>
        <div class="section highlight"><strong>💼 Package Includes:</strong> ${trip.includes}</div>
        <div class="section highlight"><strong>💵 Price:</strong> ${trip.price}</div>
      `;
    } else {
      document.getElementById("trip-content").innerHTML = "<p>Sorry, trip not found.</p>";
    }
  </script>

</body>
</html>