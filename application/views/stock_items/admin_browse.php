<table class="zebra-striped" id="orderSortTable">
	<thead>
		<tr>
		<th class="header headerSortUp">Stock Item Id</th>
		<th class="red header headerSortUp">Product Id</th>
		<th class="yellow header headerSortUp">Ticket Number</th>
		<th class="blue header headerSortUp">Price</th>
		<th class="purple header headerSortUp">Date Processed</th>
		<th class="green header headerSortUp">Status</th>
		</tr>
	</thead>
	<tbody>
	<?php
		for ($i=0; $i<100; $i++){
			$status = array("In Stock","Sold","Delivery");

			echo '<tr id="'.(748932+$i).'">';
			echo '<td class="StockId"><a href="/stock/admin_show">'.(748932+$i).'</a></td>';
			echo '<td class="pid"><a href="/products/admin_show">'.(43214+$i*13).'</td>';
			echo '<td class="ticketNum">'.mt_rand ( 10000 , 39999 ).'</td>';
			echo '<td class="priceUSD">$'.(mt_rand ( 10 , 120 )+(mt_rand( 0,99)*0.01)).'</td>';
			echo '<td class="date">'.date('m-d-y H:i:s').'</td>';
			echo '<td class="Status">'.($status[rand ( 0, 2 )]).'</td></tr>';
		}
	?>
	</tbody>
</table>