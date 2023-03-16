<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Customer (Customer Model)
 * Customer model class to get to handle user related data 
 * @author : Zolbayar
 * @version : 1.0
 * @since : 08 FEB 2023
 */
class Databases extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('database_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the Vehicle
     */
    public function index()
    { 
        $this->global['pageTitle'] = 'Environment SIT : Dashboard';
        $data['instanceName'] = $this->database_model->getInstanceName();
        
        $this->loadViews("back_end/dashboard", $this->global, $data , NULL);
    }
    
    /**
     * This function is used to load the Vehicles list
     */
    function databaseListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
			
			$this->global['searchBody'] = 'Yes';
			
            $data['databaseRecords'] = $this->database_model->databaseListing();
            $this->global['pageTitle'] = 'Environment SIT : Database Listing';
            
            $this->loadViews("back_end/databases/databases", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewDb()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('database_model');
			$data = "";
			//$this->global['add_databases'] = $this->database_model->getDatabasesName();
            $this->global['add_servers'] = $this->database_model->getServerName();
            $this->global['add_instances'] = $this->database_model->getInstanceName();
            
			
            $this->global['pageTitle'] = 'WorldTrack GPS : Add New Database';

            $this->loadViews("back_end/databases/addDatabase", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new Vehicle to the system
     */
    function addNewDatabase()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
		
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Нэр оруулна уу','trim|required');
            $this->form_validation->set_rules('username','username оруулна уу','trim|required');
			$this->form_validation->set_rules('password','Нууц үг оруулна уу','trim|required');
			$this->form_validation->set_rules('type','Төрөл сонгоно уу','trim|required');
			$this->form_validation->set_rules('serverid','Сервэр сонгоно уу','trim|required');
			$this->form_validation->set_rules('instanceid','instance сонгоно уу','trim|required');
			$this->form_validation->set_rules('status','Статус оруулна уу','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->addNewDb();
            }
            else
            {   
                $name = $this->security->xss_clean($this->input->post('name'));
                $username = $this->security->xss_clean($this->input->post('username'));
                $password = $this->security->xss_clean($this->input->post('password'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$type = $this->security->xss_clean($this->input->post('type'));
				$server = $this->security->xss_clean($this->input->post('serverid'));
                $instance = $this->security->xss_clean($this->input->post('instanceid'));
				$status = $this->security->xss_clean($this->input->post('status'));
	
		
                $databaseInfo = array('instanceid'=> $instance, 'serverid'=> $server, 'type'=> $type, 'name'=> $name, 'username'=>$username, 'password'=>$password, 'description'=> $description, 'created_at'=>date('Y-m-d H:i:s'), 'status'=> $status );
                
                $this->load->model('database_model');
                $result = $this->database_model->addNewDatabase($databaseInfo);

                var_dump($result);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Database created successfully');
                }
                else
                {
                    var_dump($result);
                    $this->session->set_flashdata('error', 'Database creation failed');
                }
                var_dump($result);
                redirect('addNewDb');
            }
        }
    }

    
    /**
     * This function is used load Vehicle edit information
     * @param number $vehiclesId : Optional : This is vehicle id
     */
    function modifyDatabase($databaseId = NULL)
    {
         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($databaseId == null)
            {
                redirect('databaseListing');
            }
            $data['databaseInfo'] = $this->database_model->getDatabaseInfo($databaseId);
			
			$this->global['edit_databases'] = $this->database_model->getDatabasesName();

            $this->global['pageTitle'] = 'Environment SIT : Edit Database';
            
            $this->loadViews("back_end/Databases/modifyDatabase", $this->global, $data, NULL);
        }
    }
    
    
	
	  /**
     * This function is used load vehicle view information
     * @param number $vehicleId : Optional : This is vehicle id
     */
    function viewDatabase($databaseId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($databaseId == null)
            {
                redirect('databaseListing');
            }
            $data = "";
            $this->global['databaseInfo'] = $this->database_model->getDatabaseInfoById($databaseId);
            
            $this->global['pageTitle'] = 'Environment SIT : View Database';
            
            $this->loadViews("back_end/databases/viewDatabase", $this->global, $data, NULL);
        }
    }
    
	
    /**
     * This function is used to edit the Vehicle information
     */
    function editDatabase()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            //$data = "";
			//$data['customers'] = $this->vehicle_model->getCustomersName();
			//pre($data['customers']);
			//$str = $this->db->last_query();
            //pre($str);
			//exit;
            $this->load->library('form_validation');
            
			
			$vehicleId = $this->input->post('vehicleId');
			
            //$this->form_validation->set_rules('cid','Customer Name','required|in_list['.implode(array_keys($data["customers"]),',').']');
			$this->form_validation->set_rules('vehiclemake','Vehicle Make','trim|required');
			$this->form_validation->set_rules('vehiclemodel','Vehicle Model','trim|required');
			$this->form_validation->set_rules('vehicleregistrationnumber','Vehicle Registration Number','trim|required');
			$this->form_validation->set_rules('vehiclenumber','Vehicle Number','trim|required');
			$this->form_validation->set_rules('gpskitinstalldate','GPS Kit Install Date','trim|required');
			$this->form_validation->set_rules('eminumber','EMI Number','trim|required');
			$this->form_validation->set_rules('gpskitmobilenumber','GPS Kit Mobile Number','trim|required');
			$this->form_validation->set_rules('erpportalassociation','ERP Portal Association','trim|required');
			$this->form_validation->set_rules('erpportalusername','ERP Portal Username','trim|required');
			
			$this->load->library('form_validation');
            
            $databaseId = $this->input->post('databaseId');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->modifyDatabase($databaseId);
            }
            else
            {   //pre($_POST);
                $cid = $this->security->xss_clean($this->input->post('cid'));
                $vehiclemake = $this->security->xss_clean($this->input->post('vehiclemake'));
                $vehiclemodel = $this->security->xss_clean($this->input->post('vehiclemodel'));
				$vehiclemadeyear = $this->security->xss_clean($this->input->post('vehiclemadeyear'));
				$vehicleregistrationnumber = $this->security->xss_clean($this->input->post('vehicleregistrationnumber'));
				$vehiclenumber = $this->security->xss_clean($this->input->post('vehiclenumber'));
				$ownername = ucwords(strtolower($this->security->xss_clean($this->input->post('ownername'))));
				$gpskitinstalldate = $this->security->xss_clean($this->input->post('gpskitinstalldate'));
				$eminumber = $this->security->xss_clean($this->input->post('eminumber'));
				$gpskitmobilenumber = $this->security->xss_clean($this->input->post('gpskitmobilenumber'));
				$gpsdevicemodelnumber = $this->security->xss_clean($this->input->post('gpsdevicemodelnumber'));
				$erpportalassociation = $this->security->xss_clean($this->input->post('erpportalassociation'));
				$erpportalusername = $this->security->xss_clean($this->input->post('erpportalusername'));
				$nextrenewaldate = $this->security->xss_clean($this->input->post('nextrenewaldate'));
				$installbystaff = ucwords(strtolower($this->security->xss_clean($this->input->post('installbystaff'))));
				$communication = $this->security->xss_clean($this->input->post('communication'));
				$address = $this->security->xss_clean($this->input->post('address'));
                
                $databaseInfo = array();
                
                if($vehiclemake)
                {
                    									
				$databaseInfo = array('cid'=> $cid, 'vehiclemake'=>$vehiclemake, 'vehiclemodel'=>$vehiclemodel, 'vehiclemadeyear'=> $vehiclemadeyear, 'vehicleregistrationnumber'=> $vehicleregistrationnumber, 'vehiclenumber'=> $vehiclenumber, 'ownername'=> $ownername, 'gpskitinstalldate'=> $gpskitinstalldate, 'eminumber'=> $eminumber, 'gpskitmobilenumber'=> $gpskitmobilenumber, 'gpsdevicemodelnumber'=> $gpsdevicemodelnumber, 'erpportalassociation'=> $erpportalassociation, 'erpportalusername'=> $erpportalusername, 'nextrenewaldate'=> $nextrenewaldate, 'installbystaff'=> $installbystaff, 'communication'=> $communication, 'address'=> $address, 'updated_at'=>date('Y-m-d H:i:s'));
                }
               
                $result = $this->database_model->editDatabase($databaseInfo, $databaseId);
			
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Vehicle updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Vehicle updation failed');
                }
                
                redirect('databases/modifyDatabase/'.$databaseId.'');
            }
        }
    }


    /**
     * This function is used to delete the Vehicle using vehicleId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDatabase()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            
            $result = $this->database_model->deleteDatabase($id);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
}

?>