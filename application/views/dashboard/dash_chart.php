<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getBy['data']='1';
$data=$this->Dashboard_m->productChart($getBy);
// echo '<pre>';
// print_r($data);
?>


</script>
<div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                        <div class="card-stats-title">

						<div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div> 
</div></div></div></div>

<script type="text/javascript"> 

window.onload = function() { 
	$("#chartContainer").CanvasJSChart({ 
		title: { 
			text: " Products Cotegrise",
			fontSize: 24
		}, 
		axisY: { 
			title: "Products in %" 
		}, 
		legend :{ 
			verticalAlign: "center", 
			horizontalAlign: "right" 
		}, 
		data: [ 
		{ 
			type: "pie", 
			showInLegend: true, 
			toolTipContent: "{label} <br/> {y} %", 
			indexLabel: "{y} %", 
			dataPoints: [ 
				<?php foreach ($data as $key) {?>
					{ label: "<?=$key['prd_cat']?>",  y: "<?= round($key['Percentage'],2)?>", legendText: "<?=$key['product_count']." ".$key['prd_cat']?>"},
				<?php } ?>
				// { label: "Samsung",  y: 30.3, legendText: "Samsung"}, 
				// { label: "Apple",    y: 19.1, legendText: "Apple"  }, 
				// { label: "Huawei",   y: 4.0,  legendText: "Huawei" }, 
				// { label: "LG",       y: 3.8,  legendText: "LG Electronics"}, 
				// { label: "Lenovo",   y: 3.2,  legendText: "Lenovo" }, 
				// { label: "Others",   y: 39.6, legendText: "Others" } 
			] 
		} 
		] 
	}); 
} 

</script> 


