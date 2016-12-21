<?php 
require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 

?>

<div id="wrapper">
  <div id="header">
    		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
				<h2>Welcome <?php echo $_SESSION['username']; ?> - Look at all our Members</h2>
        <div id="menu">
          <ul>
            <li><a href='userprofileedit.php'>Update Profile</a></li>
            <li><a href='userprofile.php'>Your Profile</a></li>
            <li><a href='logout.php'>Logout</a></li>
          </ul>
        </div>      
  <div class="main_content">
      
  <?php
  
  $con=mysqli_connect("sql1.njit.edu","la95","1uPHeSMbW","la95");
  // check connection
  if (mysqli_connect_errno())
   {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
  
    $result = mysqli_query($con,"SELECT * FROM members");
   

   echo "<table border='1'>
   <tr>
   <th>Member ID</th>
   <th>First Name</th>
   <th>Last Name</th>
   <th>UserName</th>
   <th>Email</th>
   <th>School</th>
   <th>Bio</th>
   <th>Active</th>
   <th> Time Zone</th>
   </tr>";
  

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['school'] . "</td>";
echo "<td>" . $row['bio'] . "</td>";
echo "<td>" . $row['active'] . "</td>";
echo "<td>" . $row['timezone'] . "</td>";
 
}
echo "</table>";

mysqli_close($con);
  
  
?>
  </p>
        <html>
    
    </body>
</html>

		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
