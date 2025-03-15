<?php
session_start();
include('../database/connection.php');
?>

<!doctype html>
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
        <a href="../database/events.php">Events</a>
        <a href="../user/Login.php">Login</a>
        
      </div>
      
    </div>

    

    <?php
    if (isset($_SESSION['current_page'])) {
      switch ($_SESSION['current_page']) {

        case 'hotel_selection': {

          $search = $_POST['search'];
          $sql = "select * from hotels where hotelname like '%$search%'";
          $result = $con->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc() ){
              $locationUrl = trim($row["location"]); // Location URL
        
              echo '
              <div class="feature-full-1col co-md-4" style="margin-bottom: 50px">
                <div class="image" style="background-image: url(../uploads/' . $row["picture"] .' ); height: 23em">
                  <div class="descrip text-center">
                    <p><small>For as low as</small><span>$200/night</span></p>
                  </div>
                </div>
                <div class="desc" style="height: 23em";>
                  <h3 style="text-align: left; margin-top: 10px"  >'.$row['hotelname'].'</h3>
                  <p>'.$row['description'].' </p>
                  <h3 style="text-align: left"> <span style="color: red">&#x260E</span> '.$row['phone_nb'].'</h3>
                  <p><img src="../images/map.png" alt="Location Icon" style="width:22px;height:22px;margin-right:5px;"><a href="' . htmlspecialchars($locationUrl) . '" target="_blank">' . htmlspecialchars($locationUrl) . '</a></p>
                  <hr>
                  <p <span style="color: grey">From</span> <span style="font-style: normal; font-weight: 700;font-size: 16px;
                  line-height: 26px;color: black; margin-left: 8px;">' .$row['price'].'</span> </p><br>
                  <a class="book-now text-center" href="../user/Login.php"><i class="ti-calendar"></i> Book Now</a>
    
                </div>
              </div> ';
            }
          }
        
          break;
    
              
            }
      
    
          case 'activity_selection': {
          $search = $_POST['search'];
          $sql = "select * from activity where title like '%$search%'";
          $result = $con->query($sql);

         if ($result->num_rows > 0){
            while($row = $result->fetch_assoc() ){
	           $locationUrl = trim($row["location"]); // Location URL
    
            echo '
              <div class="feature-full-1col co-md-4" style="margin-bottom: 50px" data-name='.$row['title'].'>
                <div class="image" style="background-image: url(../uploads/' . $row["picture"] .' ); height: 23em">
              
                </div>
                <div class="desc" style="height: 23em";>
                  <h3 style="text-align: left; margin-top: 10px"  >'.$row['title'].'</h3>
                  <p>'.$row['description'].' </p>
                  <h3 style="text-align: left"> <span style="color: red">&#x260E</span> '.$row['phone_nb'].'</h3>
                  <p><img src="../images/map.png" alt="Location Icon" style="width:22px;height:22px;margin-right:5px;"><a href="' . htmlspecialchars($locationUrl) . '" target="_blank">' . htmlspecialchars($locationUrl) . '</a></p>
                  <hr>
                  <p style="display: flex; gap: 15px; font-family: cursive; font-style: normal; font-weight: 700;font-size: 16px;line-height: 26px;color: var(--link-color);"><span><img src="../images/clock.jpg" style=" height: 18px;vertical-align: middle;margin-right: 5px;" alt="Clock Icon">'
                  . $row["opening_time"] . ' <span>AM</span></span>---><span> ' . $row["closing_time"] . ' <span>PM</span></span></p>
              
                  <p <span style="color: grey">From</span> <span style="font-style: normal; font-weight: 700;font-size: 16px;
                  line-height: 26px;color: black; margin-left: 8px;">' .$row['price'].'</span> </p>

                </div>
                </div> ';
          
           }
         }

         break;
   
        }


        case 'restaurant_selection': {
          $search = $_POST['search'];
          $sql = "select * from restaurant where restaurantName like '%$search%'";
          $result = $con->query($sql);

         if ($result->num_rows > 0){
            while($row = $result->fetch_assoc() ){
	           $locationUrl = trim($row["location"]); // Location URL
             $menuUrl = trim($row["menu"]); // Location URL
    
             echo '
               <div class="feature-full-1col co-md-4" style="margin-bottom: 50px">
                 <div class="image" style="background-image: url(../uploads/' . $row["picture"] .' ); height: 23em">
                   <div class="descrip text-center">
                     <p><small>For as low as</small><span>$200/night</span></p>
                   </div>
                 </div>
                 <div class="desc" style="height: 23em";>
                   <h3 style="text-align: left; margin-top: 10px"  >'.$row['restaurantName'].'</h3>
                   <p>'.$row['description'].' </p>
                   <h3 style="text-align: left"> <span style="color: red">&#x260E</span> '.$row['phone_nb'].'</h3>
                   <p><img src="../images/map.png" alt="Location Icon" style="width:22px;height:22px;margin-right:5px;">
                   <a href="' . htmlspecialchars($locationUrl) . '" target="_blank">' . htmlspecialchars($locationUrl) . '</a></p>
     
                   <p><img src="../images/menu3.png" alt="Location Icon" style="width:22px;height:22px;margin-right:5px;">
                   <a href="' . htmlspecialchars($menuUrl) . '" target="_blank">' . htmlspecialchars($menuUrl) . '</a></p>
                   <hr>
                   <p style="display: flex; gap: 15px; font-family: cursive; font-style: normal; font-weight: 700;font-size: 16px;line-height: 26px;color: var(--link-color);"><span><img src="../images/clock.jpg" style=" height: 18px;vertical-align: middle;margin-right: 5px;" alt="Clock Icon">'
                    . $row["opening_time"] . ' <span>AM</span></span><span> ' . $row["closing_time"] . ' <span>PM</span></span></p>
     
                   
     
                 </div>
               </div> ';
          
           }
         }

         break;
   
        }

        case 'event_selection': {
          $search = $_POST['search'];
          $sql = "select * from events where eventName like '%$search%'";
          $result = $con->query($sql);

         if ($result->num_rows > 0){
            while($row = $result->fetch_assoc() ){
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
         }

         break;
   
        }

        default:
        echo "Invalid search type";
        break;

      }
      
    }
        ?>
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