<!DOCTYPE html>
<!-- The estimate status page of the website. Here, customer's can view the status of their
requested estimate. If it has not been viewed by the boss yet, it will be blank.
Otherwise it will display the information regarding their estimate that the boss
has decided.
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
<title>Estimate Status</title>
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
<!--The php script below fetches the responded estimate information from the
respondedestimates table in the database, where the estimate response to display
is only the currently logged in customer.
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
$queryAll = "SELECT * FROM respondedestimates WHERE email = '{$_SESSION['email']}'";
$statement1 = $db->prepare($queryAll);
$statement1->execute();
$status = $statement1->fetchAll();
$statement1->closeCursor();
?>
<!--The code below contains the important html elements of this page.
The headers, navigation bar, and the status of the customers estimate in a
table form.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>Estimate Status</h2></center>

<ul>
<li><a href = "home.php"> Home </a></li>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "requestestimate.php"> Request Estimate </a></li>
<li><a href = "givefeedback.php"> Give Feedback </a></li>
<li><a href = "reviews.php"> View Feedback </a></li>
<li><a href = "pastwork.php"> View Past Work</a></li>
</ul>

<table align = "center">
<tr>
  <th>Job Title</th>
  <th>Price</th>
  <th>Comments</th>
</tr>
<!--This php script prints out the reviews from the query above.-->
<?php foreach ($status as $stat) : ?>
            <tr>
                <td><?php echo $stat['job_title']; ?></td>
                <td><?php echo $stat['price']; ?></td>
                <td><?php echo $stat['comments'];?></td>
            </tr>
            <?php endforeach; ?>
</table>

</body>
</html>
