<table class="zebra-striped" id="orderSortTable">
	<thead>
		<tr>
		<th class="header headerSortUp">Ticket Num</th>
		<th class="red header headerSortUp">Product Id</th>
		<th class="yellow header headerSortUp">Quantity</th>
		<th class="blue header headerSortUp">Unit Price</th>
		<th class="blue header headerSortUp">Total Price</th>
		<th class="purple header headerSortUp">Date Processed</th>
		</tr>
	</thead>
	<tbody>
	<?php
		for ($i=0; $i<100; $i++){
			$price = (mt_rand ( 10 , 120 )+(mt_rand( 0,99)*0.01));
			$quant = (mt_rand ( 1 , 5 )*100);

			echo '<tr id="'.(748932+$i).'">';
			echo '<td class="ticketNum"><a href="/stock/admin_show">'.(748932+$i).'</a></td>';
			echo '<td class="pid"><a href="/products/admin_show">'.(43214+$i*13).'</td>';
			echo '<td class="quantity">'.$quant.'</td>';
			echo '<td class="priceUSD">$'.$price.'</td>';
			echo '<td class="totalPriceUSD">$'.($price * $quant).'</td>';
			echo '<td class="date">'.date('m-d-y H:i:s').'</td>';
		}
	?>
	</tbody>
</table>