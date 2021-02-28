<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include './classes/Statement.php'; ?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script> window.location='index.php';</script>";
} else {
    $id = $_GET['id'];
}


$pd = new Statement();
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_POST['addincome'])) {
//    $catName = $_POST['catName'];
    $addIncomevar = $pd->incomeUpdate($_POST, $id);
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_POST['addexpense'])) {
//    $catName = $_POST['catName'];
    $addExpense = $pd->expenseUpdate($_POST, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if (isset($addIncomevar)) {
                echo $addIncomevar;
            }
            if (isset($addExpense)) {
                echo $addExpense;
            }
            ?>

                    <form action="" method="post">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Income</label>
                                </td>
                                <td>
                                    <input type="text" name="income" style="height:30px;border-radius:5px;margin-bottom:20px;" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="addincome" value="Add Income" style="font-size:15px;padding:10px;color:white;background:#204562;cursor:pointer;">
                                </td>
                            </tr>
                        </table>
                    </form>
                

                    <form action="" method="post">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Expense</label>
                                </td>
                                <td>
                                    <input type="text" name="expense" style="height:30px;border-radius:5px;margin-bottom:20px;" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                <input type="submit" name="addexpense" value="Add Expense" style="font-size:15px;padding:10px;color:white;background:#204562;cursor:pointer;">
                                </td>
                            </tr>
                        </table>
                    </form>
                
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<!-- <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script> -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>

