<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bunder extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Bunder_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Bunder_model->getTerminal();
		    $data['data_camera'] = $this->Bunder_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('bunder/bunder',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Bunder_model->getTerminal();
            $data['data_camera'] = $this->Bunder_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('bunder/bunder');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Bunder_model->insertBunder();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Bunder','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Bunder_model->getCameraById($id_camera);
            $data["terminal"] = $this->Bunder_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('bunder/edit_bunder');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Bunder_model->editCamera($id_camera);
                redirect('Bunder','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Bunder_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Bunder_model->deleteCamera($id_camera);
                    redirect('Bunder', 'refresh');
                } else {
                    
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Bunder','refresh');
                }
        }

        
    
    }
    
    /* End of file Bunder.php */
    
?>