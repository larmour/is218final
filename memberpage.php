<?php 
require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 

?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Look at all of our members-  Welcome <?php echo $_SESSION['username']; ?></h2>
				<p><a href='logout.php'>Logout</a></p>
        <p><a href='userprofile.php'>Update Profile</a></p>
				<hr>
        </div>
  <div id="ccontent">
  <p>
  <?php 
  $con=mysqli_connect("sql1.njit.edu","la95","1uPHeSMbW","la95");
  // Check connection
   if (mysqli_connect_errno())
   {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   $result = mysqli_query($con,"SELECT * FROM members");

   echo "<table border='1'>
   <tr>
   <th>Member ID</th>
   <th>UserName</th>
   <th>Email</th>
   <th>Active</th>
   </tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['active'] . "</td>";
echo "</tr>";
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
