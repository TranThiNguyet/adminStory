<?php
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/util/DatabaseConnectUtil.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>THay đổi mật khẩu</title>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/adminStory/templates/admin/assets/css/login.css">
</head>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Forgot Password ?</h3>
                <p style='color: white'>Enter your username below to reset your password.</p>
            </div>
            <div class="card-body">
                <?php
                $messageUser = "";
                //   $username="";
                if (isset($_GET['send'])) {
                    $username = $_GET['username'];
                    $query = "SELECT * FROM users WHERE username = '{$username}'";
                    $result = $mysqli->query($query);
                    $user = mysqli_fetch_assoc($result);
                    if ($user == null) {
                        $messageUser = "Username is incorrect.";
                    } else {
                        $messageUser = "";
                        HEADER("LOCATION:changePass.php?username=$username");
                        die();
                    }
                }
                ?>
                <form action="" method="GET">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="username" required="required">
                    </div>
                    <?php if ($messageUser) echo "<p style='color: red'>$messageUser</p>" ?>
                    <div class="form-group">
                        <input type="submit" name="send" value="Send" class="btn btn-success btn-lg btn-block">
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Already have an account?<a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
ob_end_flush();
?>