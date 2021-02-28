<?php
include './lib/Session.php';
Session::checkSession();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/nav.css" media="screen" />
        <link href="assets/css/table/demo_page.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN: load jquery -->
        <script src="assets/js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="assets/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
        <script src="assets/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- END: load jquery -->
        <script type="text/javascript" src="assets/js/table/table.js"></script>
        <script src="assets/js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                setupLeftMenu();
                setSidebarHeight();
            });
        </script>

    </head>
    <body>
        <div class="container_12">
            <div class="grid_12 header-repeat">
                <div id="branding">
                    <div class="floatleft logo">
                        <!-- <img src="assets/img/livelogo.png" alt="Logo" /> -->
                    </div>
                    <div class="floatleft middle">
                        <h1>Income/Expense Statement</h1>
                    </div>
                    <div class="floatright">
                        <div class="floatleft">
                            <img src="assets/img/img-profile.jpg" alt="Profile Pic" /></div>
                        <?php
                        if (isset($_GET['action']) && $_GET['action'] == "logout") {
                            Session::destroy();
                        }
                        ?>

                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello <b><?php echo Session::get('adminName'); ?> ! </b></li>
                                <li><a href="?action=logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="index.php"><span>Home</span></a> </li>
                </ul>
            </div>
            <div class="clear">
            </div>
