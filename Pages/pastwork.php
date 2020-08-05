<!DOCTYPE html>
<!-- The past work page of the website. Customers can see what previous work has been
done by the company through example pictures.
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
<title>Past Work</title>
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
  table {
    width: 1200px;
    background-color: lightgrey;
    cellpadding: 10px;
    cellspacing: 15px;
    height: 500px;
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
<center><h2>Our Past Work</h2></center>
<ul>
<li><a href = "home.php"> Home </a></li>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "requestestimate.php"> Request Estimate </a></li>
<li><a href = "estimatestatus.php"> Estimate Status </a></li>
<li><a href = "givefeedback.php"> Give Feedback </a></li>
<li><a href = "reviews.php"> View Feedback </a></li>
</ul>
<table align="center">
<tr align = "center"><td colspan="4">We are very proud of our work and love to show
what we have done over the years! Please enjoy some of the previous jobs we have
done.</td></tr>
<tr><td>
</td>
</tr>
<tr>
<td><img src = "room1.jpg" width = "300" height = "270" alt = "Room Painted"></td>
<td><img src = "room2.jpg" width = "300" height = "270" alt = "Room Painted"></td>
<td><img src = "room3.jpg" width = "300" height = "270" alt = "Room Painted"></td>
<td><img src = "outside1.jpg" width = "300" height = "270" alt = "Outside Painted"></td>
</tr>
</table>


</body>
</html>
