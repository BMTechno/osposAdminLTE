<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_404 extends CI_Controller {
	public function __construct()   {
		parent::__construct();
	}
 
	public function index() 
	{
		$this->output->set_status_header('404');
		$this->load->view('Page_not_found');//loading in my template
	}
}