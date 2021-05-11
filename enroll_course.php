<?php include('admin.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Course Registration System</title>
   <!...External CSS...>
   <link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">
	h1{
		/* Border around Text shadow */
		text-shadow: -1.5px 0 blue, 0 1.5px blue, 1.5px 0 blue, 0 -1.5px blue;
		/* linear-gradient (left to right)*/
  		background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,1));
	}
	/* 2D Transform */
	h2{
  		width: 1300px; 
  		height: 30px;
  		background-color: #AAF4F6;
  		border: 1px solid gray;
  		-ms-transform: translate(50px,100px);
  		transform: translate(0px,0px);
		/* transition */
  		margin: 4px 2px;
  		opacity: 0.6;
  		transition: 0.3s;
		/* transition timing fuction */
		transition-timing-function: ease-in-out;
		/* transition delay */
		transition-delay: 1s;
		/* transition duration */
		transition-duration: 5s;
	}
	h2:hover{opcity:1;width: 500px;height:40px;}
	/* Box shadow */
	.btn-group button {
  		box-shadow: 5px 5px 5px gray;
	}
	/* Text shadow */
	h3 {
  		color: white;
  		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
	}
	/* elementselector */
   	label{
		font-size:large;
   		display: block; 
   	}
   	input{
		font-size:;small;
		height:15px; 
		width:350px;
		/* Filter brightness */
		filter:brightness(70%);
   	}
	option {width:20em}
   </style>
</head>
<body>
<h1 class="topic">Online Course Registration</h1>
<form method="post" action="enroll_course.php">
<div class="btn-group">
  <button type="submit" name="stu_logout">LOGOUT</button>
  <button type="submit" name="change_password">CHANGE PASSWORD</button>
  <button type="submit" name="my_profile">MY PROFILE</button>
  <button type="submit" name="enroll_course">ENROLL FOR COURSE</button>
</div><br>
<h2>ENROLL FOR COURSE</h2>
<!...Inline CSS...>
<div class="form">
<h3 style="color: #1c87c9">ENROLL FOR COURSE</h3>

<p><div class="form">
<label>First Name</label>
<input type = "text" name="first_name" placeholder = "First Name" />
</div></p>

<p><div class="form">
<label>Roll No</label>
<input type = "text" name="roll_no" placeholder = "Roll No" />
</div></p>

<p><div class="form">Department
<select name="dept">
<option value="CSE">CSE</option>
<option value="IT">IT</option>
<option value="EEE">EEE</option>
<option value="ECE">ECE</option>
<option value="MECH">MECH</option>
</select>
</div></p>

<p><div class="form">
<label>Semester</label>
<input type = "text" name="sem" placeholder = "Semester" />
</div></p>

<p><div class="form">
<label>Course</label>
<input type = "text" name="course" placeholder = "Course" />
</div></p>
<p><div class="form">
<label>password</label>
<input type = "text" name="pwd" placeholder = "password" />
</div><br>

   <div class="form">
      <button type="submit" class="btn" name="submit">submit</button>
    </div>
</div>
</form>
</body>
</html>

<?php
$db = mysqli_connect('localhost', 'root', '', 'ocr');
if (isset($_POST['submit']))  {
	$first_name=$_POST['first_name'];
	$roll_no=$_POST['roll_no'];
	$dept=$_POST['dept'];
	$sem=$_POST['sem'];
	$course=$_POST['course'];
	$pwd=$_POST['pwd'];

    	$query = "SELECT * FROM student WHERE roll_no='$roll_no' AND pwd='$pwd'";
    	$result = mysqli_query($db, $query);
    	if (mysqli_num_rows($result) == 1) 	{
		$query = "INSERT INTO course (first_name,roll_no,dept,sem,course)
			 VALUES('$first_name','$roll_no','$dept','$sem','$course')";
		if ($db->query($query) === TRUE) {
    			echo "New record created successfully";
		} 
		else {
    			echo "Error: " . $query . "<br>" . $db->error;
		}    	
	}
	else {
      		array_push($errors, "Wrong Roll No/password combination");
    	}
}
?>
