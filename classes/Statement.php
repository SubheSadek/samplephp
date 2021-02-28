<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/Database.php');
include_once ($filepath . '/../helpers/Format.php');
?>


<?php

class Statement {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function productInsert($data, $file) {
        $monthName = mysqli_real_escape_string($this->db->link, $data['monthName']);
        $income = mysqli_real_escape_string($this->db->link, $data['income']);
        $expense = mysqli_real_escape_string($this->db->link, $data['expense']);


        $monthchkquery = "SELECT * FROM tbl_statement WHERE monthName= '$monthName' LIMIT 1";
        $monthchk = $this->db->select($monthchkquery);

        if ($monthName == "" || $income == "" || $expense == "") {
            $msg = "<span class='error'>Fields must not be empty !</span>";
            return $msg;
        }elseif($monthchk != FALSE){
            $msg = "<span style='color:red;font-size:18px;'> This Month Already Exist !</span>";
            return $msg;
        }else {
            $query = "INSERT INTO tbl_statement(monthName, income, expense) VALUES ('$monthName', '$income','$expense')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Data Inserted Successfully!!</span>";
                return $msg;
            }else {
                $msg = "<span class='error'>Data Not Inserted!!</span>";
                return $msg;
            }
        }
    }

    public function getAllProduct() {
        $query = "SELECT * FROM tbl_statement";

        /* $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
          FROM tbl_product
          INNER JOIN tbl_category
          ON tbl_product.catId = tbl_category.catId
          INNER JOIN tbl_brand
          ON tbl_product.brandId = tbl_brand.brandId
          ORDER BY tbl_product.productId DESC"; */
        $result = $this->db->select($query);
        return $result;
    }

    public function getProById($id) {
        $query = "SELECT * FROM tbl_statement WHERE id ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function productUpdate($data, $id) {
        $monthName = mysqli_real_escape_string($this->db->link, $data['monthName']);
        $income = mysqli_real_escape_string($this->db->link, $data['income']);
        $expense = mysqli_real_escape_string($this->db->link, $data['expense']);


        if ($monthName == "" || $income == "" || $expense == "") {
            $msg = "<span class='error'>Fields must not be empty !</span>";
            return $msg;
        } else {
                    $query = " UPDATE tbl_statement
                    SET
                        monthName='$monthName',
                        income='$income',
                        expense='$expense'
                          WHERE id ='$id'";

                    $inserted_row = $this->db->update($query);
                    if ($inserted_row) {
                        $msg = "<span class='success'>Record Updated Successfully!!</span>";
                        return $msg;
                    }else {
                        $msg = "<span class='error'>Product Not Updated!!</span>";
                        return $msg;
                    }
       
        }
    }

    public function incomeUpdate($data, $id) {
        $income = mysqli_real_escape_string($this->db->link, $data['income']);

        $incomequery = "SELECT * FROM tbl_statement WHERE id= '$id' LIMIT 1";
        $incomechk = $this->db->select($incomequery)->fetch_assoc();

        if ($income == "") {
            $msg = "<span class='error'>Income must not be empty !</span>";
            return $msg;
        } else {
                $addincome =$income+$incomechk['income'];
                    $query = " UPDATE tbl_statement SET income='$addincome'  WHERE id ='$id'";

                    $inserted_row = $this->db->update($query);
                    if ($inserted_row) {
                        $msg = "<span class='success'>Income Updated Successfully!!</span>";
                        return $msg;
                    }else {
                        $msg = "<span class='error'>Income Not Updated!!</span>";
                        return $msg;
                    }
       
        }
    }

    public function expenseUpdate($data, $id) {
        $expense = mysqli_real_escape_string($this->db->link, $data['expense']);

        $expensequery = "SELECT * FROM tbl_statement WHERE id= '$id' LIMIT 1";
        $expensechk = $this->db->select($expensequery)->fetch_assoc();

        if ($expense == "") {
            $msg = "<span class='error'>Expense must not be empty !</span>";
            return $msg;
        } else {
                $addexpense =$expense+$expensechk['expense'];
                    $query = " UPDATE tbl_statement SET expense='$addexpense'  WHERE id ='$id'";

                    $inserted_row = $this->db->update($query);
                    if ($inserted_row) {
                        $msg = "<span class='success'>Expense Updated Successfully!!</span>";
                        return $msg;
                    }else {
                        $msg = "<span class='error'>Expense Not Updated!!</span>";
                        return $msg;
                    }
       
        }
    }

    public function delProById($id) {
        $query = "SELECT * FROM tbl_statement WHERE id ='$id'";
        $getData = $this->db->select($query);
        $query = "DELETE FROM tbl_statement WHERE id='$id'";
        $delProduct = $this->db->delete($query);
        if ($delProduct) {
            $msg = "<span class='success'>Data Deleted Successfully!!</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Data Not  Deleted!!</span>";
            return $msg;
        }
    }

 
    
}
