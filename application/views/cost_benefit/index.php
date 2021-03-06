<script src="http://d3js.org/d3.v3.min.js"></script>
<div class="col-md-6">
	<p>Cost - Benefit Analysis</p>
	<?php if (!empty($allocation)): ?>
			<?php $i=1; ?>
			<?php foreach ($allocation as $a): ?>

 				<?php $attributes = array('id' => 'form-'.$i); ?>
				<?php echo form_open('cba/save/'.$a['allocation_id'].'/'.$this->uri->segment(2).'/'.$this->uri->segment(3), $attributes); ?>
				<table class="costtable">
					<tr>
						<td>#</td><td><?php echo $i; ?> (<?php echo $a['allocation_id']; ?>)</td>
					</tr>
					<tr>
						<td width="250">Option</td>
						<td width="75%"><b><?php echo $a['prcss_name']; ?></b> <small class="text-muted"><?php echo $a['flow_name']; ?>-<?php echo $a['flow_type_name']; ?></small><br><span class="text-info"><?php echo $a['best']; ?></span></td>
					</tr>
						<tr><td>CAPEX old option (€)</td>								
						<td><div class=" has-warning"><input type="text" name="capexold" id="capexold-<?php echo $i; ?>" class="form-control has-warning" value="<?php echo $a['capexold']; ?>" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>OPEX old option (€)</td>
						<td><input type="text" name="opexold" id="opexold-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Lifetime old option (yr)</td>
						<td><div class=" has-warning"><input type="text" name="ltold" id="ltold-<?php echo $i; ?>" value="<?php echo $a['ltold']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>CAPEX new option (€)</td>
						<td><div class=" has-warning"><input type="text" name="capexnew" id="capexnew-<?php echo $i; ?>" value="<?php echo $a['capexnew']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>OPEX new option (€)</td>
						<td><input type="text" name="opexnew" id="opexnew-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Lifetime new option (yr)</td>
						<td><div class=" has-warning"><input type="text" name="ltnew" id="ltnew-<?php echo $i; ?>" value="<?php echo $a['ltnew']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>Discount rate (%)</td>
						<td><div class=" has-warning"><input type="text" name="disrate" id="disrate-<?php echo $i; ?>"  value="<?php echo $a['disrate']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>Ann. costs old option</td>
						<td><input type="text" name="acold" id="acold-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Ann. costs new option</td>
						<td><input type="text" name="acnew" id="acnew-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Economic Cost/Benefit</td>
						<td><input type="text" name="eco" id="eco-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Unit</td>
						<td>Euro/Year</td>
					</tr>
					<tr>
						<td>Old Consumption</td><td><input type="text" name="oldcons" id="oldcons-<?php echo $i; ?>" class="form-control" value="<?php echo $a['qntty']; ?>"></td>
					</tr>
					<tr>
						<td>Old Total Cost</td><td><input type="text" name="oldcost" id="oldcost-<?php echo $i; ?>" class="form-control" value="<?php echo $a['cost']; ?>"></td>
					</tr>
					<tr>
						<td>Old Total EP</td><td><input type="text" name="oldep" id="oldep-<?php echo $i; ?>" class="form-control" value="<?php echo $a['ep']; ?>"></td>
					</tr>
					<tr>
						<td>Estimated new consumption</td>
						<td><div class=" has-warning"><input type="text" name="newcons" id="newcons-<?php echo $i; ?>" value="<?php echo $a['newcons']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td>Unit</td>
						<td><?php echo $a['qntty_unit']; ?>/year</td>
					</tr>
					<tr>
						<td>€/ Unit</td>
						<td><input type="text" name="euunit" id="euunit-<?php echo $i; ?>" class="form-control" value="<?php echo round($a['cost']/$a['qntty'],2); ?>" ></td>
					</tr>
					<tr>
						<td>EIP/ Unit</td>
						<td><input type="text" name="eipunit" id="eipunit-<?php echo $i; ?>" class="form-control" value="<?php echo round($a['ep']/$a['qntty'],2); ?>" ></td>
					</tr>
					<tr>
						<td>Ecological Benefit</td>
						<td><input type="text" name="ecoben" id="ecoben-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td>Unit</td>
						<td>EIP/year</td>
					</tr>
					<tr>
						<td>Marginal costs</td>
						<td><input type="text" name="marcos" id="marcos-<?php echo $i; ?>" class="form-control"></td>	
					</tr>
					<tr>
						<td>Unit</td><td>¢/EIP</td>
					</tr>
				</table>
				<input type="submit" value="Save" class="btn btn-block btn-info" style="margin-top:20px;"/>
				<script type="text/javascript">
					$('#form-<?php echo $i; ?> input').keydown(function(e){
						
						// Allow: backspace, delete, tab, escape, enter and .
						if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
						     // Allow: Ctrl+A
						    (e.keyCode == 65 && e.ctrlKey === true) || 
						     // Allow: home, end, left, right, down, up
						    (e.keyCode >= 35 && e.keyCode <= 40)) {
						         // let it happen, don't do anything
						         return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						    e.preventDefault();
						}

						//console.log("x<?php echo $i; ?>");
					});

					function calculate(){

						//OPEX OLD calculation
						$("#opexold-<?php echo $i; ?>").val($("#oldcons-<?php echo $i; ?>").val()*$("#euunit-<?php echo $i; ?>").val());

						//OPEX NEW calculation
						$("#opexnew-<?php echo $i; ?>").val($("#newcons-<?php echo $i; ?>").val()*$("#euunit-<?php echo $i; ?>").val());



						//Ann. costs old option calculation
						//D3*(J3*(1+J3)^F3)/((1+J3)^F3-1)+E3
						//capexold*(Discount*(1+Discount)^Lifetimeold)/(((1+Discount)^Lifetimeold)-1)+opexold
						$("#acold-<?php echo $i; ?>").val( 
							parseFloat($("#capexold-<?php echo $i; ?>").val()*( 
								$("#disrate-<?php echo $i; ?>").val()/100 * 
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
									))/(parseFloat(
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
									)
								)-(1)))
							+ parseFloat($("#opexold-<?php echo $i; ?>").val())
						);

						/*
						console.log(
							Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
								)-(1)
						);
						console.log(parseFloat($("#disrate-<?php echo $i; ?>").val()/100));
						console.log(parseFloat($("#ltold-<?php echo $i; ?>").val()));
						*/

						//Ann. costs new option calculation
						//D3*(J3*(1+J3)^F3)/((1+J3)^F3-1)+E3
						//capexold*(Discount*(1+Discount)^Lifetimeold)/(((1+Discount)^Lifetimeold)-1)+opexold
						$("#acnew-<?php echo $i; ?>").val( 
							parseFloat($("#capexnew-<?php echo $i; ?>").val()*( 
								$("#disrate-<?php echo $i; ?>").val()/100 * 
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltnew-<?php echo $i; ?>").val()
									))/(parseFloat(
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltnew-<?php echo $i; ?>").val()
									)
								)-(1)))
							+ parseFloat($("#opexnew-<?php echo $i; ?>").val())
						);

						//Ecological Benefit calculation
						$("#ecoben-<?php echo $i; ?>").val(-$("#eipunit-<?php echo $i; ?>").val() * ($("#newcons-<?php echo $i; ?>").val()-$("#oldcons-<?php echo $i; ?>").val()));
						
						//Economic cost-benefit calculation
						$("#eco-<?php echo $i; ?>").val($("#acnew-<?php echo $i; ?>").val()-$("#acold-<?php echo $i; ?>").val());


						//MArgianl-costs calculation
						//=EĞER(W3>0,M3/W3*100,-M3/W3*100)
						if($("#ecoben-<?php echo $i; ?>").val()>0){
							$("#marcos-<?php echo $i; ?>").val($("#eco-<?php echo $i; ?>").val()/$("#ecoben-<?php echo $i; ?>").val()*100);
						}
						else{
							$("#marcos-<?php echo $i; ?>").val(-$("#eco-<?php echo $i; ?>").val()/$("#ecoben-<?php echo $i; ?>").val()*100);
						}

					}


					$('#form-<?php echo $i; ?> input').change(calculate);
 				</script>
				<hr>
				<?php $i++; ?>
				</form>
				<script type="text/javascript">	$( document ).ready(calculate);</script>
			<?php endforeach ?>
		<?php endif ?>
</div>
<div class="col-md-6">
	<p>Cost - Benefit Graph</p>
	<?php //print_r($allocation); ?>
		<?php if (!empty($allocation)): ?>
			<table class="table" style="font-size:12px;">
				<tr>
					<th>Process Name</th><th>Marginal Cost</th><th>Econological Benefit</th>
				</tr>
			<?php foreach ($allocation as $a): ?>
				<tr><td><?php echo $a['prcss_name']; ?></td><td><?php echo $a['marcos']; ?></td><td><?php echo $a['ecoben']; ?></td></tr>
			<?php endforeach ?>
			</table>
		<?php endif ?>
	<div id="rect-demo-ana">
    <div id="rect-demo"></div>
  </div>
</div>
<?php
	//array defining
	$t=0;
	$toplameco=0;
	foreach ($allocation as $a) {


		if($a['marcos']>0){
			$tuna_array[$t]['ymax']= $a['marcos'];
		}
		else{
			$tuna_array[$t]['ymax']= 0;
		}

		$toplameco+=$a['ecoben'];
		$tuna_array[$t]['xmax']= intval($a['ecoben']);

		$eksieco = $toplameco - $a['ecoben'];
		$tuna_array[$t]['xmin']= $eksieco;

		if($a['marcos']>0){
			$tuna_array[$t]['ymin']= "0";
		}
		else{
			$tuna_array[$t]['ymin']= $a['marcos'];
		}
		$t++;
	}
	//print_r($tuna_array);
	//echo json_encode($tuna_array);
?>
<script type="text/javascript">
	setTimeout(function()
	{
		tuna_graph();
	}, 1000);

	function tuna_graph(){
	//console.log(list);

	//Tuna Graph
	var data = <?php echo json_encode($tuna_array); ?>;

	var margin = {
	            "top": 10,
	            "right": 30,
	            "bottom": 50,
	            "left": 50
	        };
	var width = 800;
	var height = 500;

	// Set the scales
  var x = d3.scale.linear()
          .domain([0, d3.max(data, function(d) { return d.xmin+d.xmax; })])
      		.range([0,width]).nice();

  var y = d3.scale.linear()
      		.domain([d3.min(data, function(d) { return d.ymin; }), d3.max(data, function(d) { return d.ymax; })])
      		.range([height, 0]).nice();

  var xAxis = d3.svg.axis().scale(x).orient("bottom");
  var yAxis = d3.svg.axis().scale(y).orient("left");

	// Create the SVG 'canvas'
  var svg = d3.select("#rect-demo-ana").append("svg")
          .attr("class", "chart")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom).append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.right + ")");

  svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0,"+ y(0) +")")
    .call(xAxis);

  svg.append("g")
    .attr("class", "y axis")
    .call(yAxis);

	svg.selectAll("rect").
		data(data).
		enter().
		append("svg:rect").
		attr("x", function(datum,index) { return x(datum.xmin); }).
		attr("y", function(datum,index) { return y(datum.ymax); }).
		attr("height", function(datum,index) { return y(datum.ymin)-y(datum.ymax); }).
		attr("width", function(datum, index) { return x(datum.xmax); }).
		attr("fill", function(d, i) { return d.ymax == 0 ? "rgba(143, 188, 143, 0.76)" : "rgba(25,155,205,0.8)"; });
	}
</script>