<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include './classes/Statement.php'; ?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    echo "<script> window.location='index.php';</script>";
} else {
    $id = $_GET['proid'];
}


$pd = new Statement();
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//    $catName = $_POST['catName'];
    $updateProduct = $pd->productUpdate($_POST, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>

            <?php
            $getPro = $pd->getProById($id);
            if ($getPro) {
                while ($value = $getPro->fetch_assoc()) {
                    ?>
                    <form action="" method="post">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="monthName" style="height:30px;border-radius:5px;margin-bottom:20px;" value="<?php echo $value['monthName']; ?>" class="medium" />
                                </td>
                            </tr>

                            
                            <tr>
                                <td>
                                    <label>Income</label>
                                </td>
                                <td>
                                    <input type="text" name="income" style="height:30px;border-radius:5px;margin-bottom:20px;" value="<?php echo $value['income']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Expense</label>
                                </td>
                                <td>
                                    <input type="text" name="expense" style="height:30px;border-radius:5px;margin-bottom:20px;" value="<?php echo $value['expense']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
            }
            ?>
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

