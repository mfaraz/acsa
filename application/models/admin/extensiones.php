<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo de datos para Extensiones
 *
 */

class Extensiones extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_extensiones() {
		$this->db->select();
        $this->db->from("extensiones");
		$this->db->order_by('id_extension', 'asc');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) return $query;
        return NULL;
	}
}