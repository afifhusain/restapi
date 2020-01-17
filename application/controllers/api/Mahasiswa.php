<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ( $id === null) {
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		} else {
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		}
		


		if ($mahasiswa) {
			  $this->response([
                    'status' => true,
                    'data' => $mahasiswa
                ], REST_Controller::HTTP_OK);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);

		}


	}

	public function index_delete()
	{
		$id = $this->delete('id');

		if ( $id === null ) {
		$this->response([
                    'status' => false,
                    'message' => 'Provide an ID'
                ], REST_Controller::HTTP_BAD_REQUEST);

		}
	}

}



 ?>