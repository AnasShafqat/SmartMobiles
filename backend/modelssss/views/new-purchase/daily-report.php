
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <!-- <form action="index.php?r=new-purchase/daily-report" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="text" name="startDate" /><br>
        <input type="submit" name="submit" value="allah kry value pass ho jay"> 
    </form> -->

<div class="container">
    <form action="daily-purchase-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Daily Purchase</h2><hr>
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
                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
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
        
        $newPurchase = Yii::$app->db->createCommand("SELECT IMEI,seller_name,seller_contact_no,purchase_price,date_of_purchase,cell_phone_brand,cell_phone_model FROM new_purchase WHERE CAST(date_of_purchase AS DATE) = '$startDate' ")->queryAll();
?>

<table class="table table-striped">
    <tr align="center">
        <th colspan="7" class="text-center info"><h3 style="color:#1B8FE2;">Daily Purchase Report</h3></th>
    </tr>
        <th>Date Of Purchase</th>
        <th>Seller Name</th>
        <th>Seller Contact No</th>
        <th>Mobile Brand</th>
        <th>Mobile Model</th>
        <th>IMEI</th>
        <th>Purchase Price</th>
    </tr>
    <?php 
        $dailyPurchase = 0;
        foreach($newPurchase as $item) { ?>
    <tr>
        <td><?php echo $item['date_of_purchase'] ?></td>
        <td><?php echo $item['seller_name'] ?></td>
        <td><?php echo $item['seller_contact_no'] ?></td>
        <td><?php echo $item['cell_phone_brand'] ?></td>
        <td><?php echo $item['cell_phone_model'] ?></td>
        <td><?php echo $item['IMEI'] ?></td>
        <td><?php echo $item['purchase_price'] ?></td>
    </tr>
    <?php 
        $dailyPurchase = $dailyPurchase + $item['purchase_price'];
        } 
    ?>
</table>
<div class="row">
    <div class="col-md-4">
        <table class="table table-hover">
        <tr class="info">
            <td style="color:#1B8FE2;;" colspan="6"><b>Daily Purchase</b></td>
            <td style="color:#1B8FE2;;"><b><?php echo "Rs = ".$dailyPurchase; ?></b></td>
        </tr>
    </table>    
    </div>
</div>
<?php
    }
?>