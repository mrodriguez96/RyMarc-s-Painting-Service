<!--This php script is accessed from the signup.html page, and it takes the information
the customer entered, and stores it in the customers table in the database. Once
this is done, the customer now has an account and can login to the website.
Also, their password is hashed for security reasons.
</script>
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
$fname= $_POST['firstname'];
$lname = $_POST['lastname'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers (email, password, firstName, lastName, phone) VALUES (?,?,?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute([$email, $hashed_password, $fname, $lname, $phone]);
    header("location:index.php");
?>
