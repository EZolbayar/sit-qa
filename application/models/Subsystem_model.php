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
    subsystemListing(){
        $this->db->select('ss.name, ss.link, ss.database, ss.description');
        $this->db->from('subsystems as ss');
        $this->db->join('servers as s', 'ss.serverid = s.serverid', );
        $this->db->where('ss.status', 'A');
        $this->db->order_by('ss.serverid', 'ASC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
}