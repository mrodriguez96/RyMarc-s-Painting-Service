<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  <title>Painting Login</title>
</head>

<body>
<!--Login form to access the website.-->
<tr align = "center"><h1>Welcome to RyMarc's Painting Service!</h1></tr>
<form method="post" action="">

    <table width="400" align="center" bgcolor="grey">
			<tr align="center">
			<td colspan="2"><h2>Please login to visit the website</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="Enter Email" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="password" placeholder="Enter Password" required/></td>
			</tr>
			<tr align="center">
				<td colspan="3"><input type="submit" name="login" value="Login" /></td>
			</tr>
	</table>
</form>
<!--A link to a signup page, if the user is a new customer.-->
<p>New Customer? Sign Up with the link below please.</p><br>
<a href = "signup.html">Sign Up</a><br>
</body>
<!--The php script is used to verify the logins. If they enter a correct customer
email and password, they will be sent to the home page of the website. If an admin
enters the correct credentials, they will instead go to the admin home page.
If any user enters incorrect login information, they will be met with an error
message and redirected to this login page again.
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




	if(isset($_POST['login'])) {

        $sel_admin = 'SELECT * FROM admins WHERE password = :password AND email = :email';
                $statement = $db->prepare($sel_admin);
                $statement->execute(
                  array(
                    'email'     =>    $_POST["email"],
                    'password'  =>    $_POST["password"]
                  )
                );

                $check_admin = $statement->rowCount();
                if($check_admin == 1)
                {
                $_SESSION['email'] =  $_POST["email"];

                header("location:admin_home.php");
                }

        $stmt = $db->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $customer = $stmt->fetch();

        if ($customer && password_verify($_POST['password'], $customer['password']))
        {
          $_SESSION['email'] = $_POST["email"];
          echo "<script>alert('Login Successful!') </script>";
          echo '<script>location.href="home.php"</script>';
        } else {
          echo "<script>alert('Password or username incorrect, try again')</script>";
        }


    }
?>
</html>
