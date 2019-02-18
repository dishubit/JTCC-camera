<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Batu extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Batu_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Batu_model->getTerminal();
		    $data['data_camera'] = $this->Batu_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('batu/batu',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Batu_model->getTerminal();
            $data['data_camera'] = $this->Batu_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('batu/batu');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Batu_model->insertBatu();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Batu','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Batu_model->getCameraById($id_camera);
            $data["terminal"] = $this->Batu_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('batu/edit_batu');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Batu_model->editCamera($id_camera);
                redirect('Batu','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Batu_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Batu_model->deleteCamera($id_camera);
                    redirect('Batu', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Batu','refresh');
                }
        }

        
    
    }
    
    /* End of file Batu.php */
    
?>