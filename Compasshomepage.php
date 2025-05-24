<?php
session_start();
echo "Logged in user ID: " . ($_SESSION['user_id'] ?? 'Not set');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner</title>
    <style>
        body {  
            margin: 0;  
            font-family: Arial, sans-serif;  
            background-image: url('pics/Background.png'); 
            background-size: cover;  
            background-repeat: no-repeat; 
        }  
        .navbar {  
            display: flex;  
            justify-content: space-between;  
            align-items: flex-start;  
            background-color: #03679a;  
            padding: 10px;  
        }  

        .logo {  
            width: 300px;  
            height: auto;  
        }  

        .nav {  
            display: flex;  
            gap: 8px;  
        }  

        .nav img {  
            width: auto;  
            height: 50px;  
            cursor: pointer;  
            border: none;  
            border-radius: 4px;  
            transition: all 0.2s ease-in-out;  
        }  

        .nav img:hover {  
            border: 2px solid #444;  
        }  
        .welcome-container {
            background-color: rgb(247, 247, 247);
            padding: 50px;
            border-radius: 10px;
            margin: 40px;
            max-width: 57%;
            margin-top: 140px;
            margin-left: 150px;
            border: 2px solid #03679a;
        }
        .welcome h1 {
            font-size: 36px;
        }
        .welcome p {
            font-size: 18px;
            text-align: left;
            margin-left: 0;
            word-break: break-word;
        }

        .activities {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            background-color: rgb(255, 255, 255);
            padding: 120px;
            border-radius: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 20px 30px 30px 80px;
            max-width: 100%;
            margin-left: 150px;
            border: 2px solid #03679a;
        }

        .activity-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 60px;
            width: 150px;
            margin-right: 200px;
            margin-top: -105px;
            border-radius: 10px;
        }
        .activity-item img {
            max-width: 300px;
            height: auto;
        }
        .activity-title {
            color: #922900;
        }
        .featured-destination {
            position: absolute;
            right: 0;
            top: 18.5%;
            width: 500px;
            height: 74%;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            background-color: rgba(252, 230, 109, 0.925);
            padding: 30px;
            margin-right: 180px;
            border-radius: 10px;
            border: 2px solid #03679a;
        }
        .featured-destination img {
            width: 500px;
            height: auto;
        }
        .destination-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
        }
        .destination-details h2 {
            font-size: 20px;
            margin: 0;
        }
        .destination-details h2 {
            margin-top: 20px;
            margin-left: 180px; 
            font-size: 28px;
            color: #2c3e50; 
        }
        h2 {
            margin-left: 0; 
            font-size: 40px; 
            color: #922900; 
        }
        .destination-details p {
            font-size: 30px;
            margin: 0;
        }
        .details-button {
            margin-left: 120px;
        }
        .container-1 {
            margin-top: 8px;
            border-radius: 10px;
        }
        .container-2 {
            margin-top: 8px;
            border-radius: 10px;
        }
        .more-details-button {
            background-color: #03679a;
            color: white;
            padding: 30px 50px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 155px;
            font-size: 30px;
        }
       .nav-bar {
  position: relative; /* needed so the absolutely-positioned image stays within */
  background-color: #333;
  padding: 10px 2%;
  height: 60px; /* or adjust as needed */
  display: flex;
  align-items: center;
}

#logo {
  color: white;
  font-weight: bold;
  font-size: 1.5em;
  margin-right: 20px;
}

#pic {
  position: absolute;
  top: 10px;     /* move vertically from top */
  left: 160px;   /* move horizontally from left */
  width: 75px;   /* resize as needed */
  height: auto;
  pointer-events: none; /* optional: prevent interaction */
}

.nav-center {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 30px;
  font-size: 14px;
}

.nav-center a {
  color: white;
  text-decoration: none;
}

.nav-center a:hover {
  text-decoration: underline;
}


.nav-bar a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

    </style>
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
  </div>
</div>
 <div class="welcome-container">
        <div class="welcome">
            <h1>WELCOME TO COMPASS <img src="pics/comp.png" alt="Compass Icon" style="width: 70px; height: auto;" /></h1>
            <p>Currently we have over 1500 extreme adventures for you to drool over.<br>
               From surfing 40 foot waves in the middle of the ocean to fishing for piranha in the Amazon, we've got it all. So take your pick:
            </p>
        </div>
    </div>
    <div class="activities">
        <div class="activity-container">
            <div class="activity-item">
                <h2>Learn More About !</h2>
                <h3 class="activity-title">Fly Fishing in the Rocky Mountains</h3>
                <img src="pics/Fishing.jpg" alt="Fly Fishing in the Rocky Mountains" />
                <p>You'll get a seasoned guide and lots of dehydrated ravioli.</p>
            </div>
        </div>
        <div class="activity-container">
            <div class="activity-item">
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <h3 class="activity-title">Level 5 Rapids!</h3>
                <Br>
                <img src="pics/Rapids.jpg" alt="Level 5 Rapids" />
                <Br>
                <p>Put your helmet on and grab your wetsuit. It's time to conquer Siberia.</p>
            </div>
        </div>
        <div class="activity-container">
            <div class="activity-item">
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <Br>
                <h3 class="activity-title">Puget Sound Kayaking</h3>
                <Br>
                <img src="pics/Kayaking.jpg" alt="Puget Sound Kayaking" />
                <Br>
                <Br>
                <p>One week of ocean kayaking in the Puget Sound.</p>
            </div>
        </div>
    </div>
    <div class="featured-destination">
        <h2 style="margin-left: 0;">FEATURED DESTINATION</h2>
        <div class="destination-content">
            <img src="pics/Yosemite.png" alt="Featured Destination" />
            <div class="destination-details">
                <h2>Yosemite</h2>
                <div class="container-1"></div>
                <div class="container-2">
                    <h3>Bali is a beautiful island known for its forested volcanic mountains, iconic rice paddies, beaches and coral reefs.</h3>
                     <button class="more-details-button">More Details</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>