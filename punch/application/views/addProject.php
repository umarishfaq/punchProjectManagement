<?php $this->load->helper('url');
//echo $id; die();
 ?>
<h1> Add Project </h1>
<a href="<?php echo base_url().'Test/Index'?>"> Home </a> <br><br>
<?php  //echo $id; die();?>
<form  action="<?php echo base_url().'Test/addProjectApi'?>" method = "post">
	<input type="input" name="name" placeholder="Please Enter Name"> <br><br>
	<input type="hidden" name="id" value="<?php echo $id ?>"> <br><br>
	<input type="submit" name="submit" value="Add">

</form>