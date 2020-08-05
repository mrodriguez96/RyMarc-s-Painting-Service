<!DOCTYPE html>
<!-- The home page of the website. Users can navigate to other pages from here. Also the first
page the see when logged in to the website.
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
<title>Home</title>
</head>
<!--The php script below displays who the current user is, from the session variable.
-->
<body>
  <?php
  if(isset($_SESSION['email'])){
    echo "<p align = 'right'>User: ".$_SESSION['email'];
  }

   ?>
<!--Elements of the website, such as some headers and a logo image, as well as
the link elements.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Home Page</h2></center>
<p align = "center" style = "font-size: 18px;">Welcome to our website. Please use the links to the left to navigate the website.</p>
<center><img src="Logo.jpg" alt="Logo" style="width:200px;height:200px;"></center>
<ul>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "requestestimate.php"> Request Estimate </a></li>
<li><a href = "estimatestatus.php"> Estimate Status </a></li>
<li><a href = "givefeedback.php"> Give Feedback </a></li>
<li><a href = "reviews.php"> View Feedback </a></li>
<li><a href = "pastwork.php"> View Past Work</a></li>
</ul>

</body>
</html>
