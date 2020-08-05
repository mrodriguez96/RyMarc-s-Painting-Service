<!--This php file, is called after a submission occurs on the requestestimate page.
This script inserts the information the customer inputted into the database, so
that the boss can view it.
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
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$job_title = $_POST['job_title'];
$job_des = $_POST['job_description'];

    $sql = "INSERT INTO estimates (email, address, city, job_title, job_des) VALUES (?,?,?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute([$email, $address, $city, $job_title, $job_des]);
    echo "<script>alert('Estimate Received!') </script>";
    echo '<script>location.href="home.php"</script>';
?>
