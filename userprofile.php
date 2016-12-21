<?php 
require('includes/config.php'); 

//include header template
require('layout/header.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
 

//define page title
$title = 'User Profile';

require('layout/header.php');

?>

<div id="wrapper">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2> <?php echo $_SESSION['username']; ?>`s Profile </h2>
        <div id="menu">
          <ul>
            <li><a href='memberpage.php'>Members Page</a></li>
            <li><a href='userprofileedit.php'>Edit Profile</a></li>
            <li><a href='logout.php'>Logout</a></li>
            
          </ul>
        </div>

<?php
  
  $con=mysqli_connect("sql1.njit.edu","la95","1uPHeSMbW","la95");
  // check connection
  if (mysqli_connect_errno())
   {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $user = $_SESSION['username'];
   //goes into database for specific logged in user 
   $result = mysqli_query($con, "SELECT * FROM members WHERE username = '$user'");
  

   
   while($row = mysqli_fetch_array($result)) 
    
{
echo "<br>";
echo "<br>";
echo "<br>";
echo "<img width='150px' height='150px' src='img/avatar.jpg".$row['profilepic']."'>"; 
echo "<p>Your memberID: "  . $row['memberID'] . "</p>";
echo "<p>Your username: "  . $row['username'] . "</p>";
echo "<p>Your email: "  . $row['email'] . "</p>";
echo "<p> Are you active?  "  . $row['active'] . "</p>";

}

mysqli_close($con);
  
?>
   </div>
</div>

<?php
//include footer template
require('layout/footer.php');
?>