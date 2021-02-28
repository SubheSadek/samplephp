<?php include './classes/adminlogin.php';?>
<?php 
$al=new Adminlogin();
if($_SERVER ['REQUEST_METHOD']== 'POST' && isset($_POST['register'])){
    // $adminUser= $_POST['adminUser'];
    // $adminPass= md5($_POST['adminPass']);
    $loginChk=$al->adminRegister($_POST);
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="admin/css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
            <form action="" method="post">
                <h1>User Register</h1>
                <span style="font-size:16px; font-weight:bold; color: red;">
                    <?php
                    if(isset($loginChk)){
                        echo $loginChk;
                    }
                    ?>
                </span>
                <div>
                    <input type="text" placeholder="please enter your name" name="adminName">
                </div>
                <div>
                    <input type="text" placeholder="please enter your email" name="adminEmail">
                </div>
                <div>
                    <input type="password" placeholder="please enter your password" name="adminpass">
                </div>
                <div style="text-align:left;">
                 <button name="register" style="margin-left:10px;color:white;background:green;padding:10px;cursor:pointer;border-radius:5px;">Create Account</button>
                    <!-- <input type="submit" value="Register" /> -->
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login.php" style="text-decoration:underline;">Already have an Account,Login.</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>