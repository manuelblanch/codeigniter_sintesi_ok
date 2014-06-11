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

	public function json_consoles(){

		$this->load->model('model_productes'); 
		$data['json'] = $this->model_productes->getconsoles();
		if (!$data['json']) show_404();
		$this->load->view('productos/json_consoles',$data);
	}

	public function json_analisi(){
		
		$this->load->model('model_productes');
		$data['json'] = $this->model_productes->getanalisi();
		if (!$data['json']) show_404();
		$this->load->view('productos/json_analisi',$data);
	}

	public function json_noticies(){
		
		$this->load->model('model_productes');
		$data['json'] = $this->model_productes->getnoticies();
		if (!$data['json']) show_404();
		$this->load->view('productos/json_noticies',$data);
	}

	public function json_novetats(){

		$this->load->model('model_productes');
		$data['json'] = $this->model_productes->getnovetats();
		if (!$data['json']) show_404();
		$this->load->view('productos/json_novetats',$data);
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
			$crud->set_language('catalan');

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

	function noticies(){
		
		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('noticias');

			/* Li asignem un nom */
			$crud->set_subject('Noticies');

			/* Asignem el idioma español */
			$crud->set_language('catalan');
			
			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields(
				'id',
				'titul', 
				'consola',
				'joc',
				'descripcio'
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'titul',
				'consola',
				'joc', 
				'descripcio'
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/noticies.php */
			$this->load->view('productos/noticies', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function analisi(){
		
		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('analisi');

			/* Li asignem un nom */
			$crud->set_subject('Analisi');

			/* Asignem el idioma español */
			$crud->set_language('catalan');
			
			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields(
				'id',
				'titol', 
				'consola',
				'review'
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'titol',
				'consola', 
				'review'
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/noticies.php */
			$this->load->view('productos/analisi', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function consoles(){
		
		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('consoles');

			/* Li asignem un nom */
			$crud->set_subject('Consoles');

			/* Asignem el idioma español */
			$crud->set_language('catalan');
			
			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields(
				'id',
				'nom', 
				'marca',
				'tipus',
				'descripcio'
				
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'nom',
				'marca', 
				'tipus',
				'descripcio'
				
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/noticies.php */
			$this->load->view('productos/consoles', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function novetats(){
		
		try{
			
			/* Creem l'objecte */
			$crud = new grocery_CRUD();

			/* Seleccionem el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionem el nombre de la taula de la nostra base de dades*/
			$crud->set_table('novetats');

			/* Li asignem un nom */
			$crud->set_subject('Novetats');

			/* Asignem el idioma español */
			$crud->set_language('catalan');
			
			/* Aqui li diem a grocery que aquests camps son obligatoris */
			$crud->required_fields( 
				'id',
				'titol', 
				'consola',
				'tipus_joc'
			);

			/* Aqui li indiquem quins camps mostrem */
			$crud->columns(
				'id',
				'titol',
				'consola', 
				'tipus_joc'
			);
			
			/* Generem la taula */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/noticies.php */
			$this->load->view('productos/novetats', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
