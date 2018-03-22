<?php

/**
 * Class Stringspiral
 *
 * @author: Niraj Jani
 * @email: jani.niraj@outlook.com
 */
class Stringspiral extends CI_Controller
{
	/**
	 * Stringspiral constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->helper('string');
	}

	/**
	 * Stringspiral Index
	 */
	public function index()
	{
        //$randomArrayStringGenerator = array_fill(0, rand(5,10), array_fill(0, rand(5,10), random_string('alnum', rand(5,10))));

        $spiralStringArray          = [];
        $spiralMainArrayNumber      = rand(5,10);
        $spiralMainArray            = [];

        for($i = 0; $i < $spiralMainArrayNumber; $i++)
        {
            $subArrayNumber = rand(5,10);
            $subArray       = [];
            for($j = 0; $j < $subArrayNumber; $j++)
            {
                $subArray[$j] = random_string('alnum', rand(5,10));
            }
            $spiralStringArray[] = implode(" ", $subArray);
            $spiralMainArray[$i] = $subArray;
        }

        $spiralMainString   = implode(" ", $spiralStringArray);

		$data               = [
            'title'             => 'String Spiral',
            'spiralMainArray'   => $spiralMainArray,
            'spiralMainString'  => $spiralMainString
        ];

		$this->load->view('templates/header', $data);
		$this->load->view('stringspiral/index', $data);
		$this->load->view('templates/footer');
	}
}
