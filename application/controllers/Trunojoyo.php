<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Trunojoyo extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Trunojoyo_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Trunojoyo_model->getTerminal();
		    $data['data_camera'] = $this->Trunojoyo_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('trunojoyo/trunojoyo',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Trunojoyo_model->getTerminal();
            $data['data_camera'] = $this->Trunojoyo_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('trunojoyo/trunojoyo');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Trunojoyo_model->insertTrunojoyo();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Trunojoyo','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Trunojoyo_model->getCameraById($id_camera);
            $data["terminal"] = $this->Trunojoyo_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('trunojoyo/edit_trunojoyo');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Trunojoyo_model->editCamera($id_camera);
                redirect('Trunojoyo','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Trunojoyo_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Trunojoyo_model->deleteCamera($id_camera);
                    redirect('Trunojoyo', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Trunojoyo','refresh');
                }
        }

        
    
    }
    
    /* End of file Trunojoyo.php */
    
?>