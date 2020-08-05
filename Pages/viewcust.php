<!DOCTYPE html>
<!-- The view customers page of the admin section of the website. The boss can
see what customers are registered with the site, by displaying their information.
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
<title>View Customers</title>
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
<!--The php script below fetches the customer information from the customers table
in the database. This is used to display the customers on the page, so that the
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
$queryAll = 'SELECT * FROM customers';
$statement1 = $db->prepare($queryAll);
$statement1->execute();
$customers = $statement1->fetchAll();
$statement1->closeCursor();
?>
<!--The code below contains the html elements of this page, such as the headers,
the navigation bar, and the positive reviews the company has received.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>View Customers</h2></center>
<ul>
<li><a href = "admin_home.php"> Admin Home </a></li>
<li><a href = "viewestimates.php"> View Estimates </a></li>
<li><a href = "respondestimate.php"> Respond to Estimates </a></li>
</ul>
<table align = "center">
<tr>
  <th>Email</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Phone Number</th>
</tr>
<!--This php script prints out the customers from the query above.-->
<?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['firstName']; ?></td>
                <td><?php echo $customer['lastName']; ?></td>
                <td><?php echo $customer['phone']; ?></td>
            </tr>
            <?php endforeach; ?>
</table>
</body>
</html>
