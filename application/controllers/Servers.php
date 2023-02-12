<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Customers (CustomersController)
 * Customer Class to control all user related operations.
 * @author : Rajesh Gupta
 * @version : 1.1
 * @since : 15 November 2019
 */
class Servers extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('server_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the Customer
     */
    public function index()
    { 
        $this->global['pageTitle'] = 'Environment SIT : Dashboard';
        
        $this->loadViews("back_end/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the Customers list
     */
    function serverListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
			
			$this->global['searchBody'] = 'Yes';
			
            $data['serverRecords'] = $this->server_model->serverListing();
			
            $this->global['pageTitle'] = 'Environment SIT : Server Listing';
            
            $this->loadViews("back_end/servers/servers", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewServ()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('server_model');
            $data = "";
			
            $this->global['pageTitle'] = 'Environment SIT : Add New Server';

            $this->loadViews("back_end/servers/addServer", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new Customer to the system
     */
    function addNewServer()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('sname','Server Name','trim|required|max_length[128]');
			$this->form_validation->set_rules('ipaddress','IP Address','trim|required');
            $this->form_validation->set_rules('type','Type','trim|required');
			
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewServ();
            }
            else
            {   //pre($_POST); die;
                $servername = $this->security->xss_clean($this->input->post('sname'));
                $ipaddress = $this->security->xss_clean($this->input->post('ipaddress'));
				$systeminfo = $this->security->xss_clean($this->input->post('systeminfo'));
				$desc = $this->security->xss_clean($this->input->post('desc'));
                $type = $this->security->xss_clean($this->input->post('type'));
				
                
                $serverInfo = array('servername'=> $servername, 'ipaddress'=>$ipaddress,
                                    'systeminfo'=>$systeminfo, 'description'=> $desc, 'created_at'=>date('Y-m-d H:i:s'), 'type'=>$type);
                
                var_dump($serverInfo);
                $this->load->model('server_model');
                $result = $this->server_model->addNewServer($serverInfo);

                var_dump($result);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Server created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Server creation failed');
                }
                
                redirect('addNewServ');
            }
        }
    }

    
    /**
     * This function is used load Customer edit information
     * @param number $customersId : Optional : This is customer id
     */
    function modifyServer($serverId = NULL)
    {
        if($this->isAdmin() == TRUE || $serverId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($serverId == null)
            {
                redirect('customerListing');
            }
            $data['customerInfo'] = $this->server_model->getCustomerInfo($serverId);
			//$str = $this->db->last_query();
            //echo "<pre>";  print_r($str);
			//exit;
            $this->global['pageTitle'] = 'Environment SIT : Edit Server';
            
            $this->loadViews("back_end/servers/modifyServer", $this->global, $data, NULL);
        }
    }
    
    
	
	  /**
     * This function is used load customer view information
     * @param number $customerId : Optional : This is customer id
     */
    function viewServer($serverId = NULL)
    {
        if($this->isAdmin() == TRUE || $serverId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($serverId == null)
            {
                redirect('serverListing');
            }
            
            $data['serverInfo'] = $this->server_model->getServerInfoById($serverId);
            
            $this->global['pageTitle'] = 'Environment SIT : View Server';
            
            $this->loadViews("back_end/servers/viewServer", $this->global, $data, NULL);
        }
    }
    
	
    /**
     * This function is used to edit the Customer information
     */
    function editServer()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $serverId = $this->input->post('serverId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
			$this->form_validation->set_rules('vehicles','Associate Vehicles','trim|required');
				  
            if($this->form_validation->run() == FALSE)
            {
                $this->modifyServer($serverId);
            }
            else
            {
                $name = $this->security->xss_clean($this->input->post('fname'));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
				$vehicles = $this->security->xss_clean($this->input->post('vehicles'));
				$username = $this->security->xss_clean($this->input->post('username'));
				$servername = $this->security->xss_clean($this->input->post('servername'));
				$communication = $this->security->xss_clean($this->input->post('communication'));
				$address = $this->security->xss_clean($this->input->post('address'));
                
                $serverInfo = array();
                
                if($name)
                {
                    									
				$serverInfo = array('fullname'=> $name, 'email'=>$email, 'phone'=>$mobile, 'vehicles'=> $vehicles, 'username'=> $username, 'servername'=> $servername, 'communication'=> $communication, 'address'=> $address, 'updated_at'=>date('Y-m-d H:i:s'));
                }
               
                
                $result = $this->server_model->editServer($serverInfo, $serverId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Server updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Server updation failed');
                }
                
                redirect('servers/modifyServer/'.$serverId.'');
            }
        }
    }


    /**
     * This function is used to delete the Customer using customerId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteServer()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            
            $result = $this->server_model->deleteServer($id);
            //$str = $this->db->last_query();
            //echo "<pre>";  print_r($str);
			//exit;
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
}

?>