<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Punch Employee Management</title>
</head>
<body>


<h1> Want to Create , Edit OR View Employee ? </h1> 
<a href="<?php echo base_url().'Test/Index'?>"> Home </a> <br><br>
<a href="<?php echo base_url().'Test/createEmployee'?>"> Create New Employee </a> <br><br>
<table style="width:100%">
  <tr>
    <td>Name</td>
    <td>Email</td> 
    <td>Phone</td>
    <td>Designation</td>
    <td></td>

  </tr> <br><br>
 
 

<?php
$e=json_decode($employee , true);

$i=0;
$output="";


foreach ($e as $key => $value) {
	//print_r($value[0]["_id"]['$id']);
	while ($i < sizeof($value)) {
		# code...
		//echo $value[$i]["name"];
		 $output .= "<tr>";
        $output .= "<td>".$value[$i]["name"]. "</td>";
        $output .= "<td>".$value[$i]["email"]. "</td>";
        $output .= "<td>".$value[$i]["phone"]. "</td>";
        $output .= "<td>".$value[$i]["designation"]. "</td>";
        $output .= "<td><a href = ".base_url().'Test/editEmployee/'.$value[$i]["_id"]['$id'] ." </a>Edit</td>";

        /* Append the rest of the fields */
     // End of row
     $output .= "</tr>";
		$i++;
	}
	
	# code...
	//print_r($value[$i]["name"]);
  // $output .= "<tr>";
  //       $output .= "<td>".$value[$i]["name"]. "</td>";
  //       $output .= "<td>".$value[$i]["email"]. "</td>";
  //       $output .= "<td>".$value[$i]["phone"]. "</td>";
  //       $output .= "<td>".$value[$i]["designation"]. "</td>";
  //       $output .= "<td><a href = ".base_url().'Test/editEmployee/'.$value[$i]["_id"]['$id'] ." </a>Edit</td>";
        /* Append the rest of the fields */
     // End of row
     $output .= "</tr>";
  
}
echo $output;
?>
</table>
                                   
</body>
</html>