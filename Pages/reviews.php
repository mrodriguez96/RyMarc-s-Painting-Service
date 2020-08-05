<!DOCTYPE html>
<!-- The reviews page of the website. Customers can see what good feedback has been
said about our company by other customers, through the feedback page.
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
<title>Reviews</title>
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
<!--The php script below fetches the feedback information from the feedback table
in the database, where satisfaction is good or better. This is used to display
the reviews on the page, for customers to see.
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
$queryAll = 'SELECT * FROM feedback WHERE satisfaction = "good" OR satisfaction = "great"
OR satisfaction = "excellent"';
$statement1 = $db->prepare($queryAll);
$statement1->execute();
$reviews = $statement1->fetchAll();
$statement1->closeCursor();
?>
<!--The code below contains the html elements of this page, such as the headers,
the navigation bar, and the positive reviews the company has received.
-->
<p align = "right"><a href = "logout.php"> Logout </a></p>
<center><h1>RyMarc's Painting Service</h1></center>
<center><h2>View Feedback</h2></center>
<ul>
<li><a href = "home.php"> Home </a></li>
<li><a href = "aboutus.php"> About Us/History </a></li>
<li><a href = "requestestimate.php"> Request Estimate </a></li>
<li><a href = "estimatestatus.php"> Estimate Status </a></li>
<li><a href = "givefeedback.php"> Give Feedback </a></li>
<li><a href = "pastwork.php"> View Past Work</a></li>
</ul>
<table align = "center">
<tr>
  <th>Customer</th>
  <th>Review</th>
</tr>
<!--This php script prints out the reviews from the query above.-->
<?php foreach ($reviews as $review) : ?>
            <tr>
                <td><?php echo $review['email']; ?></td>
                <td><?php echo $review['comments']; ?></td>
            </tr>
            <?php endforeach; ?>
</table>
</body>
</html>
