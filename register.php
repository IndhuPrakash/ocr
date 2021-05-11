<?php include('admin.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Course Registration System</title>
   <!...External CSS...>
   <link rel="stylesheet" type="text/css" href="style.css">
   <!...Internal CSS...>
   <style>
	h1 {
		/* Border around text shadow */
  		text-shadow: -1.5px 0 blue, 0 1.5px blue, 1.5px 0 blue, 0 -1.5px blue;
		/* linear-gradient (diagonal) */
		background-image: linear-gradient(to bottom left,rgba(255,255,255,0), rgba(255,255,255,1));
	}
	/* Text shadow */
	h2 {
  		text-shadow: 2px 2px 5px red;
	}
   	label{
		font-size:large;
   		display: block; 
		width: 700px;
   	}
   	input{
		font-size:medium;
		height:25px; 
		width:500px;
		/* Filter brightness */
		filter:brightness(70%);
   	}
	/* Filter contrast */
	img{
		filter:contrast(150%);	
	}
   </style>
</head>
<body>
<h1 class="topic">Course Registration</h1>
<form method="post" action="register.php">
<?php include('errors.php'); ?>
<img src="registerhere.png" alt="register here" width="420" height="420" style="float:right">
<!...Inline CSS...>
<h2 style="color: #1c87c9">ADMIN REGISTRATION</h2>

<p><label>Name</label>
<input type = "text" placeholder= "Name" name="name"></p>

<p><label>User Name</label>
<input type = "text" placeholder = "User Name" name="username"></p>

<p><label>Email</label>
<input type="email" placeholder="name@domain.com" name="email"></p>

<p><label>Password</label>
<input type="password" name="password" minlength="8"><br><br></p>

<form>
<button class="btn" type="submit" name="register">Register</button>
</form>
   
 <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
</p>
</form>
</body>
</html>
