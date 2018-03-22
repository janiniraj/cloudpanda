<?php

/**
 * Class Organizations
 *
 * @author: Niraj Jani
 * @email: jani.niraj@outlook.com
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
        $this->load->library('session');
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

    /**
     * Delete Organization Record
     *
     * @param $id
     */
	public function delete($id)
    {
        if($this->Organization_Model->delete($id))
        {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
        }
        else
        {
            $this->session->set_flashdata('msg', 'Error in Deleting Record');
        }

        redirect(site_url(), 'refresh');
    }

    /**
     * Create Organization Record
     */
	public function create()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('parent', 'Parent', 'required');

        $data = [
            'title'             => 'Add new Organization record',
            'organizationList'  => $this->Organization_Model->getOrganizations(true)
        ];

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('organizations/form');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Organization_Model->create($this->input->post());
            $this->session->set_flashdata('msg', 'Record Created Successfully.');

			redirect(site_url(), 'refresh');
		}
	}

    /**
     * Edit Organization Record
     *
     * @param $id
     */
	public function edit($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('parent', 'Parent', 'required');

        $data = [
            'title'             => 'Add new Organization record',
            'organizationList'  => $this->Organization_Model->getOrganizations(true, $id),
            'item'              => $this->Organization_Model->fetchById($id)
        ];

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('organizations/form');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->Organization_Model->update($this->input->post(), $id);
            $this->session->set_flashdata('msg', 'Record Updated Successfully.');

            redirect(site_url(), 'refresh');
        }
    }
}
