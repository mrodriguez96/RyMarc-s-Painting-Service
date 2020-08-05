<!DOCTYPE html>
<!-- The admin home page of the website. Contains links to features useful for the boss of the
company.
-->
<!-- The php script below is for security, users cannot access the website without first logging in.
-->
<?php
session_start();
if(!isset($_SESSION['email']))
{
    // not logged in
    header('Location: index.php');
    exit();
}
?>
<html>
<head>
<title>Admin Home</title>
<!--Some CSS to make the website look better. The list CSS is to create a vertical navigation
bar. Also changed background color of the body.
-->
  <style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 180px;
    background-color: white;
  }

  li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration-line: underline;
  }

  li a:hover {
    background-color: lightgrey;
  }

  body {
    background-color: grey;
  }
  </style>
</head>
<body>
<!--The php script below displays who the current user is, from the session variable.
-->
<?php
  if(isset($_SESSION['email'])){
    echo "<p align = 'right'>User: ".$_SESSION['email'];
  }
?>
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Admin Home Page</h2></center>
<p align = "center">Please use the links to the left to access the features as needed.</p>
<center><img src="Logo.jpg" alt="Logo" style="width:200px;height:200px;"></center>

<ul>
<li><a href = "viewcust.php"> View Customers </a></li>
<li><a href = "viewestimates.php"> View Estimates </a></li>
<li><a href = "respondestimate.php"> Respond to Estimates </a></li>
</ul>

</body>
</html>
