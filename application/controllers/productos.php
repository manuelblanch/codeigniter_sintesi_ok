<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredem de la classe CI_Controller */
class Productos extends CI_Controller {

	function __construct() 
	{
		
		parent::__construct();

		/* Carreguem la base de dades */
		$this->load->database();

		/* Carreguem la llibreria*/
		$this->load->library('grocery_crud');

		/* Afegim el helper al controlador */
		$this->load->helper('url');
		
	
	}

	function index() 
	{
		/*
		 * Enviem tot lo que arriba a la funcio
		 * administracion().
		 **/
		$data = array (
		  'headerContent' => $this->load->view('header',array(), TRUE),
		  'mainContent' => $this->load->view('main', array(), TRUE),
		  'footerContent' => $this->load->view('footer', array(), TRUE),
		);
		$this->load->view('templates/default', $data); 
		redirect('productos/administracion');
	}
	
	 public function json_productos() {
		 
		$this->load->model('model_productes'); 
		$data['json'] = $this->model_productes->getproductes();
		if (!$data['json']) show_404();
		$this->load->view('productos/json_productes',$data);
	}

	/*
	 * 
 	 **/
	function administracion()
	
	{

		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('productos');

			/* Li asignem un nom */
			$crud->set_subject('Productos');

			/* Asignem el idioma español */
			$crud->set_language('spanish');

			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields(
				'id',
				'consola', 
				'nom', 
				'preu_stock', 
				'quantitat'
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'consola',
				'nom',
				'descripcio', 
				'preu_stock', 
				'preu_venta_public', 
				'quantitat'
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$this->load->view('productos/administracion', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
