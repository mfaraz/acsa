<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adm_Error extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
	}
	
	function index() {
	}
	
	function m() {
		//Con el segmento 4 especificariamos algun tipo custom de error
		if($this->uri->segment(4)) {

		} else {
			$data['titulo'] = "No estas autorizado a ver esta página";
			$data['contenido'] = "Estás tratando de acceder a una página en la cual no estás autorizado. Clic <a href=' " . site_url('adm/home') . "'>aquí</a> para volver al home";
			
			$this->template->set_content('general/mensaje', $data);
			$this->template->build();
		}
		
	}
}