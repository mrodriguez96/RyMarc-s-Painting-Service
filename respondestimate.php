<!DOCTYPE html>
<!-- The respond to estimates page. After the boss has viewed estimates, he can respond
to them through this form. The response will be recorded into the database,
which then can can displayed to the customers.
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
<title>Respond to Estimates</title>
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
The headers, navigation bar, and the form that the boss can use to respond to
estimates from customers.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Respond to Estimates</h2></center>

<form method = "post" action = "newestimaterespond.php">
<ul>
<li><a href = "admin_home.php"> Admin Home </a></li>
<li><a href = "viewcust.php"> View Customers </a></li>
<li><a href = "viewestimates.php">View Estimates </a></li>
</ul>

<table width="400" align="center" bgcolor="lightgrey">
<tr>
<td><b>Customers' Email:</b></td>
<td><input type="text" name="email" required></td>
</tr>
<tr>
<td><b>The Job Title:</b></td>
<td><input type="text" name="job_title" required></td>
</tr>
<tr>
<td><b>Price:</b></td>
<td><input type="text" name="price" required></td>
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
