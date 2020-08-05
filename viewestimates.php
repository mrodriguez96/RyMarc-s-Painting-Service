<!DOCTYPE html>
<!-- The view estimates page of the admin section of the website. The boss can
view requested estimates, and then respond to them on a connected page, the
respondestimate page.
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
<title>View Estimates</title>
<!--Some CSS to make the website look better. The list CSS is to create a vertical navigation
bar. Also changed background color of the body. Also added some CSS to make the table
look better.
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
  table, th, td {
    border: 2px solid black;
  }
  th, td {
    padding: 15px;
    text-align: center;
  }
  table{
    width: 1200;
    background-color: lightgrey;
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
<!--The php script below fetches the estimate information from the estimates table
in the database. This is used to display the estimates on the page, so that the
boss can view them.
-->
<?php
$dsn = 'mysql:host=localhost;dbname=rymarcproductions';
$username = 'rymarcproductions';
$password = 'rymarcproductionspass';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('db_error.php');
        exit();
    }
$queryAll = 'SELECT * FROM estimates';
$statement1 = $db->prepare($queryAll);
$statement1->execute();
$estimates = $statement1->fetchAll();
$statement1->closeCursor();
?>
<!--The code below contains the html elements of this page, such as the headers,
the navigation bar, and the positive reviews the company has received.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>View Requested Estimates</h2></center>
<ul>
<li><a href = "admin_home.php"> Admin Home </a></li>
<li><a href = "viewcust.php"> View Customers </a></li>
<li><a href = "respondestimate.php"> Respond to Estimates </a></li>
</ul>
<table align = "center">
<tr>
  <th>Email</th>
  <th>Address</th>
  <th>City</th>
  <th>Job Title</th>
  <th>Job Description</th>
</tr>
<!--This php script prints out the estimates from the query above.-->
<?php foreach ($estimates as $estimate) : ?>
            <tr>
                <td><?php echo $estimate['email']; ?></td>
                <td><?php echo $estimate['address']; ?></td>
                <td><?php echo $estimate['city']; ?></td>
                <td><?php echo $estimate['job_title']; ?></td>
                <td><?php echo $estimate['job_des']; ?></td>
            </tr>
            <?php endforeach; ?>
</table>
</body>
</html>
