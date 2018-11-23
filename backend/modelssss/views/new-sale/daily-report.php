<!DOCTYPE html>
<html>
<head>
    <title>Daily Sale</title>
</head>
<body>
    <!-- <form action="index.php?r=new-sale/daily-report" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="date" name="startDate" /><br>
        <input type="submit" name="submit" value="SUBMIT" class="btn btn-success"> 
    </form> -->

<div class="container">
    <form action="daily-sale-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Daily Sale</h2><hr>
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
                    <button type="submit" name="submit" class="btn btn-warning">Submit</button>
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
        $newSale = Yii::$app->db->createCommand("SELECT * FROM new_sale WHERE CAST(date_of_sale AS DATE) = '$startDate' ")->queryAll();
?>

<table class="table table-striped">
    <tr align="center">
        <th colspan="7" class="text-center warning"><h3 style="color:#F98822;">Daily Sale Report</h3></th>
    </tr>
    <tr>
        <th>Date Of Sale</th>
        <th>Customer Name</th>
        <th>Customer Phone No</th>
        <th>Mobile Brand</th>
        <th>Mobile Model</th>
        <th>IMEI</th>
        <th>Sale Price</th>
    </tr>
    <?php 
        $dailySale = 0;
        foreach($newSale as $item) { ?>
    <tr>
        <td><?php echo $item['date_of_sale'] ?></td>
        <td><?php echo $item['customer_name'] ?></td>
        <td><?php echo $item['customer_contact_no'] ?></td>
        <td><?php echo $item['cell_phone_brand'] ?></td>
        <td><?php echo $item['cell_phone_model'] ?></td>
        <td><?php echo $item['IMEI'] ?></td>
        <td><?php echo $item['sale_price'] ?></td>
    </tr>
    <?php 
        $dailySale = $dailySale + $item['sale_price'];
        } 
    ?>
</table>

<div class="row">
    <div class="col-md-4">
        <table class="table table-hover">
        <tr class="warning">
            <td style="color:#F98822;" colspan="6"><b>Daily Sale</b></td>
            <td style="color:#F98822;"><b><?php echo "Rs = ".$dailySale; ?></b></td>
        </tr>
    </table>    
    </div>
</div>

<?php
    }
?>