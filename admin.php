<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'ocr');

if (isset($_POST['register'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

    $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  echo $user;
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
    $query = "INSERT INTO admin (name,username, email, password) 
          VALUES('$name','$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    echo '<script type="text/javascript"> alert("You are registered successfully"); </script>';
    header('location: login.php');
  }
}

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0)   {
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      echo '<script type="text/javascript"> alert("You are login successfully"); </script>';
      header('location: student_details.php');
    }
else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['stu_login'])) {
  $roll_no = mysqli_real_escape_string($db, $_POST['roll_no']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($roll_no)) {
    array_push($errors, "Roll_no is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0)   {
    $query = "SELECT * FROM student WHERE roll_no='$roll_no' AND pwd='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['roll_no'] = $roll_no;
      $_SESSION['success'] = "You are now logged in";
      echo '<script type="text/javascript"> alert("You are login successfully"); </script>';
      header('location: enroll_course.php');
    }
else {
      array_push($errors, "Wrong roll no/password combination");
    }
  }
}
if (isset($_POST['student_reg'])) {
  session_start();
  Header( 'Location: student_details.php');
}
if (isset($_POST['course'])) {
  session_start();
  Header( 'Location: course.php');
}
if (isset($_POST['manage_student'])) {
  session_start();
  Header( 'Location: manage_student.php');
}
if (isset($_POST['enroll_history'])) {
  session_start();
  Header( 'Location: enroll_history.php');
}
if (isset($_POST['logout'])) {
  session_start();
  Header( 'Location: login.php');
}
if (isset($_POST['enroll_course'])) {
  session_start();
  Header( 'Location: enroll_course.php');
}
if (isset($_POST['my_profile'])) {
  session_start();
  Header( 'Location: my_profile.php');
}
if (isset($_POST['change_password'])) {
  session_start();
  Header( 'Location: change_password.php');
}
if (isset($_POST['stu_logout'])) {
  session_start();
  Header( 'Location: stu_login.php');
}
?>
