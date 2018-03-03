<?php $this->load->helper('url'); ?>
<h1> Create Client </h1>

<form  action="<?php echo base_url().'Test/createClientApi'?>" method = "post">
	<input type="input" name="name" placeholder="Please Enter Name"> <br><br>
	<input type="input" name="phone" placeholder="phone"> <br><br>
	<input type="input" name="email" placeholder="email"> <br><br>
	<input type="input" name="designation" placeholder="Designation"> <br><br>

	<input type="submit" name="submit" value="create">

</form>