<!--This php file, is called after a submission occurs on the givefeedback page.
This script inserts the information the customer inputted into the database, so
that the boss can view it. Can also be displayed on the reviews page.
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
$satisfaction = filter_input(INPUT_POST, 'satisfaction');
$comments = $_POST['comments'];

    $sql = "INSERT INTO feedback (email, satisfaction, comments) VALUES (?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute([$email, $satisfaction, $comments]);
    echo "<script>alert('Feedback Received!') </script>";
    echo '<script>location.href="home.php"</script>';
?>
