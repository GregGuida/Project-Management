
<table class="zebra-striped" id="orderSortTable">
	<thead>
		<tr>
		<th class="header headerSortUp">Order #</th>
		<th class="red header headerSortUp">Customer #</th>
		<th class="yellow header headerSortUp">Shipping<br/>Zip Code</th>
		<th class="blue header headerSortUp">Status</th>
		<th class="purple header headerSortUp">Date Processed</th>
		<th class="green header headerSortUp">Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
		for ($i=0; $i<100; $i++){
			echo '<tr id="'.(748932+$i).'">';
			echo '<td class="ordno"><a href="/orders/admin_show">'.(748932+$i).'</a></td>';
			echo '<td class="custno"><a href="/customers/admin_show">'.(43214+$i*13).'</td>';
			echo '<td class="zip">'.mt_rand ( 10000 , 39999 ).'</td>';
			echo '<td class="status">Shipped</td>';
			echo '<td class="date">'.date('m-d-y H:i:s').'</td>';
			echo '<td class="total">$'.(mt_rand ( 10 , 500 )+(mt_rand( 0,99)*0.01)).'</td></tr>';
		}
	?>
	</tbody>
</table>