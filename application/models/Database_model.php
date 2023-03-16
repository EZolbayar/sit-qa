<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Vehicle (Vehicle Model)
 * Vehicle model class to get to handle user related data 
 * @author : Rajesh Gupta
 * @version : 1.1
 * @since : 15 November 2019
 */
class Database_model extends CI_Model
{
    
	   /**
     * This function is used to get the vehicle listing 
     * @return array $result : This is result
     */
    function databaseListing()
    {
        $this->db->select('a.id, a.name, a.username, a.password,  CONCAT(s.ip_address, "/", i.instancename) AS ip, a.description');
        $this->db->from('access as a');
        $this->db->join('servers as s', 'a.serverid = s.serverid','inner');
        $this->db->join('instances as i', 'a.instanceid = i.instanceid','inner');
        $this->db->where('a.type', '1');
        $this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();    
        return $result;
    }
        
    /**
     * This function is used to add new vehicle to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewDatabase($databaseInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('access', $databaseInfo);

        
        $insert_id = $this->db->insert_id();
        var_dump($insert_id);
        
        $this->db->trans_complete();

        var_dump($insert_id);
        
        return $insert_id;
    }
    
    /**
     * This function used to get vehicle information by id
     * @param number $userId : This is vehicle id
     * @return array $result : This is vehicle information
     */
    function getDatabaseInfo($databaseId)
    {
        $this->db->from('access');
        $this->db->where('type', '1');
        $this->db->where('status', 'A');
        $this->db->where('id', $databaseId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    /**
     * This function is used to update the vehicle information
     * @param array $vehicleInfo : This is vehicles updated information
     * @param number $vehicleId : This is vehicle id
     */
    function editDatabase($databaseInfo, $databaseId)
    {
        $this->db->where('id', $databaseId);
        $this->db->update('access', $databaseInfo);
        
        return TRUE;
    }
    
    /**
     * This function is used to delete the vehicle information
     * @param number $vehicleId : This is vehicle id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDatabase($id)
    {
		$this->db->where('id', $id);
		$this->db->delete('access');
        // $this->where('type', '1');
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to get vehicle information by id
     * @param number $vehicleId : This is vehicle id
     * @return array $result : This is vehicle information
     */
    function getDatabaseInfoById($databaseId)
    {

        $this->db->select('a.id, a.name, a.username, a.password,  CONCAT(s.ip_address, "/", i.instancename) AS ip, a.description');
        $this->db->from('access as a');
        $this->db->join('servers as s', 'a.serverid = s.serverid','inner');
        $this->db->join('instances as i', 'a.instanceid = i.instanceid','inner');
        $this->db->where('a.type', '1');
        $this->db->where('id', $databaseId);
        
        $query = $this->db->get();

        // $this->db->from('access');
        // $this->db->where('status', 'A');
        // $this->db->where('id', $databaseId);
        // $query = $this->db->get();
        
        return $query->row();
    }


/**
     * This function used to get customer information by id
     * @param number $cid : This is customer id
     * @return array $result : This is Customer information
     */
    function getServerInfoById($dbId)
    {
        $this->db->select('id, name');
        $this->db->from('access');
        $this->db->where('status', 'A');
        $this->db->where('type', '1');
        $this->db->where('id', $dbId);
        $query = $this->db->get();

        var_dump($query);
        
        return $query->row();
    }

/**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getDatabasesName()
    {
        $this->db->select('id, name');
        $this->db->from('access');
        $this->db->where('type', '1');
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        
        return $query->result();
    }
    function getInstanceName()
    {
        $this->db->select('instanceid, instancename');
        $this->db->from('instances');
		$this->db->order_by('instanceid', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getServerName()
    {
        $this->db->select('serverid, servername');
        $this->db->from('servers');
		$this->db->where('type', '1');
        $query = $this->db->get();

        return $query->result();
    }

    function getDatabaseCount()
    {
        $this->db->select('count(1) as count');
        $this->db->from('access');
        $this->db->where('status', 'A');
        $this->db->where('type', '1');
        $query = $this->db->get();
        
        return $query->result();
    }
}  