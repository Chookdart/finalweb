<?php
session_start(); // make sure session is started
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner</title>
    <link rel="stylesheet" href="css/style3.css">
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
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="users.php?id=<?= htmlspecialchars($_SESSION['user_id']) ?>">PROFILE TAB</a>
    <?php else: ?>
        <a href="login.php">LOGIN</a>
    <?php endif; ?>
  </div>
</div>

<div class="header-container">
    <h1>TRIP PLANNER✈️</h1>
</div>

<div class="large-container">
    <img src="pics/WolrdMap.png" alt="Description of image" class="large-container-image" />
</div>

<div class="container">
    <form method="POST" action="save_checkboxes.php">
    <div class="section">
        <h1>📍Destination</h1>
        <h3>Either select a region on the map above or type it into the fields below:</h3>
        <label for="city">City or closest major city</label>
        <input type="text" id="city" name="city">
        <label for="country">Country or Region</label>
        <input type="text" id="country" name="country">
        <p>---------------------------------------------------------------------------------------------------------------------------------------------------------</p>
    </div>

    <div class="section">
        <h1>🧗Activity</h1>
        <h3>Tell us what kinf of things you will be doing there :</h3>
        <div class="checkbox-group">
            <input type="checkbox" name="activity[]" value="Hiking"> Hiking
            <input type="checkbox" name="activity[]" value="Kayaking"> Kayaking
            <input type="checkbox" name="activity[]" value="Fishing"> Fishing
            <input type="checkbox" name="activity[]" value="Mountain Biking"> Mountain Biking
            <input type="checkbox" name="activity[]" value="Skiing"> Skiing
            <input type="checkbox" name="activity[]" value="Surfing"> Surfing
            <p>---------------------------------------------------------------------------------------------------------------------------------------------------------</p>
        </div>
    </div>

    <div class="section">
        <h1>💬Information</h1>
        <h3>What kind of information do you want from this trip : ? </h3>
        <div class="checkbox-group">
            <input type="checkbox" name="info[]" value="Transportation"> Transportation
            <input type="checkbox" name="info[]" value="Weather"> Weather
            <input type="checkbox" name="info[]" value="Political Info"> Political Info
            <input type="checkbox" name="info[]" value="Health"> Health
            <input type="checkbox" name="info[]" value="Gear"> Gear
            <input type="checkbox" name="info[]" value="Activity Specific"> Activity Specific
        </div>
    </div>

    <div class="section">
        <button type="submit">Submit</button>
    </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
    $('form').on('submit', function(e){
        e.preventDefault(); // Prevent form from submitting normally

        $.ajax({
            url: 'save_checkboxes.php', // Your PHP file that handles saving
            method: 'POST',
            data: $(this).serialize(), // Collects all form data
            success: function(response){
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Trip Saved!',
                    text: response.trim(),
                    timer: 40000,
                    showConfirmButton: false
                });

                // Optionally, reset the form
                $('form')[0].reset();
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was a problem saving your trip.'
                });
            }
        });
    });
});
</script>

</body>
</html>