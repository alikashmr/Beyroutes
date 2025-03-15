<?php
session_start();
include('../database/connection.php');
$_SESSION['current_page'] = 'event_selection'; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/stylesheet4.css" type="text/css">
    <link rel="stylesheet" href="../css/stylesheet2.css" type="text/css"> 
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/searchstyle.css" type="text/css">
    <script src="https://kit.fontawesome.com/6d1315b1ea.js" crossorigin="anonymous"></script>
    <script src="/jquery.countTo.js"></script>

    <title>BeyRoutes</title>
  </head>
  <body>
    <div class="bar1">
     <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
       <div class=" menu-bar p-4">
        <a href="#">Home</a>
        <a href="hotel.html">Hotels</a>
        <a href="services.html">Services</a>
        <a href="Login.php"> Login</a>
        
       </div>
     </div>
     <nav class="navbar navbar-dark">
       <div class="container-fluid">
         <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" fdprocessedid="hdxnp">
           <span class="navbar-toggler-icon"></span>
         </button>
       </div>
     </nav>
   </div>
    

    <div class="header" style="height: 200px" >
      <div class="navbar1" style="background: rgba(0, 0, 0, 0.9);">
        <span class="log" style="margin-right: 42%; font-weight: bold;" ><span class="luxe">Bey</span> Routes</span>

        
        <a href="../html/home.html">Home</a>
        <a href="../database/activity.php">Activity</a>
        <a href="../database/hotels.php">Hotels</a>
        <a href="../database/restaurant.php">Restaurants</a>
        <a href="#">Events</a>
        <a href="../user/Login.php">Login</a>
        
      </div>
      
    </div>

    <form action="search.php" method="post">
      <div id="search">
	    <svg  viewBox="0 0 420 60" xmlns="http://www.w3.org/2000/svg">
		  <rect class="bar"/>
		
		  <g class="magnifier">
			 <circle class="glass"/>
		 	 <line class="handle" x1="32" y1="32" x2="44" y2="44"></line>
		  </g>

		  <g class="sparks">
			 <circle class="spark"/>
			 <circle class="spark"/>
			 <circle class="spark"/>
		  </g>

		  <g class="burst pattern-one">
			 <circle class="particle circle"/>
			 <path class="particle triangle"/>
			 <circle class="particle circle"/>
			 <path class="particle plus"/>
			 <rect class="particle rect"/>
			 <path class="particle triangle"/>
		</g>
		 <g class="burst pattern-two">
			<path class="particle plus"/>
			<circle class="particle circle"/>
			<path class="particle triangle"/>
			<rect class="particle rect"/>
			<circle class="particle circle"/>
			<path class="particle plus"/>
		</g>
		 <g class="burst pattern-three">
			<circle class="particle circle"/>
			<rect class="particle rect"/>
			<path class="particle plus"/>
			<path class="particle triangle"/>
			<rect class="particle rect"/>
			<path class="particle plus"/>
		 </g>
	  </svg>

	  <input type=search name=search aria-label="Search for inspiration"/>
    <input type ="submit" style="margin-top: 100px; display: none;">
   </form>
 </div>

 <div id="results">
 </div>

 <div id="featured-hotel" style="margin-top: 10%" >
      <div class="container1">
      <div class="row">

       <?php
        $sql = "SELECT * FROM events";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) {
          $locationUrl = trim($row["location"]); // Location URL
    
        echo '
          <div class="feature-full-1col co-md-4" style="margin-bottom: 50px">
            <div class="image" style="background-image: url(../uploads/' . $row["picture"] .' ); height: 23em">
              <div class="descrip text-center">
                <p><small>For as low as</small><span>$200/night</span></p>
              </div>
            </div>
            <div class="desc" style="height: 25em";>
              <h3 style="text-align: left; margin-top: 10px"  >'.$row['eventName'].'</h3>
              <p>'.$row['description'].' </p>
              <h3 style="text-align: left"> <span style="color: red">&#x260E</span> '.$row['phone_nb'].'</h3>
              <p><img src="../images/map.png" alt="Location Icon" style="width:22px;height:22px;margin-right:5px;"><a href="' . htmlspecialchars($locationUrl) . '" target="_blank">' . htmlspecialchars($locationUrl) . '</a></p>
              <hr>
              <p style="display: flex; gap: 15px; font-family: cursive; font-style: normal; font-weight: 700;font-size: 16px;line-height: 26px;color: var(--link-color);"><span><img src="../images/clock.jpg" 
              style=" height: 18px;vertical-align: middle;margin-right: 5px;" alt="Clock Icon">'
               . $row["time"] . '</p>

              <p <span style="color: grey">From</span> <span style="font-style: normal; font-weight: 700;font-size: 16px;
              line-height: 26px;color: black; margin-left: 8px;">' .$row['price'].'</span> </p>
              <a class="book-now text-center" href="../user/Login.php"><i class="ti-calendar"></i> Book Now</a>



            </div>
          </div> ';
         }

      $con->close();
      ?> 
    </div>
  </div>
  




 </body>
</html>


<style>
.desc p {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: #41464b;
}

.book-now {
  color: #fff;
  padding: 10px 0;
  background: hsl(215, 100%, 50%);
  transition: 0.1s;
  position: relative;
  display: block;
  margin-left: auto;
  text-decoration: none;
  border-radius: 10px;
 
}

.book-now:hover{
  background-color: hsl(215, 50%, 50%);
  color: white;

}


</style>



