<!--This file terminates the users current session, and returns them to the
login page. Basically logs a user out of the website.
-->
<?php
session_start();

session_unset();

header("location:index.php");
?>
