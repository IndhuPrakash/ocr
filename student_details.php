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
		/* Filter sepia */
		filter:sepia(100%);
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
   	}
	img{
		/* Filter blur */
  		filter:blur(1px);
		/* Filter grayscale */
		filter:grayscale(100%);
	}
   </style>
</head>
<body>
<h1 class="topic">Online Course Registration</h1>
<form method="post" action="student_details.php">
<?php include('errors.php'); ?>

<div class="btn-group">
  <button type="submit" name="logout">LOGOUT</button>
  <button type="submit" name="enroll_history">ENROLL HISTORY</button>
  <button type="submit" name="manage_student">MANAGE STUDENT</button>
  <button type="submit" name="course">COURSE</button>
  <button type="submit" name="student_reg">STUDENT REGISTRATION</button>
</div><br>

<h2>STUDENTS REGISTRATION</h2>
<img src="student details.jpg" alt="student details" width="300" height="300" style="float:right">

<!...Inline CSS...>
<div class="form">
<h3 style="color: #1c87c9">STUDENTS REGISTRATION</h3>
<p><div class="form">
<label>First Name</label>
<input type = "text" name="first_name" placeholder = "First Name" />
</div></p>

<p><div class="form">
<label>Last Name</label>
<input type = "text" name="last_name" placeholder = "Last Name" />
</div></p>

<p><div class="form">
<label>Roll No</label>
<input type = "text" name="roll_no" placeholder = "Roll no" />
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
<label>Email</label>
<input type="email" name="email" placeholder="name@domain.com"/>
</div></p>

<p><div class="form">
<label>Password</label>
<input type="password" name="pwd" placeholder="********" minlength="8"/>
</div></p>

<p><div class="form">Gender
<select name="gender">
<option value="male">male</option>
<option value="female">female</option>
<option value="other">other</option>
</select>
</div></p>

<p><div class="form">
<label>Mobile No</label>
<input type="tel" name="mobile" placeholder="##### #####"/>
</div></p> 

<p><div class="form">
</label>Date of birth</label>
<input type="date" name="dob" value="yyyy-mm-dd" min="1990-01-01" max="2020-12-31"/>
</div></p><br>

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
	$last_name=$_POST['last_name'];
	$roll_no=$_POST['roll_no'];
	$dept=$_POST['dept'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$gender=$_POST['gender'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];

	$query = "INSERT INTO student (first_name,last_name,roll_no,dept,email,pwd,gender,mobile,dob) VALUES('$first_name','$last_name','$roll_no','$dept','$email','$pwd','$gender','$mobile','$dob')";
	if ($db->query($query) === TRUE) {
    		echo "New record created successfully";
	} 
	else {
    		echo "Error: " . $query . "<br>" . $db->error;
	}
}
?>
