
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<!-- <form action="index.php?r=expense/monthly-report" method="POST">
	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	<input type="text" name="startDate" /><br>
	<input type="text" name="endDate"  /><br>
	<input type="submit" name="submit" value="allah kry value pass ho jay">	
</form> -->

<div class="container">

    <form action="monthly-expense-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Monthly Expense</h2><hr>
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Start Date</label>
                    <input type="date" name="startDate" class="form-control">          
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select End Date</label>
                    <input type="date" name="endDate" class="form-control">          
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
		$endDate = $_POST["endDate"];

        $monthlyExpense = Yii::$app->db->createCommand("SELECT date,expense_name,amount,total_amount FROM expense WHERE CAST(date AS DATE) >= '$startDate' OR CAST(date AS DATE) <= $endDate")->queryAll();
?>

<table class="table table-striped">
    <tr align="center">
        <th colspan="7" class="text-center danger"><h3 style="color:red;">Monthly Expense Report</h3></th>
    </tr>
        <th>Date</th>
        <th>Expense Name</th>
        <th>Amount</th>
    <!-- <th>Total Amount</th> -->
    </tr>
    <?php 
        $totalExpense = 0;
        foreach($monthlyExpense as $item) { ?>
    <tr>
        <td><?php echo $item['date'] ?></td>
        <td><?php echo $item['expense_name'] ?></td>
        <td><?php echo $item['amount'] ?></td>
        <td><?php // echo $item['total_amount'] ?></td>
    </tr>
    <?php 
        $totalExpense = $totalExpense + $item['amount'];
    }
        $query = (new \yii\db\Query())->from('expense')->WHERE(['purchase_id' => 11]);
        $sum = $query->sum('amount');

        $totalMobileExpense = $totalExpense - $sum;

    ?>
</table>
<div class="row">
    <div class="col-md-4">
        <table class="table primary">
            <tr class="btn-primary">
                <td><b>Monthly Purchased Mobiles Expense       | </b></td>
                <td><b><?php echo "Rs = ".$totalMobileExpense; ?></b></td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table">
            <tr class="btn-warning">    
                <td><b>Monthly General Expense | </b></td>
                <td><b><?php echo "Rs = ".$sum; ?></b></td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">    
        <table class="table">
            <tr class="btn-danger">
                <td><b>Total Monthly Expense | </b></td>
                <td><b><?php echo "Rs = ".$totalExpense; ?></b></td>
            </tr>
        </table>    
    </div>
</div>

<div class="row">
        
</div>        


<?php
	}
?>