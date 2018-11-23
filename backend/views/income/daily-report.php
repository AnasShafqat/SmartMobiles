
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<!--     <form action="index.php?r=income/daily-report" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="text" name="startDate" /><br>
        <input type="submit" name="submit" value="allah kry value pass ho jay"> 
    </form> -->

<div class="container">
    <form action="daily-income-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Daily Income</h2><hr>
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
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
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
        
        $dailyIncome = Yii::$app->db->createCommand("SELECT date,income_name,amount,total_amount FROM income WHERE CAST(date AS DATE) = '$startDate' ")->queryAll();
?>

<table class="table table-striped">
    <tr align="center">
        <th colspan="7" class="text-center success"><h3 style="color:#169F85;">Daily Income Report</h3></th>
    </tr>
        <th>Date</th>
        <th>Income Name</th>
        <th>Amount</th>
        <!-- <th>Total Amount</th> -->
    </tr>
    <?php
        $totaIncome = 0; 
        foreach($dailyIncome as $item) { ?>
    <tr>
        <td><?php echo $item['date'] ?></td>
        <td><?php echo $item['income_name'] ?></td>
        <td><?php echo $item['amount'] ?></td>
        <td><?php //echo $item['total_amount'] ?></td>
    </tr>
    <?php 
        $totaIncome = $totaIncome + $item['amount']; 
        } 
    ?>
</table>
<div class="row">
    <div class="col-md-4">
        <table class="table table-hover">
        <tr class="success">
            <td style="color:#169F85;" colspan="6"><b>Daily Income</b></td>
            <td style="color:#169F85;"><b><?php echo "Rs = ".$totaIncome; ?></b></td>
        </tr>
    </table>    
    </div>
</div>
<?php
    }
?>