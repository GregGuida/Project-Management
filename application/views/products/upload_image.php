<?php echo $error;?>

<?php echo form_open_multipart('product/create_image');?>

	<input type="file" name="userfile" size="20" />
	<input type="hidden" name="productId" />
	<br /><br />
	<input type="submit" value="upload" />

</form>

