<?php $this->load->helper('url'); ?>
<h1> Edit Employee </h1>
<?php
$e = (array)json_decode($employee , true);
// print_r($e["employee"]["name"]);
//print_r( $e["employee"]['_id']['$id']);
?>
<form  action="<?php echo base_url().'Test/updateClientApi'?>" method = "post">
	<input type="input" name="name" value="<?php echo $e["client"]["name"] ?>"> <br><br>
	<input type="input" name="phone" value="<?php echo $e["client"]["phone"] ?>"> <br><br>
	<input type="input" name="email" value="<?php echo $e["client"]["email"] ?>"> <br><br>
	<input type="input" name="designation" value="<?php echo $e["client"]["designation"] ?>"> <br><br>
	<input type="hidden" name="id" value="<?php echo $e["client"]['_id']['$id'] ?>"> <br><br>

	<input type="submit" name="submit" value="update">

</form>