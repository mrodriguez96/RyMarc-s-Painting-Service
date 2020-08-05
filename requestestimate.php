<!DOCTYPE html>
<!-- The request estimate page of the website. Customers can enter in the needed information
in the form, and it will be sent to the database for the boss to view later.
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
<title>Request Estimate</title>
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
<!--The code below is the main parts of the website, like the navigation bar, the headers,
and the input form. This input form is used for customers to request an estimate
for a job they need done. After submitted, the data is sent to newestimate.php,
which inserts the information into the estimates table in the database.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Request Estimate</h2></center>

<form method = "post" action = "newestimate.php">
<ul>
<li><a href = "home.php"> Home </a></li></td></tr>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "estimatestatus.php"> Estimate Status </a></li>
<li><a href = "givefeedback.php"> Give Feedback </a></li>
<li><a href = "reviews.php"> View Feedback </a></li>
<li><a href = "pastwork.php"> View Past Work</a></li>
</ul>

<table width="400" align="center" bgcolor="lightgrey">
<tr>
<td><b>Email:</b></td>
<td><input type="text" name="email" required></td>
</tr>
<tr>
<td><b>Address:</b></td>
<td><input type="text" name="address" required></td>
</tr>
<tr>
<td><b>City:</b></td>
<td><input type="text" name="city" required></td>
</tr>
<tr>
<td><b>Job Title:</b></td>
<td><input type="text" name="job_title" required></td>
</tr>
<tr>
<td><b>Job Description:</b></td>
<td><textarea rows="10" cols="50" name="job_description" required></textarea></td>
</tr>
<tr>
<td><button type="submit" class="submit">Submit</button></td>
</tr>
</table>
</form>

</body>
</html>
