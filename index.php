<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include './classes/Statement.php'; ?>
<?php include_once './helpers/Format.php';?>
<?php
$pd = new Statement();
$fm = new Format();
if(isset($_GET['delpro'])){
    $id= $_GET['delpro'];
    $delpro=$pd->delProById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Income/Expense Statement</h2><br><div style="text-align:right;"><a href="incomeadd.php" style="color:white;background:green;padding:10px !important;margin:10px;border-radius:5px;">+ Create New</a></div>
        <div class="block">  
            <?php
            if(isset($delpro)){
                echo $delpro;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Month Name</th>
                        <th>Income</th>
                        <th>Expense</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $getPd= $pd->getAllProduct();
                    if ($getPd){
                        $i=0; $income=0; $expense=0;
                        while ($result=$getPd->fetch_assoc()){
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['monthName'];?></td>
                        <td>৳ <?php echo $result['income'];?></td>
                        <td>৳ <?php echo $result['expense'];?></td>
                        <td><?php echo $result['date'];?></td>
                        <td>
                        <a href="addincex.php?id=<?php echo $result['id'];?>">Add <span style="font-weight:none !important;">( Income/Expense)</span></a> || 
                        <a  href="incomeedit.php?proid=<?php echo $result['id'];?>">Edit</a> ||
                            <a onclick="return confirm('Are you sure to Delete?');" 
                               href="?delpro=<?php echo $result['id'];?>">Delete</a>
                        </td>
                    </tr>
                        <?php
                                $income = $income + (int)$result['income'];
                                $expense = $expense + (int)$result['expense'];
                                $net =$income-$expense;
                        ?>
                    <?php }}?>
                </tbody>
            </table>
            
            <table class="table" style="margin:20px;padding:20px;text-align:center;border:1px solid grey;">

            <tbody>
                <tr>
                <th scope="row"  style="margin:10px;padding:10px;">Total Income :</th>
                <td style="margin:10px;padding:10px;font-size:18px;">৳ <?php echo $income; ?></td>
                </tr>
                <tr>
                <th scope="row"  style="margin:10px;padding:10px;">Total Expense :</th>
                <td style="margin:10px;padding:10px;font-size:18px;">৳ <?php echo $expense; ?></td>
                </tr>
                <tr>
                <th scope="row"  style="margin:10px;padding:10px;">Net Income/loss :</th>
                <td style="margin:10px;padding:10px;font-size:18px;">৳ <?php echo $net; ?></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>
