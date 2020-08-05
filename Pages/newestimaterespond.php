<!--This php file, is called after a submission occurs on the respondestimate page.
This script inserts the information about a response to an estimate that
the boss had, into the database.
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
$job_title = $_POST['job_title'];
$price = $_POST['price'];
$comments = $_POST['comments'];

    $sql = "INSERT INTO respondedestimates (email, job_title, price, comments) VALUES (?,?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute([$email, $job_title, $price, $comments]);
    echo "<script>alert('Estimate Response Recorded!') </script>";
    echo '<script>location.href="admin_home.php"</script>';
?>
