<?php 
require('includes/config.php'); 

//include header template
require('layout/header.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
 

//define page title
$title = 'User Profile Editor';

require('layout/header.php');

?>

<div id="wrapper">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Welcome <?php echo $_SESSION['username']; ?> - Edit your Profile</h2>
        <div id="menu">
          <ul>
            <li><a href='memberpage.php'>Members Page</a></li>
            <li><a href='userprofile.php'>Your Profile</a></li>
            <li><a href='logout.php'>Logout</a></li>
            
          </ul>
        </div>
  <div id="ccontent">

<h1 class="page-header">Edit Your Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      
        <img src="http://www.mahsen.net/images/uyeler/e.png" width=100px; height= 100px; class="avatar img-circle img-thumbnail" alt="avatar">
        <h5>Upload an updated photo</h5>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    
    
    
    
    <!-- edit form column -->
  <h3>Personal info</h3>
   <form method="post">  
      
   
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text" name="first_name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text" name="last_name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">School:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text" name="school">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Bio:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text" name="bio">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Time Zone:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_time_zone" class="form-control" name="time_zone">
                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                <option value="Alaska">(GMT-09:00) Alaska</option>
                <option value="Pacific Time (US & Canada)">(GMT-08:00) Pacific Time (US & Canada)</option>
                <option value="Arizona">(GMT-07:00) Arizona</option>
                <option value="Mountain Time (US & Canada)">(GMT-07:00) Mountain Time (US & Canada)</option>
                <option value="Central Time (US & Canada)" selected="selected">(GMT-06:00) Central Time (US & Canada)</option>
                <option value="Eastern Time (US & Canada)">(GMT-05:00) Eastern Time (US & Canada)</option>
                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
          
            <input class="btn btn-primary" type="button" onclick="location.href='memberpage.php';" value="Save changes" />
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>

<?php

   function filter() {
      return rtrm(htmlspecialchars());
   }
   
   $firstname = filter($_POST['firstname']);
   $lastname = filter($_POST['lastname']);
   $school = filter($_POST['school']);
   $bio = filter($_POST['bio']);
   $timezone = filter($_POST['timezone']);
   
   if ($user->is_logged_in()) {
      $sql = mysqli_query("UPDATE members SET first_name='$firstname', last_name='$lastname', school='$school', bio='$bio' time_zone='$time_zone' WHERE memberid='$memberID' "); 
      $sql = mysql_query("SELECT * FROM members WHERE memberid='$memberID' LIMIT 1");
      while($row = mysql_fetch_array($sql)){
         $first_name = $row['firstname'];
         $last_name = $row['lastname'];
         $school  = $row['school'];
         $bio  = $row['bio'];
         $timezone = $row['timezone'];
      
      }
   }
?>