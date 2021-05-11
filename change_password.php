<?php include('admin.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Course Registration System</title>
   <!...External CSS...>
   <link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">
	h1 {
		/* Border around text shadow*/
  		text-shadow: -1.5px 0 blue, 0 1.5px blue, 1.5px 0 blue, 0 -1.5px blue;
		/* linear-gradient (top to bottom) */
		background-image: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,1));
	}
	/* Static Position */
	h2{
  		position: static;
  		border: 3px solid #5FD6F9;
		/* Filter drop shadow */
		filter:drop-shadow(8px 8px 10px gray);
	}
	/* Box shadow */
	.btn-group button {
  		box-shadow: 5px 5px 5px gray;
	}	
	/* Multiple text shadow */
	h3 {
  		text-shadow: 0 0 3px #12DA1A, 0 0 5px #12DA1A;
	}
	/* element selector */
   	label{
		font-size:large;
   		display: block;
   	}
   	input{
		font-size:;small;
		height:15px; 
		width:350px;
		/*Filter brightness */
		filter:brightness(70%);
   	}
	/* Filter contrast brightness */
	img{
		filter:contrast(140%) brightness(97.5%);;	
	}
   </style>
</head>
<body>
<h1 class="topic">Online Course Registration</h1>
<form method="post" action="change_password.php">
<div class="btn-group">
  <button type="submit" name="stu_logout">LOGOUT</button>
  <button type="submit" name="change_password">CHANGE PASSWORD</button>
  <button type="submit" name="my_profile">MY PROFILE</button>
  <button type="submit" name="enroll_course">ENROLL FOR COURSE</button>
</div><br>
<h2>CHANGE PASSWORD</h2>
<img src="change password.png" alt="change password" width="300" height="300" style="float:right">
<!...Inline CSS...>
<div class="form">
<h3 style="color: #1c87c9">CHANGE PASSWORD</h3>

<p><div class="form">
<label>Roll No</label>
<input type = "text" name="roll_no" placeholder = "Roll No" />
</div></p>

<p><div class="form">
<label>Current Password</label>
<input type = "text" name="current" placeholder = "Current Password" />
</div></p>

<p><div class="form">
<label>New Password</label>
<input type = "text" name="new" placeholder = "New Password" />
</div></p>
<p><div class="form">
<label>Confirm Pwd</label>
<input type = "text" name="confirm" placeholder = "Confirm Password" />
</div></p><br><br>
   <div class="form">
      <button type="submit" class="btn" name="submit">submit</button>
    </div>
</div>
</form>
</body>
</html>

<?php
$db = mysqli_connect('localhost', 'root', '', 'ocr');
if (isset($_POST['submit']))   {
	$roll_no=$_POST['roll_no'];
	$current=$_POST['current'];
	$new=$_POST['new'];
	$confirm=$_POST['confirm'];
    	$query = "SELECT * FROM student WHERE roll_no='$roll_no' AND pwd='$current'";
    	$result = mysqli_query($db, $query);
    	if (mysqli_num_rows($result) == 1) 	{
		if($new==$confirm)	{
			$query ="UPDATE student SET pwd='$new' WHERE roll_no='$roll_no'";
			if ($db->query($query) === TRUE) {
    				echo "Updated successfully";
			} 
			else {
    				echo "Error: " . $query . "<br>" . $db->error;
			}				
		}
    	}
	else {
      		array_push($errors, "Wrong Roll No/password combination");
    	}
}
?>
