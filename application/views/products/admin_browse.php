
	<?php
	  if ( $products ) {
	?>

<div class="page-header">
  <h2>The things that make us money!</h2>
</div>
<table class="zebra-striped" id="orderSortTable">
	<thead>
		<tr>
			<th class="red header ">Product Id</th>
			<th class="yellow header ">Name</th>
			<th class="blue header ">Category</th>
			<th class="blue header ">Description</th>
			<th class="purple header ">Price</th>
		</tr>
	</thead>
	<tbody>

	<?php
		foreach ($products as $product) {
			echo '<tr id="'.$product['pid'].'">';
			echo '  <td class="pid"><a href="/products/admin_show/'.$product['pid'].'">'.$product['pid'].'</td>';
			echo '  <td class="name"><a href="/products/admin_show/'.$product['pid'].'">'.$product['Name'].'</a></td>';
			echo '  <td class="category">'.$product['name'].'</td>';
			echo '  <td class="description">'.substr($product['Description'],0,144).'</td>';
			echo '  <td class="priceUSD">$'.$product['PriceUSD'].'</td>';
			echo '</tr>';
		}
	?>

	</tbody>
</table> 

    <?php
	  } else {
	  	echo '<h1> There are currently no products </h1>';
	  }
	?>

