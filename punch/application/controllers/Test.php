<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function Index()
	{
		$this->load->view('home');
	}
	public function employee() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/punchAPI/Api/employee",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		  
		CURLOPT_HTTPHEADER => array(
			"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}
		$data['employee'] = $response;
		$this->load->view('employee' , $data);

	}

	public function createEmployee() {
		$this->load->view('createEmployee');
	}
	public function createEmployeeApi() {
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$designation = $this->input->post('designation');
		$data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $designation
            );
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/createEmployee",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
		redirect("../Test/employee");
				
				

	}
	public function editEmployee($id) {

		$data = array(
                'id' => $id,
            );
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/editEmployee",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
		$data['employee'] = $response;
		$this->load->view("editEmployee" , $data);
	}
	public function updateEmployeeApi() {

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$designation = $this->input->post('designation');
		$data = array(
				'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $designation
            );
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/updateEmployee",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		redirect("../Test/employee");
				
				

	}
	public function client() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/punchAPI/Api/client",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		  
		CURLOPT_HTTPHEADER => array(
			"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}
		$data['employee'] = $response;
		$this->load->view('client' , $data);

	}
	public function createClient() {
		$this->load->view('createClient');
	}
	public function createClientApi() {
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$designation = $this->input->post('designation');
		$data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $designation
            );
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/createClient",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		redirect("../Test/client");
				
				

	}
	public function editClient($id) {

		$data = array(
                'id' => $id,
        );

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/editClient",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		$data['employee'] = $response;
		$this->load->view("editClient" , $data);
	}
	public function updateClientApi() {
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$designation = $this->input->post('designation');
		$data = array(
				'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $designation
            );
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/updateClient",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		redirect("../Test/client");
				
				
				

	}
	public function project($id) {

		$data = array(
                'id' => $id,
            );
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/project",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		    
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		$data['project'] = $response;
		$data['id'] = $id;
		$this->load->view('project' , $data);

	}
	public function addProject($id) {
		$data['id'] = $id;
		$this->load->view('addProject' , $data);
	}
	public function addProjectApi() {
		$name = $this->input->post("name");
		$id = $this ->input->post("id");
		$data = array(
                'name' => $name,
                'id' => $id
            );
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/addProject",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		redirect("../Test/project/".$id);
	}

	public function removeProject($id) {
		$id = $this->input->get("id1");
		$id1= $this->input->get("id2");
		$data = array(
                'id' => $id
            );

		//print_r($data); die();
		$curl = curl_init();

		//print_r(json_encode($data));
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/punchAPI/Api/removeProject",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		  	"authorization: Basic YWRtaW46MTIzNA==",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} 
		redirect("../Test/project/".$id1);
	}

}
