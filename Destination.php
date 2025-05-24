<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Featured Destinations - Compass</title>
  <link rel="stylesheet" href="css/destination.css" />
</head>
<body>


  <div class="nav-bar">
  <div class="nav-left">
    <p id="logo">COMPASS</p>
    <img src="pics/comp.png" id="pic">
  </div>
  <div class="nav-center">
    <a href="TripPlanner.php">TRIP PLANNER</a>
    <a href="Destination.php">DESTINATIONS</a>
    <a href="TravelLog.php">TRAVEL LOGS</a>
    <input type="text" id="search" placeholder="Search for a section..." />
<button id="go" onclick="scrollToSection()">Go</button>
  </div>
</div>

  <div class="main">
    <div class="left-img">
      <img src="pics/airplane.jpg" alt="Airplane" />
    </div>

    <div class="content">
      <h2>Featured Destinations</h2>

      <div class="intro-box">
        Looking for a unique vacation experience? Let <strong>Compass</strong> be your guide. Each month we feature exotic locations selected by our expert travel guides.
      </div>

      <!-- Destination 1 -->
      <div class="destination-box section">
        <div class="destination-inner">
          <img src="pics/surfing.jpg" alt="Surfing Safari" />
          <div class="destination-info section">
            <h3>California Surfing Safari</h3>
            <p>Be ready to go on a moment's notice. We’ll call you when the surf is pumping and fly you out for rare mornings of sunshine-inspired summertime custom swells.</p>
            <p><strong>$960</strong> includes lodging, food, and airfare.</p>
            <a class="details-btn" href="#" onclick="toggleDetails('details1')">🔎 MORE DETAILS</a>
          </div>
        </div>
        <div id="details1" class="details-content">
          <strong>📅 Duration:</strong> 3 Days / 2 Nights<br>
          <strong>📝 Itinerary:</strong>
          <ul>
            <li>Day 1: Arrival & orientation in Malibu</li>
            <li>Day 2: Surfing lessons + beach bonfire</li>
            <li>Day 3: Sunrise surf session & farewell brunch</li>
          </ul>
          <strong>🏨 Accommodation:</strong> Oceanfront Surf Bungalows<br>
          <strong>🍽️ Meals:</strong> All meals included (Beach BBQ, fresh seafood)<br>
          <strong>🎯 Activities:</strong>
          <ul>
            <li>Surfing with pro instructors</li>
            <li>Board and wetsuit rental</li>
            <li>Optional sunrise yoga</li>
          </ul>
          <a href="travel-detail.html?trip=surf" class="see-more-btn" target="_blank">➡️ SEE MORE</a>

        </div>
      </div>

      <!-- Destination 2 -->
      <div class="destination-box section">
        <div class="destination-inner">
          <img src="pics/biking.jpg" alt="Bike New Zealand" />
          <div class="destination-info section">
            <h3>Bike New Zealand</h3>
            <p>Beautiful scenery combined with steep climbs and fast descents make this some of the world’s best riding.</p>
            <p><strong>$1490</strong> includes lodging and food.</p>
            <a class="details-btn" href="#" onclick="toggleDetails('details2')">🔎 MORE DETAILS</a>
          </div>
        </div>
        <div id="details2" class="details-content">
          <strong>📅 Duration:</strong> 5 Days / 4 Nights<br>
          <strong>📝 Itinerary:</strong>
          <ul>
            <li>Day 1: Arrival in Queenstown</li>
            <li>Days 2-4: Guided rides through Rotorua and Lake Taupō</li>
            <li>Day 5: Leisure ride & departure</li>
          </ul>
          <strong>🏨 Accommodation:</strong> Cozy mountain lodges<br>
          <strong>🍽️ Meals:</strong> Daily breakfast, trail lunches<br>
          <strong>🎯 Activities:</strong>
          <ul>
            <li>Mountain biking with expert guides</li>
            <li>Bike & helmet rental</li>
            <li>Evening campfire socials</li>
          </ul>
          <a href="traveldetail.php?trip=climb" class="see-more-btn" target="_blank">➡️ SEE MORE</a>

        </div>
      </div>

      <!-- Destination 3 -->
      <div class="destination-box section">
        <div class="destination-inner section">
          <img src="pics/rockclimb.jpg" alt="Devil’s Tower Rock Climb section" />
          <div class="destination-info section">
            <h3>Devil’s Tower Rock Climb</h3>
            <p>It’s the climb of a lifetime to scale the majestic columns of beautiful Devil’s Tower, Wyoming.</p>
            <p><strong>$740</strong> includes airfare and equipment rental.</p>
            <a class="details-btn" href="#" onclick="toggleDetails('details3')">🔎 MORE DETAILS</a>
          </div>
        </div>
        <div id="details3" class="details-content">
          <strong>📅 Duration:</strong> 2 Days / 1 Night<br>
          <strong>📝 Itinerary:</strong>
          <ul>
            <li>Day 1: Safety briefing & practice climb</li>
            <li>Day 2: Guided summit climb & photos</li>
          </ul>
          <strong>🏨 Accommodation:</strong> Campground at base with tent gear<br>
          <strong>🍽️ Meals:</strong> Campfire meals (dinner & breakfast)<br>
          <strong>🎯 Activities:</strong>
          <ul>
            <li>Beginner to expert climbing routes</li>
            <li>Gear rental (harness, helmet, ropes)</li>
            <li>Certified climbing instructor support</li>
          </ul>
          <a href="traveldetail.php?trip=climb" class="see-more-btn" target="_blank">➡️ SEE MORE</a>

      </div>
    </div>

    <div class="right-bar"></div>
  </div>

  <script>
    function toggleDetails(id) {
      const content = document.getElementById(id);
      content.classList.toggle("open");
    }
    function scrollToSection() {
    const query = document.getElementById('search').value.toLowerCase().trim();

    if (!query) {
        alert("Please enter a keyword.");
        return;
    }

    const sections = document.querySelectorAll('.section');
    let found = false;

    sections.forEach(section => {
        const text = section.textContent.toLowerCase();
        if (text.includes(query)) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            found = true;
        }
    });

    if (!found) {
        alert("Section not found.");
    }
}
  </script>

</body>
</html>