<?php
include('header.php');
session_start();

$link = mysqli_connect("localhost", "root", "", "demo"); 
$message = '';

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if( isset( $_POST[ 'change' ] ) ) {
    //
        $password_new = $_POST["password_new"];
        $password_conf = $_POST["password_conf"];
        
        if($password_new == "")
        {    
            $message = "<font color=\"red\">Please enter a new password...</font>";            
        }
        else
        {
            if($password_new != $password_conf)
            {
                $message = "<font color=\"red\">The passwords don't match!</font>";       
            }
            else            
            {         
                function csrf_check() {
                    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['csrf_token'] ) {
                    return true; // Token CSRF hợp lệ
                    } else {
                    return false; // Token CSRF không hợp lệ
                    }
                }
                if (csrf_check()) {
                        $username = $_SESSION['username'] ; 
                        $password_new = mysqli_real_escape_string($link, $password_new);
                        $sql_update = "UPDATE user SET password = '" . $password_new . "' WHERE username = '" . $username . "'";
                        $result = mysqli_query($link, $sql_update);
                        if($result){
                            echo "<font color=\"green\">The password has been changed!</font>"; 
                        }
                        else {
                    $message = "<font color=\"red\">That request didn't look correct.</font>";
                        
                }
                    } else {
                      // Token CSRF không hợp lệ, hiển thị thông báo lỗi
                      echo 'Missing or invalid CSRF token!';
                      exit;
                    }
                }
        }
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Change your password.</p>

<form action="" method="POST">
   
    <!-- <p><label for="password_new">Current password:</label><br />
    <input type="password" id="password_cur" name="password_cur"></p> -->
    <input type="hidden" name="token" value="<?php echo $_SESSION['csrf_token']; ?>">

    
    <p><label for="password_new">New password:</label><br />
    <input type="password" id="password_new" name="password_new"></p>
    
    <p><label for="password_conf">Re-type new password:</label><br />
    <input type="password" id="password_conf" name="password_conf"></p>  
    
    <button type="submit" name="change" value="change">Change</button>    

</form>
</body>
</html>