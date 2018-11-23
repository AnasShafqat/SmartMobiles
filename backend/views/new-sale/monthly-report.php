
<!DOCTYPE html>
<html>
<head>
	<title>Monthly Sale</title>
</head>
<body>

<!-- <form action="index.php?r=new-sale/monthly-report" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="text" name="startDate" /><br>
        <input type="text" name="endDate"  /><br>
        <input type="submit" name="submit" value="allah kry value pass ho jay"> 
</form> -->

<div class="container">

    <form action="monthly-sale-report" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h2>Monthly Sale</h2><hr>
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
                    <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                </div>    
            </div>
        </div>
    </form>    

    <?php    
    	if(isset($_POST["submit"])){
    	$startDate = $_POST["startDate"];
    	$endDate = $_POST["endDate"];

        $newSale = Yii::$app->db->createCommand("SELECT * FROM new_sale WHERE CAST(date_of_sale AS DATE) >= '$startDate' OR CAST(date_of_sale AS DATE) <= $endDate")->queryAll();
    ?>

<!-- print-content start -->
<div id="print-content">
    <div class="row">
        <div class="col-md-12">
           <table class="table table-hover">
                <tr align="center">
                    <th colspan="7" class="text-center warning">
                        <h3 style="color:#ec971f;">Monthly Sale Report</h3>
                </tr>
                <tr class="primary">
                    <th>Date Of Sale</th>
                    <th>Customer Name</th>
                    <th>Customer Phone No</th>
                    <th>Mobile Brand</th>
                    <th>Mobile Model</th>
                    <th>IMEI</th>
                    <th>Sale Price</th>
                </tr>
                <?php
                    $monthlySale = 0;
                    foreach($newSale as $item) { 
                        $purchaseID = $item['purchase_id'];
                        $newPurchase = Yii::$app->db->createCommand("SELECT IMEI FROM new_purchase WHERE purchase_id = '$purchaseID'")->queryAll();

                        foreach ($newPurchase as $purchaseItem) {        
                ?>
                <tr>
                    <td><?php echo $item['date_of_sale'] ?></td>
                    <td><?php echo $item['customer_name'] ?></td>
                    <td><?php echo $item['customer_contact_no'] ?></td>
                    <td><?php echo $item['cell_phone_brand'] ?></td>
                    <td><?php echo $item['cell_phone_model'] ?></td>
                    <td><?php echo $purchaseItem['IMEI'] ?></td>
                    <td><?php echo $item['sale_price'] ?></td>
                </tr>
                <?php 
                        $monthlySale = $monthlySale + $item['sale_price'];
                    }
                }
                ?>
            </table> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-hover">
            <tr class="warning">
                <td style="color:#ec971f;"><b>Monthly Sale</b></td>
                <td style="color:#ec971f;"><b><?php echo "Rs = ".$monthlySale; ?></b></td>
            </tr>
        </table>    
        </div>
    </div>
        
    <?php
    	}
    ?>

    <!-- <div class="row">
        <div class="col-md-12">
            <table width="100%">
                <tr>
                    <td align="center"><p style="font-size:12px; text-align:center;">Copyrights &copy; <?php echo date("Y"); ?> All Rights Reserved By Smart Mobiles</p></td>
                </tr>
            </table>
        </div>
    </div> -->

</div>
<!-- print-content close-->

    <!-- <right style="float: right;">
        <button class="btn btn-warning hidden-print" id="btnprint" onclick="printDiv('print-content')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print </button>
    </right> -->
    <!-- print button -->
    

</div>
<!-- container -->
</body>
</html>

<script type="text/javascript">
function printDiv(divName) {
    var ButtonControl = document.getElementById("btnprint");
    // show html content...
    var printContents = document.getElementById(divName).innerHTML;
    w=window.open();
    w.document.write(printContents);
    w.print();
    w.close();  
}
</script>