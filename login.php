<?php include './classes/adminlogin.php';?>
<?php 
$al=new Adminlogin();
if($_SERVER ['REQUEST_METHOD']== 'POST'){
    $adminEmail= $_POST['adminEmail'];
    $adminPass= md5($_POST['adminPass']);
    $loginChk=$al->adminLogin($adminEmail,$adminPass);
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="admin/css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
            <form action="login.php" method="post">
                <h1>User Login</h1>
                <span style="font-size:16px; font-weight:bold; color: red;">
                    <?php
                    if(isset($loginChk)){
                        echo $loginChk;
                    }
                    ?>
                </span>
                <div>
                    <input type="text" placeholder="Username"  name="adminEmail"/>
                </div>
                <div>
                    <input type="password" placeholder="Password"  name="adminPass"/>
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="register.php" style="text-decoration:underline;">Register an Account</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>