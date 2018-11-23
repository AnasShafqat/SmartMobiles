
<!DOCTYPE html>
<html>
<head>
    <title>Daily Expense</title>
</head>
<body>
    <!-- <form action="index.php?r=expense/daily-report" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="text" name="startDate" /><br>
        <input type="submit" name="submit" value="allah kry value pass ho jay"> 
    </form> -->

<div class="container">
    <form action="daily-expense-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Daily Expense</h2><hr>
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Date</label>
                    <input type="date" name="startDate" class="form-control">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                </div>    
            </div>
        </div>
    </form>    
</div>

</body>
</html>

<?php
    if(isset($_POST["submit"])){

        $startDate = $_POST["startDate"];
        $dailyExpense = Yii::$app->db->createCommand("SELECT date,expense_name,amount,total_amount FROM expense WHERE CAST(date AS DATE) = '$startDate' ")->queryAll();
?>

<table class="table table-striped">
    <tr align="center">
        <th colspan="7" class="text-center danger"><h3 style="color:red;">Daily Expense Report</h3></th>
    </tr>
        <th>Date</th>
        <th>Expense Name</th>
        <th>Amount</th>
       <!-- <th>Total Amount</th> -->
    </tr>
    <?php 
        $totalExpense = 0;
        foreach($dailyExpense as $item) { ?>
    <tr>
        <td><?php echo $item['date'] ?></td>
        <td><?php echo $item['expense_name'] ?></td>
        <td><?php echo $item['amount'] ?></td>
        <td><?php //echo $item['total_amount'] ?></td>
    </tr>
    <?php 
        $totalExpense = $totalExpense + $item['amount'];
        } 
    ?>
</table>
<div class="row">
    <div class="col-md-4">
        <table class="table table-hover">
            <tr class="danger">
                <td style="color:red;"><b>Daily Expense</b></td>
                <td style="color:red;"><b><?php echo "Rs = ".$totalExpense; ?></b></td>
            </tr>
        </table>    
    </div>
</div>
<?php
    }
?>