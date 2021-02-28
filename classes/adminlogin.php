<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/Session.php');
Session::checkLogin();
include_once ($filepath . '/../lib/Database.php');
include_once ($filepath . '/../helpers/Format.php');
?>
<?php

class Adminlogin {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminRegister($data) {
        $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
        $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
        $adminpass = mysqli_real_escape_string($this->db->link, md5($data['adminpass']));

        if ($adminName == "" || $adminEmail == "" || $adminpass == "") {
            $msg = "<span style='color:red;font-size:18px;'>Fields must not be empty !</span>";
            return $msg;
        } 
        $mailquery = "SELECT * FROM tbl_admin WHERE adminEmail= '$adminEmail' LIMIT 1";
        $mailchk = $this->db->select($mailquery);
        if ($mailchk != FALSE) {
            $msg = "<span style='color:red;font-size:18px;'> Email Already Exist !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_admin(adminName,adminEmail ,adminpass ) VALUES 
                    ('$adminName','$adminEmail','$adminpass')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $query = "SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' AND adminpass='$adminpass'";
                $result = $this->db->select($query);
                if ($result != FALSE) {
                    $value = $result->fetch_assoc();
                    Session:: set("adminlogin", true);
                    Session:: set("adminId", $value['adminId']);
                    Session:: set("adminEmail", $value['adminEmail']);
                    Session:: set("adminName", $value['adminName']);
                    header("Location:index.php");
                }
            } else {
                $msg = "<span style='color:red;font-size:18px;'>User Information Not Inserted!!</span>";
                return $msg;
            }
        }
    }

    public function adminLogin($adminEmail, $adminPass) {
        $adminEmail = $this->fm->validation($adminEmail);
        $adminPass = $this->fm->validation($adminPass);
        $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminEmail) || empty($adminPass)) {
            $loginms = "Username or Password must not be empty !";
            return $loginms;
        } else {
            $query = "SELECT * FROM  tbl_admin WHERE adminEmail = '$adminEmail' AND adminPass ='$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session:: set("adminlogin", true);
                Session:: set("adminId", $value['adminId']);
                Session:: set("adminEmail", $value['adminEmail']);
                Session:: set("adminName", $value['adminName']);
                header("Location:index.php");
            } else {
                $loginms = "Email or Password not match !";
                return $loginms;
            }
        }
    }

}

?>