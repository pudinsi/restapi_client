<?php defined('__NAJZMI_PUDINTEA__') or exit('No direct script access allowed');

/**

: Pudin S.
: t.me/pudin_ira
: instagram.com/pudin.ira
: https://www.pdn.my.id
: youtube.com/c/pudintv
: youtube.com/c/pudintea

 **/

class Pegawai extends CI_Controller
{

	function __construct()
	{
		$this->data = [];
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->API="http://localhost/ci_rest_server/public/";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
		//
		$this->data['link'] = base_url('pegawai');
	}

	public function title()
	{
		return 'Pegawai';
	}
	public function author()
	{
		return 'Pudin S I';
	}
	public function MainModel()
	{
		return 'Pegawai_Model';
	}
	public function contact()
	{
		return 'najzmitea@gmail.com';
	}
	public function ClassNama()
	{
		return 'pegawai';
	}
	
	 // menampilkan data
    function index(){
        $data = json_decode($this->curl->simple_get($this->API.'/pegawai'));
		if ($data == NULL){
			$this->data['pegawai'] 	= '';
        $this->load->view('list',$this->data);
		}else{
		//var_dump($data);
		$this->data['pegawai'] 	= $data->data;
        $this->load->view('list',$this->data);
		}
    }
	
	    // insert data
    function add(){
        if(isset($_POST['submit'])){
			$data_add['nama'] 		= $this->input->post('nama');
			$data_add['unit'] 		= $this->input->post('unit');
			$data_add['jabatan'] 	= $this->input->post('jabatan');
			$data_add['telpon'] 	= $this->input->post('telpon');
				
            $insert =  $this->curl->simple_post($this->API.'/pegawai', $data_add, array(CURLOPT_BUFFERSIZE => 10)); 
			
            if($insert)
            {
                $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Insert Data Berhasil</h2></div>');
            }else
            {
               $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Insert Data Gagal</h2></div>');
            }
			
            redirect($this->data['link'], 'refresh');
			
        }else{
			
            $this->load->view('add', $this->data);
			
        }
    }
	
	// edit data
    function edit(){
        if(isset($_POST['submit'])){
			
            $data_put['id'] 		= $this->input->post('id');
            $data_put['nama'] 		= $this->input->post('nama');
			$data_put['unit'] 		= $this->input->post('unit');
			$data_put['jabatan'] 	= $this->input->post('jabatan');
			$data_put['telpon'] 	= $this->input->post('telpon');
			
            $update =  $this->curl->simple_put($this->API.'/pegawai', $data_put, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Update Data Berhasil</h2></div>');
            }else
            {
               $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Update Data Gagal</h2></div>');
            }
            redirect($this->data['link'], 'refresh');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data = json_decode($this->curl->simple_get($this->API.'/pegawai',$params));
			$this->data['epg'] 	= $data->data;
			//var_dump($this->data['epg']);
            $this->load->view('edit',$this->data);
        }
    }
	
	// delete data kontak
    function hapus($id){
        if(empty($id)){
			$this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>ID Kosong</h2></div>');
            redirect($this->data['link'], 'refresh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/pegawai', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Hapus Data Berhasil</h2></div>');
            }else
            {
               $this->session->set_flashdata('hasil','<div style="padding: 20px;"><h2>Hapus Data Gagal</h2></div>');
            }
            redirect($this->data['link'], 'refresh');
        }
    }
}
