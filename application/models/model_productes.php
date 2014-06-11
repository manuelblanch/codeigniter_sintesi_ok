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
    


function getconsoles() {   

        $this->db->select('id, nom, marca, tipus, descripcio');
        $query = $this->db->get('consoles');
        return $query->result();
    }
    

function getanalisi() {   

        $this->db->select('id, titol, consola, review');
        $query = $this->db->get('analisi');
        return $query->result();
    }
    

function getnoticies() {   

        $this->db->select('id, titul, consola, descripcio');
        $query = $this->db->get('noticias');
        return $query->result();
    }

function getnovetats() {

	$this->db->select('id, titol, consola, tipus_joc');
	$query = $this->db->get('novetats');
	return $query->result();

}


    
}

?>
