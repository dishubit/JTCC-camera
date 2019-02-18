<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bondowoso extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Bondowoso_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Bondowoso_model->getTerminal();
		    $data['data_camera'] = $this->Bondowoso_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('bondowoso/bondowoso',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Bondowoso_model->getTerminal();
            $data['data_camera'] = $this->Bondowoso_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('bondowoso/bondowoso');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Bondowoso_model->insertBondowoso();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Bondowoso','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Bondowoso_model->getCameraById($id_camera);
            $data["terminal"] = $this->Bondowoso_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('bondowoso/edit_bondowoso');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Bondowoso_model->editCamera($id_camera);
                redirect('Bondowoso','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Bondowoso_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Bondowoso_model->deleteCamera($id_camera);
                    redirect('Bondowoso', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Bondowoso','refresh');
                }
        }

        
    
    }
    
    /* End of file Bondowoso.php */
    
?>