<?php
include_once('process.php');
session_start();

function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode=createRandomPassword();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($config,$_POST["username"]);
    $password = mysqli_real_escape_string($config,$_POST["password"]);
    $pass_sec = md5($password);

    $sql = "SELECT id FROM user WHERE username = '$username' AND password = '$pass_sec'";
    $result = mysqli_query($config, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    $uid = $row['id'];
    
    $_SESSION['uid'] = $uid;

    if($count == 1) {

        $userdata = mysqli_query($config, "SELECT * FROM user WHERE id = '$uid'");

           while($rows = mysqli_fetch_array($userdata)) {
              $_SESSION['username'] = $rows['username'];
              $_SESSION['position'] = $rows['position'];
              $_SESSION["loggedin"] = true;
           }

        $query = mysqli_query($config, "SELECT position FROM user WHERE id = '$uid'");

        while($rows = mysqli_fetch_array($query)) {
            $priv = $rows['position'];

            if ($priv == "Admin") {
                header("Location: admin/index.php");
            }
            else if ($priv == "User") {
                header("Location: php/kiosk.php?invoice=$finalcode");
            }
            else {
                header("Location: index.php?msg=invalid");
            }
            
            mysqli_close($config);
        }

    }
    else {
       header("Location: index.php?invalid");
    }
}

?>