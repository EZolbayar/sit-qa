<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Customer (Customer Model)
 * Customer model class to get to handle user related data 
 * @author : Rajesh Gupta
 * @version : 1.1
 * @since : 15 November 2019
 */
class Server_model extends CI_Model
{
    
	   /**
     * This function is used to get the customer listing 
     * @return array $result : This is result
     */
    function serverListing()
    {
        $this->db->select('BaseTbl.serverid, BaseTbl.servername, BaseTbl.ip_address, BaseTbl.system_info, BaseTbl.description');
        $this->db->from('servers as BaseTbl');
        $this->db->where('BaseTbl.status', 'A');
        $this->db->order_by('BaseTbl.serverid', 'ASC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
        
    /**
     * This function is used to add new customer to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewServer($serverInfo)
    {
        $this->db->trans_start();
        $this->db->insert('servers', $serverInfo);

        var_dump($serverInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get customer information by id
     * @param number $userId : This is customer id
     * @return array $result : This is customer information
     */
    function getServerInfo($customerId)
    {
        $this->db->select('serverid, servername, ip_address, system_info, description');
        $this->db->from('servers');
        $this->db->where('status', 'A');
        $this->db->where('serverid', $customerId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    /**
     * This function is used to update the customer information
     * @param array $customerInfo : This is customers updated information
     * @param number $customerId : This is customer id
     */
    function editServer($serverInfo, $serverId)
    {
        $this->db->where('serverid', $serverId);
        $this->db->update('servers', $serverInfo);
        
        return TRUE;
    }
    
    /**
     * This function is used to delete the customer information
     * @param number $customerId : This is customer id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteServer($id)
    {
		$this->db->where('serverid', $id);
		$this->db->delete('servers');
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to get customer information by id
     * @param number $customerId : This is customer id
     * @return array $result : This is customer information
     */
    function getServerInfoById($serverId)
    {
        $this->db->select('serverid, servername, ip_address, system_info, description');
        $this->db->from('servers');
        $this->db->where('status', 'A');
        $this->db->where('serverid', $serverId);
        $query = $this->db->get();
        
        return $query->row();
    }

}  