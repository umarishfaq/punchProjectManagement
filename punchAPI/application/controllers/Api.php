<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
//        print_r($_SERVER);
        $this->load->library('mongolib');
        $this->db = $this->mongolib->db;
        $this->employee = $this->db->employee;
        $this->client = $this->db->client;
        $this->project = $this->db->project;
    }

    public function index_post()
    {
        $data = $this->employee->find();
        $this->response($data);
       
    }

    public function employee_post()
    {
        $data =  $this->employee->find();
        $data2 = array();
        $i=0;
        foreach ($data as $key => $value) {
            # code...
            $data2[$i] = $value;
            $i++;
        }
        //  $data = array_map(function ($val) {
        //     return $val['name'];
        // }, iterator_to_array($data));
        //$data2 = json_encode($data2);
        $this->response(array('employee' => $data2));
       
    }
    public function createEmployee_post() {
       $email = $this->post("email");
       $name = $this->post("name");
       $phone = $this->post("phone");
       $desig = $this->post("designation");

       $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $desig
            );
       $this->employee->insert($data);
       
       $this->response(["status" => true]);
        
    }   
    public function editEmployee_post() {
        $id = $this->post("id");
        $data =  $this->employee->findOne(array('_id' => new MongoId($id)));
        $this->response(array('employee' => $data));
    }
     public function updateEmployee_post() {
        $_id = $this->post("id");
        $email = $this->post("email");
        $name = $this->post("name");
        $phone = $this->post("phone");
        $desig = $this->post("designation");
        $data =  $this->db->employee->update(['_id' => new MongoId($_id)], ['$set' => ["email" => $email, "name" => $name , "phone" => $phone , "designation" => $desig]]);
        $this->response(array('status' => $data));
    }

    public function client_post()
    {
        $data =  $this->client->find();
        $data2 = array();
        $i=0;
        foreach ($data as $key => $value) {
            # code...
            $data2[$i] = $value;
            $i++;
        }
        //  $data = array_map(function ($val) {
        //     return $val['name'];
        // }, iterator_to_array($data));
        //$data2 = json_encode($data2);
        $this->response(array('client' => $data2));
       
    }
    public function createClient_post() {
       $email = $this->post("email");
       $name = $this->post("name");
       $phone = $this->post("phone");
       $desig = $this->post("designation");

       $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'designation' => $desig
            );
       $this->client->insert($data);
       
       $this->response(["status" => true]);
        
    }   
    public function editClient_post() {
        $id = $this->post("id");
        $data =  $this->client->findOne(array('_id' => new MongoId($id)));
        $this->response(array('client' => $data));
    }
    public function updateClient_post() {
        $_id = $this->post("id");
        $email = $this->post("email");
        $name = $this->post("name");
        $phone = $this->post("phone");
        $desig = $this->post("designation");
        $data =  $this->db->client->update(['_id' => new MongoId($_id)], ['$set' => ["email" => $email, "name" => $name , "phone" => $phone , "designation" => $desig]]);
        $this->response(array('status' => $data));
    }
    public function project_post()
    {
        $id = $this->post("id");
        $data =  $this->project->find(array('cid' => ($id)));
        $data2 = array();
        $i=0;
        foreach ($data as $key => $value) {
            # code...
            $data2[$i] = $value;
            $i++;
        }
        //  $data = array_map(function ($val) {
        //     return $val['name'];
        // }, iterator_to_array($data));
        //$data2 = json_encode($data2);
        $this->response(array('project' => $data2));
       
    }

    public function addProject_post() {
       $id = $this->post("id");
       $name = $this->post("name");
       $data = array(
                'cid' => $id,
                'name' => $name,
            );
       $this->project->insert($data);
       
       $this->response(["status" => true]);
        
    }   
    public function removeProject_post() {
       $id = $this->post("id");
       $this->project->remove(array('_id' => new MongoId($id)));
       
       $this->response(["status" => $id]);
        
    }   
}
