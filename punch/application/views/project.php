<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Punch Employee Management</title>
</head>
<body>


<h1> Projects </h1>

<a href="<?php echo base_url().'Test/Index'?>"> Home </a> <br><br>
<?php 

$e=json_decode($project , true);

?>
<a href="<?php echo base_url().'Test/addProject/'."$id" ?>"> Add New Project </a> <br><br>
<table style="width:100%">
  <tr>
    <td>Name</td>

  </tr> <br><br>
 
 

<?php
$e=json_decode($project , true);

$i=0;
$output="";


foreach ($e as $key => $value) {
	//print_r($value[0]["_id"]['$id']);
	while ($i < sizeof($value)) {
		# code...
		//echo $value[$i]["name"];
		 $output .= "<tr>";
        $output .= "<td>".$value[$i]["name"]. "</td>";
        $output .= "<td><a href = ".base_url().'Test/removeProject/?id1='.$value[$i]["_id"]['$id'].'&id2='.$id." </a> RemoveProject</td>";

        /* Append the rest of the fields */
     // End of row
     $output .= "</tr>";
		$i++;
	}
  
}
echo $output;
?>
</table>
                                   
</body>
</html>