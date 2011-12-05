<?php if (isset($error)) { echo $error; }?>


<form action="/products/create_image" method="post" accept-charset="utf-8" enctype="multipart/form-data">

	<input type="file" name="userfile" size="20" />
	<input type="hidden" name="productId" value="<?php echo $pid?>"/>
	<br /><br />
	<input type="submit" value="upload" />

</form>


