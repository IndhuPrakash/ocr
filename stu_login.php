<?php include('admin.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Online Course Registration System</title>
   <!...External CSS...>
   <link rel="stylesheet" type="text/css" href="style.css">
   <!...Internal CSS...>
   <style>
	h1{
		/* Border around Text shadow */
		text-shadow: -1.5px 0 blue, 0 1.5px blue, 1.5px 0 blue, 0 -1.5px blue;
		/* radial-gradient */
  		background-image: radial-gradient(white 10%, #5FD6F9 100%, #5FD6F9 20%);
	}
	/* Text shadow */
	h2 {
  		text-shadow: 2px 2px red;
	}
   	label{
		font-size:large;
   		display: block; 
		width: 700px;
   	}
   	input{
		font-size:medium;
		height:25px; width:500px;
		/* Filter brightness */
		filter:brightness(70%);
   	}
	/* Fixed Position */
	div.fix{
  		position: fixed;
  		bottom: 900;
  		right: 0;
  		width: 400px;
		height:100px;
  		border: 2px solid #73AD21;
		/* transition timing fuction */
		transition-timing-function: ease-in-out;
		/* transition delay */
		transition-delay: 1s;
		/* transition duration */
		transition-duration: 5s;
	}
	div.fix:hover {
  		width: 500px;height:150px;
	}
	/* Absolute Position */
	div.abs {
		position: absolute;
  		top: 410px;
  		right: 0;
  		width: 150px;
  		height: 50px;
  		border: 2px solid gray;
	}
	img{
		/* Filter blur */
  		filter:blur(3px);
		/* Filter opacity */
		filter:opacity(20%);
	}
   </style>
</head>
<body>
<h1 class="topic">Course Registration System</h1>
<form method="post" action="login.php">
<?php include('errors.php'); ?>
<img src="login.png" alt="login" width="420" height="200" style="float:middle">

<!...Inline CSS...>
<h2 style="color: #1c87c9">STUDENT LOGIN</h2>
<div class="fix">Admin should have valid login id and password to login into the system.</div>
<div class="abs">This login page for Admins</div>

<p><label>Roll NO</label>
<input type = "text" placeholder = "Roll NO" name="roll_no"></p>

<p><label>Password</label>
<input type="password" name="password" minlength="8" placeholder = "********"><br><br></p>
  	<div class="input-group">
  		<button type="submit" class="btn" name="stu_login">Login</button>
  	</div>
  	<p>
Not yet a member? <a href="register.php">Sign up</a>
</p>
  </form>
</body>
</html>
