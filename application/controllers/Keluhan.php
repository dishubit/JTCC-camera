<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Keluhan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Keluhan_model');
            
            
        }

        public function index()
        {
            $data["jeniskeluhan"] = $this->Keluhan_model->getJenisKeluhan();
            $data["camera"] = $this->Keluhan_model->getCamera();
            $data["terminal"] = $this->Keluhan_model->getTerminal();
		    $data['data_keluhan'] = $this->Keluhan_model->showKeluhan();
            $this->load->view('header/header',$data);
            $this->load->view('keluhan/keluhan',$data);
            $this->load->view('footer/footer2',$data);
        }


        public function add($id_camera)
        {
            $data['jeniskeluhan']=$this->Keluhan_model->getJenisKeluhan();
            $data['data_keluhan']=$this->Keluhan_model->showKeluhan();
            $data['data_terminal']=$this->Keluhan_model->getTerminal();

            $data['get_camera']=$this->Keluhan_model->getCameraById($id_camera);
            $this->load->helper(array('form','url'));
            // var_dump($data['get_camera']);

            $this->form_validation->set_rules('tgl_keluhan', 'tgl_keluhan', 'trim|required');
            $this->form_validation->set_rules('id_jeniskeluhan', 'id_jeniskeluhan', 'trim|required');
            $this->form_validation->set_rules('isi_keluhan', 'isi_keluhan', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('keluhan/tambah_keluhan', $data);
                $this->load->view('footer/footer2', $data);
            }else{
                $this->Keluhan_model->insertKeluhan($id_camera);
                redirect('Home','refresh');
            }
        }

    }
    
    /* End of file Keluhan.php */
    
?>