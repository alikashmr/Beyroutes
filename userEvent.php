<?php
session_start();
include('../database/connection.php');
$_SESSION['current_page'] = 'event_selection'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   
    <script type="text/javascript" src="search.js"></script>
    <link rel="stylesheet" href="../css/stylesheet4.css" type="text/css">
    <link rel="stylesheet" href="../css/stylesheet2.css" type="text/css"> 
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/searchstyle.css" type="text/css">
    <script src="https://kit.fontawesome.com/6d1315b1ea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="/jquery.countTo.js"></script>

  

    <title><?php echo $_SESSION['username'] ?></title>
  
</head>


<body>
    <div class="header" style="height: 200px" >
      <div class="navbar1" style="background: rgba(0, 0, 0, 0.9); text-align: start;">
     

        
        <a href="#"><i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['username'] ?></a>
        <a href="../user/userAct.php">Activity</a>
        <a href="../user/userHotel.php">Hotels</a>
        <a href="../user/userRest.php">Restaurants</a>
        <a href="#">Events</a>
        <a href="../user/eventBookings.php">Bookings</a>
        <a href="logout.php">Logout</a>
       
      </div>
    </div>

    <form action="userSearch.php" method="post">
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
              <a class="book-now text-center" data-Event-id="' . $row["eventId"] .' "  onclick="addReservation()"><i class="ti-calendar"></i> Book Now </a>



            </div>
          </div> ';
         }

      $con->close();
      ?> 
       
       
    </div>
   </div>
  </div>
 

      
 
      

      

  


   
    <form id="reservationForm" action="reserveEvent.php" method="POST">
      <div id="modalContainer" class="window">
          <div class="window-content">
              <span class="close-b" onclick="removeReservation()">&times;</span>
              <h2 style= "text-align: center">Make Your Reservation</h2>
              <div class="persons">
                <div class="elem-group inlined">
                  <label for="guests">Guests</label>
                  <input type="number" id="guests" name="guests" placeholder="nb of guests" min="1" required>
                  <input type="hidden" id="eventIdInput" name="eventId">
                </div>

                
            <div class="submission">
                <button type="submit">Book Now</button>
            </div>
          </div>
      </div>
    </form> 

   
        


    

  

    

    

</body>
</html>


<script>

function addReservation(){
  document.getElementById('modalContainer').style.display = 'block';
}

function removeReservation() {
    document.getElementById('modalContainer').style.display = 'none';
};

// Close modal if clicked outside the modal content
window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('modalContainer')) {
        document.getElementById('modalContainer').style.display = 'none';
    }
});

document.querySelectorAll('.book-now').forEach(a => {
    a.addEventListener('click', function() {
        let hotelId = this.getAttribute('data-Event-id');
        document.getElementById('eventIdInput').value = hotelId;

        
        
    });
});
</script>




<style>

.desc p {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: #41464b;
}

 .book-now {
  color: #fff;
  padding: 12px 0;
  transition: 0.1s;
  position: relative;
  display: block;
  margin-left: auto;
  text-decoration: none;
  border-radius: 10px;
  background: hsl(215, 100%, 50%);
 
}

.book-now:hover{
  background-color: hsl(215, 50%, 50%);
  color: white;

}


 

  .window {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    z-index: 1000;
}

.window-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 35%;
    z-index: 1001;
}

.close-b {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    z-index: 1002;
}

.book-now{
  cursor: pointer;
}
  
input, select, textarea {
  border-radius: 25px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  width: 100%;
  padding: 8px;
  background-color: #dedede;
  color:  black;
  margin-bottom: 12px;
}

label {
    display: block;
    font-family: 'Raleway', sans-serif;
    padding-bottom: 10px;
    font-size: 1.25em;
    color: black;
}

::placeholder{
  color: #041725;    
  font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}


div.elem-group {
  margin: 10px 0;
}

div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
}

button {
    height: 60px;
    width: 100%;
    color: #fff;
    background-image: linear-gradient(#041725, #191997);
    font-weight: 700;
    padding: 10px 30px;
    
    border-radius: 40px;
    border: none;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1.3px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}


</style>