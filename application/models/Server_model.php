<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Customer (Customer Model)
 * Customer model class to get to handle user related data 
 * @author : Zolbayar
 * @version : 1.0
 * @since : 08 FEB 2023
 */
class Server_model extends CI_Model
{
    
	   /**
     * This function is used to get the customer listing 
     * @return array $result : This is result
     */
    function serverListing()
    {
        $this->db->select('s.serverid, s.servername, s.ip_address, s.server_info, s.description');
        $this->db->from('servers as s');
        $this->db->where('s.status', 'A');
        $this->db->order_by('s.serverid', 'ASC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
        
    function instanceListing($serverid)
    {
        $this->db->select('s.servername, concat(s.ip_address, "/", i.instancename) as ip');
        $this->db->from('servers as s');
        $this->db->join('serverandinstance as si', 's.serverid = si.serverid','inner');
        $this->db->join('instances as i', 'si.instanceid = i.instanceid','inner');
        $this->db->where('s.serverid', $serverid);

    }

    function schemaListing($instanceid)
    {
        $this->db->select('i.instancename, a.username, a.password, a.description');
        $this->db->from('instance as i');
        $this->db->join('access as a', 'i.instanceid = a.instanceid','inner');
        $this->db->where('a.type', '1');
        $this->db->where('i.instanceid', $instanceid);

    }

    /**
     * This function is used to add new customer to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewServer($serverInfo)
    {
        $this->db->trans_start();
        $this->db->insert('servers', $serverInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get customer information by id
     * @param number $userId : This is customer id
     * @return array $result : This is customer information
     */
    function getServerInfo($serverId)
    {
        $this->db->select('serverid, servername, ip_address, server_info, description');
        $this->db->from('servers');
        $this->db->where('status', 'A');
        $this->db->where('serverid', $serverId);
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
    function deleteServer($serverId)
    {
		$this->db->where('serverid', $serverId);
		$this->db->delete('servers');
        
        var_dump($this->db->affected_rows());

        return $this->db->affected_rows();
    }

    /**
     * This function used to get customer information by id
     * @param number $customerId : This is customer id
     * @return array $result : This is customer information
     */
    function getServerInfoById($serverId)
    {
        $this->db->select('serverid, servername, ip_address, server_info, description');
        $this->db->from('servers');
        $this->db->where('status', 'A');
        $this->db->where('serverid', $serverId);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getInstace()
    {
        $this->db->select('');
        $this->db->from('servers as s');
        $this->db->join(' as r','r.roleId = u.roleId');
        $this->db->where('u.email', $email);
        $this->db->where('u.isDeleted', 0);
        $query = $this->db->get();
        
        $user = $query->row();
        
    }

    function getServerType()
    {
        $this->db->select('type');
        $this->db->from('servers');
        $this->db->group_by('type');
        $query = $this->db->get();

        return $query->result();
    }
    function getServerCount()
    {
        $this->db->select('count(1) as count');
        $this->db->from('servers');
        $this->db->where('status', 'A');
        $query = $this->db->get();
        
        return $query->result();
    }

}  