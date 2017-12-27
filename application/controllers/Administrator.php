<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Auth_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		$this->control_loginRedirects();
		$this->load->model('Administrator_Model', 'admin');
	}
	public function index($current_path = 'uploads/')
	{
		$data = ['ip' => $this->get_client_ip()];
		$data['current_path'] = $current_path;
		

		$data['authorised'] = $this->admin->count('authorized_users');
		$data['customer'] = $this->admin->count('customers');
		$data['file'] = $this->admin->count('uploads');
		$data['folder'] = $this->admin->count('upload_paths');


		// Create a folder tree and set it into session for a more effective resource usage.
		if(!$this->session->$current_path) {

			$docs = $this->admin->docs($current_path);
			foreach($docs as $value) {
				$value->size = $this->formatSizeUnits($value->size);
			}
			sort($docs);
			$docsPath = $current_path.'docs';
			$this->session->set_userdata($docsPath, $docs);

			$paths = $this->admin->tree($current_path);
			$tree = [];
			$uniqueList = [];
			foreach($paths as $value) {
				$path = str_replace($current_path, "", $value->path);
				$path = substr($path, 0, strpos($path, "/"));
				if(!in_array($path, $uniqueList) AND strlen($path) > 0) {
					array_push($uniqueList, $path);

					$folderProp = $this->folderSize($current_path.$path);
					$size = $this->formatSizeUnits($folderProp['size']);
					$count = $folderProp['count'];
					array_push($tree, (object)array('path' => str_replace('/', '', $path), 'date_created' => $value->date_created, 'size' => $size, 'count' => $count));
				}
			} 
			sort($tree);
			$this->session->set_userdata($current_path, $tree);

		}

		$this->load->view('administrator', $data);
	}

	public function folder_view() 
	{ 
		$current_path = str_replace(base_url('dashboard/administrator/docs/'), '', current_url());
		$current_path = 'uploads/'.urldecode($current_path).'/';

		$this->index($current_path);
	}
}
