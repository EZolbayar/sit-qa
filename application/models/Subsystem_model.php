<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Subsystem (Subsystem Model)
 * Subsystem model class to get to handle user related data 
 * @author : Zolbayar
 * @version : 1.0
 * @since : 08 FEB 2023
 */
class Subsystem_model extends CI_Model
{
    
	   /**
     * This function is used to get the vehicle listing 
     * @return array $result : This is result
     */
    function subsystemListing(){

        $this->db->select('ss.id, ss.name, ss.link, ss.description,s.ip_address, CONCAT(se.ip_address, "/", i.instancename) as db, ss.schema', FALSE);
        $this->db->from('subsystems as ss');
        $this->db->join('servers as s', 'ss.appserverid = s.serverid', 'inner');
        $this->db->join('servers as se', 'ss.dbserverid = se.serverid', 'inner');
        $this->db->join('instances as i', 'ss.instanceid = i.instanceid', 'inner');
        $this->db->where('ss.status', 'A');
        $this->db->order_by('ss.name', 'ASC');
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
        $this->db->insert('tbl_vehicles', $databaseInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get vehicle information by id
     * @param number $userId : This is vehicle id
     * @return array $result : This is vehicle information
     */
    function getDatabaseInfo($databaseId)
    {
        $this->db->from('tbl_vehicles');
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
		$this->db->delete('tbl_vehicles');
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to get vehicle information by id
     * @param number $vehicleId : This is vehicle id
     * @return array $result : This is vehicle information
     */
    function getDatabaseInfoById($databaseId)
    {
        $this->db->from('tbl_vehicles');
        $this->db->where('status', 'A');
        $this->db->where('id', $databaseId);
        $query = $this->db->get();
        
        return $query->row();
    }


/**
     * This function used to get customer information by id
     * @param number $cid : This is customer id
     * @return array $result : This is Customer information
     */
    function getServerInfoById($cId)
    {
        $this->db->select('id, fullname');
        $this->db->from('tbl_customers');
        $this->db->where('status', 'A');
        $this->db->where('id', $cId);
        $query = $this->db->get();
        
        return $query->row();
    }

/**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getServersName()
    {
        $this->db->select('id, fullname');
        $this->db->from('tbl_customers');
		$this->db->order_by('fullname', 'ASC');
        $query = $this->db->get();
        
        return $query->result();
    }
    function getInstanceName()
    {
        $this->db->select('instancename');
        $this->db->from('instances');
		$this->db->order_by('instancename', 'ASC');
        $query = $this->db->get();
        var_dump($query->result());
        return $query->result();
    }
}  