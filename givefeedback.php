<!DOCTYPE html>
<!-- The give feedback page of the website. Customers can rate their satisfaction of the
work done by the company, and it will be sent to the database for the boss to view later.
Good or better feedback will be displayed on the reviews page.
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
<title>Give Feedback</title>
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
<!--The code below contains the important html elements of this page.
The headers, navigation bar, and the form that customers can use to give the
company feedback about their work/performance.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Give Feedback</h2></center>

<form method = "post" action = "newfeedback.php">
<ul>
<li><a href = "home.php"> Home </a></li>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "requestestimate.php"> Request Estimate</a></li>
<li><a href = "estimatestatus.php"> Estimate Status </a></li>
<li><a href = "reviews.php"> View Feedback </a></li>
<li><a href = "pastwork.php"> View Past Work</a></li>
</ul>

<table width="400" align="center" bgcolor="lightgrey">
<tr>
<td><b>Email:</b></td>
<td><input type="text" name="email" required></td>
</tr>
<tr>
<td><b>Overall Satisfaction:</b></td>
<td><select name = "satisfaction">
  <option value="excellent">Excellent</option>
  <option value="great">Great</option>
  <option value="good">Good</option>
  <option value="ok">Okay</option>
  <option value="not_good">So-so</option>
  <option value="bad">Bad</option>
  <option value="terrible">Terrible</option>
</select></td>
</tr>
<tr>
<td><b>Comments:</b></td>
<td><textarea rows="10" cols="50" name="comments"></textarea></td>
</tr>
<tr>
<td><button type="submit" class="submit">Submit</button></td>
</tr>
</table>
</form>

</body>
</html>
