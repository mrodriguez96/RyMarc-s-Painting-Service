<!DOCTYPE html>
<!-- The company history/about us page of the website. Brief history of the company, and our
values as a company.
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
<title>About Us</title>
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
<!--Below are the elements of the page, such as the headers, and the navigation bar.
There are also some brief descriptions of the company.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>About Us</h2></center>

<form>
  <ul>
  <li><a href = "home.php"> Home </a></li>
  <li><a href = "requestestimate.php"> Request Estimate </a></li>
  <li><a href = "estimatestatus.php"> Estimate Status </a></li>
  <li><a href = "givefeedback.php"> Give Feedback </a></li>
  <li><a href = "reviews.php"> View Feedback </a></li>
  <li><a href = "pastwork.php"> View Past Work</a></li>
  </ul>
<table width="1200" align="center" bgcolor="lightgrey">
<tr align="left"><td><p>RyMarc's Painting Service is a
locally owned service managed by Ryan Malaga and Marcos Rodriguez.
We aim to have our services satisfy our customers as much as possible
with affordable prices as well as with our talented, friendly staff.
</p></td></tr>
<tr align="left"><td><p>For over 20 years, we have been known as one
of the best painting companies in the local North NJ area. We have done work
on private residences, including inside and outside painting. Other work we do
includes: taking down and putting up wallpaper, any minor patch-up work, spacking
walls, and clean-ups.
</p></td></tr>
</table>
</form>

</body>
</html>
