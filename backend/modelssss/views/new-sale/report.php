<?php use yii\helpers\Html; ?>
<!DOCTYPE html>
<html>
<head>
	<title>New Sale Report</title>
</head>
<body>

<div class="container">
	
<div id="print-content">
<table width="100%" class="table table-striped" style="font-family:verdana; font-size:9px;">

	<tr>
		<td colspan="4" style="text-align:center;"><p style="font-family:Georgia; font-size:16px;"><b>HAFIZ MOBILES</b><br>
			<p style="font-size:10px;">Railway Road, RYK, CELL # 03317548107</p></p>
		</td><hr>
	</tr>
	<tr>
		<th align="left">Bill #</th>
		<!-- echo id -->
		<td><?= Html::encode($model->sale_id) ?></td>		
		<th align="left">Date:</th>
	</tr>
	<tr>
		<th align="left">Name:</th>
		<!-- echo name -->
		<td><?= Html::encode($model->customer_name) ?></td>
		<td colspan="2" align="left">
			<!-- echo date -->
			<?= Html::encode($model->date_of_sale) ?>
		</td>
	</tr>
	<tr>
		<th align="left">DESCRIPTION</th>
		<th align="left">IMEI</th>
		<th align="left">PRICE</th>
		<th align="left">AMOUNT</th>
	</tr>
	<tr>
		<td><?= Html::encode($model->cell_phone_brand . ' ' .$model->cell_phone_model) ?></td>
		<td><?= Html::encode($model->IMEI) ?></td>
		<td><?= Html::encode($model->sale_price) ?></td>
		<td><?= Html::encode($model->sale_price) ?></td>
	</tr>
</table>
<br><br><br><br>
<div class="row">
	<div class="col-md-12">
		<table width="150px" style="float:right; font-family:verdana; font-size:10px;">
			<tr>
				<td align="right"><b>Total Bill: Rs.</b></td>
				<td align="right"><?= Html::encode($model->sale_price) ?></td>
			</tr>
			<tr>
				<td align="right"><b>NET: Rs.</b></td>
				<td align="right"><?= Html::encode($model->sale_price) ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table width="100%">
			<tr>
				<td style="font-size:6px" align="center">Thanks for shopping here!</td>
			</tr>
			<tr>
				<td align="center"><p style="font-size:8px; text-align:center;">DEVELOPED & DESIGNED BY: DEXDEVS | CELL # 03317375027</p></td>
			</tr>
		</table>
	</div>
</div>
</div>
</div>

</table>

<!-- <input id="btnprint" type="button" onclick="printDiv('print-content')" value="print a div!"/> -->

<img src="images/printer.png" id="btnprint" type="button" onclick="printDiv('print-content')" align="image not found" width="50px" height="50px" style="float:right;">

</body>
</html>

<script type="text/javascript">
function printDiv(divName) {
    //hidden_div
    // var hideDiv = document.getElementById("hidden_div");
    // hideDiv.style.visibility = "block";
    // hide print putton on print view....
    var ButtonControl = document.getElementById("btnprint");
    ButtonControl.style.visibility = "hidden";
    // show html content...
    var printContents = document.getElementById(divName).innerHTML;
    w=window.open();
    w.document.write(printContents);
    w.print();
    w.close();
}
</script>