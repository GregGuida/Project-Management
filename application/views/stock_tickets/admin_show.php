<div class="row">
    <div id="stock-ticket-show" class="span8 offset4"> 
    	<h1>Stock Ticket #<?php echo $stock_ticket['ticketNum'] ?></h1>
    		<h4>Product Type</h4>
    		<div class="product-preview row">
    			<span class="span2" />
    				<img class="thumbnail image_90x90" src="<?php echo $stock_ticket['location'] ?>" />
    			</span>
    			<p class="span6">
    				<strong class="product-preview-title"><a href="/products/admin_show/<?php echo $stock_ticket['pid'] ?>"><?php echo $stock_ticket['name'] ?></a></strong><br/>
    				<span><?php echo $stock_ticket['description'] ?></span>
    			</p>
    		</div>

    		<h4>Quantity</h4>
    		<p><?php echo $stock_ticket['Quantity'] ?> Units<p>

    		<h4>Unit Price</h4>
    		<p>$<span class="unitPrice"><?php echo $stock_ticket['PriceUSD'] ?></span></p>

    		<h4>Total Price</h4>
    		<p>$<span class="totalPrice"><?php echo money_format('%.2n', $stock_ticket['PriceUSD'] * $stock_ticket['Quantity']) ?></span></p>
    		
            <h4>Status</h4>
            <p><span class="status"><?php echo $stock_ticket['Status'] ?></span></p>
    		
    		<?php if($stock_ticket['Status'] === 'Delivered') { ?>
                <h4>Stock Item(s)</h4>
    		    <table class="zebra-striped" id="orderSortTable">
                	<thead>
                		<tr>
                		    <th class="header headerSortUp">Stock Id</th>
                    		<th class="red header headerSortUp">Price USD</th>
                    		<th class="yellow header headerSortUp">Date Added</th>
                    		<th class="blue header headerSortUp">Status</th>
                		</tr>
                	</thead>
                	<tbody>
                	<?php foreach($stock_items as $item) { ?>
                	    <tr id="<?php echo $item['stockID'] ?>">
                		    <td class="stockID align-center">#<?php echo $item['stockID'] ?></td>
                    		<td class="priceUSD align-right">$<?php echo $item['PriceUSD'] ?></td>
                    		<td class="date align-center"><?php echo $item['DateAdded'] ?></td>
                    		<td class="status"><?php echo $item['Status'] ?></td>
                		</tr>
                	<?php } ?>
                	</tbody>
                </table>
            <?php } ?>
    </div>
</div>