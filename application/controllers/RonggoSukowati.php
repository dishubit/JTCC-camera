<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class RonggoSukowati extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('RonggoSukowati_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }

        public function index()
        {
            $data["terminal"] = $this->RonggoSukowati_model->getTerminal();
		    $data['data_camera'] = $this->RonggoSukowati_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('ronggosukowati/ronggosukowati',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->RonggoSukowati_model->getTerminal();
            $data['data_camera'] = $this->RonggoSukowati_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('ronggosukowati/ronggosukowati');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->RonggoSukowati_model->insertRonggoSukowati();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('RonggoSukowati','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->RonggoSukowati_model->getCameraById($id_camera);
            $data["terminal"] = $this->RonggoSukowati_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('ronggosukowati/edit_ronggosukowati');
                $this->load->view('footer/footer', $data);
            }else{
                $this->RonggoSukowati_model->editCamera($id_camera);
                redirect('RonggoSukowati','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->RonggoSukowati_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->RonggoSukowati_model->deleteCamera($id_camera);
                    redirect('RonggoSukowati', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('RonggoSukowati','refresh');
                }
        }

    
    }
    
    /* End of file RonggoSukowati.php */
    
?>