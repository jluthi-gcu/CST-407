<html>
<head>

</head>
 <?php
 session_start();
 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";

$stmt = $mysqli->prepare("SELECT user_id, user_name, password FROM users WHERE user_name = ?");
$stmt->bind_param("s", $username); 
$stmt->execute();

$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);




if ($stmt->num_rows > 0) {
    echo "i found one person with that username<br>";
    $stmt->fetch(); 
    if (password_verify($password, $pw)) {
        echo "The password matches<br>";
        echo "Login success<br>";
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        exit;
    }else{
        $_SESSION = [];
        session_destroy();
    }
  
} else {
    $_SESSION = [];
    session_destroy();
}

echo "login failed<br>";

echo "SESSION Variable = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<br><a href='index.php'>return to main page</a>";
?>