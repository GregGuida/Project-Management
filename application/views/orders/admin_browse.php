
<table class="zebra-striped" id="orderSortTable">
	<thead>
		<tr>
		<th class="header headerSortUp">Order #</th>
		<th class="red header headerSortUp">Customer #</th>
		<th class="yellow header headerSortUp">Shipping<br/>Address #</th>
		<th class="blue header headerSortUp">Status</th>
		<th class="purple header headerSortUp">Date Processed</th>
		<th class="green header headerSortUp">Total Amount</th>
		</tr>
	</thead>
	<tbody>
	    <?php foreach($orders as $order) { ?>
	        <tr id="">
			    <td class="ordno"><a href="/orders/admin_show/<?php echo $order['OrderNum'] ?>"><?php echo $order['OrderNum'] ?></a></td>
			    <td class="custno"><a href="/customers/admin_show/<?php echo $order['uid'] ?>"><?php echo $order['uid'] ?></a></td>
			    <td class="zip"><a href="/shipping_addresses/admin_show/<?php echo $order['sid'] ?>"><?php echo $order['sid'] ?></a></td>
			    <td class="status"><?php echo $order['Status'] ?></td>
			    <td class="date"><?php echo $order['Date'] ?></td>
			    <td class="total">$<?php echo $order['TotalPriceUSD'] ?></td>
			</tr>
	    <?php } ?>
	</tbody>
</table>