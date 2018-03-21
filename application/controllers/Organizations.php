<?php

/**
 * Class Organizations
 */
class Organizations extends CI_Controller
{
	/**
	 * Organizations constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Organization_Model');
		$this->load->helper('url_helper');
	}

	/**
	 * Organization Index
	 */
	public function index()
	{
		$data = [
			'organizations' 		=> $this->Organization_Model->getOrganizations(),
			'organizationsTree' 	=> $this->Organization_Model->getOrganizationTree()[0],
			'title'					=> 'Organization Hierarchy'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('organizations/index', $data);
		$this->load->view('templates/footer');
	}


	public function view($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
		if (empty($data['news_item']))
		{
			show_404();
		}
		$data['title'] = $data['news_item']['title'];
		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$data['title'] = 'Create a news item';
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->news_model->set_news($this->input->post_get('title', true), $this->input->post_get('text', true));
			$this->load->view('templates/header', $data);
			$this->load->view('news/success');
			$this->load->view('templates/footer');
		}
	}
}
