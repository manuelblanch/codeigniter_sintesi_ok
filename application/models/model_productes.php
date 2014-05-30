<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_productes extends CI_Model{
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

function getproductes() {   

        $this->db->select('id, consola, nom, descripcio, preu_stock, preu_venta_public, quantitat');
        $query = $this->db->get('productos');
        return $query->result();
    }
    
}

?>
