<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Productos extends CI_Controller {

	function __construct() 
	{
		
		parent::__construct();

		/* Cargamos la base de datos */
		$this->load->database();

		/* Cargamos la libreria*/
		$this->load->library('grocery_crud');

		/* Añadimos el helper al controlador */
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
	
	function noticies(){
		
		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('noticies');

			/* Li asignem un nom */
			$crud->set_subject('Noticies');

			/* Asignem el idioma español */
			$crud->set_language('spanish');
			
			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields(
				'id',
				'nom', 
				'noticia',
				'fecha'
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'nom',
				'noticia', 
				'fecha'
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$this->load->view('productos/noticies', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
	
	
