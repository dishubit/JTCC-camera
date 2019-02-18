<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Situbondo extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Situbondo_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Situbondo_model->getTerminal();
		    $data['data_camera'] = $this->Situbondo_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('situbondo/situbondo',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Situbondo_model->getTerminal();
            $data['data_camera'] = $this->Situbondo_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('situbondo/situbondo');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Situbondo_model->insertSitubondo();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Situbondo','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Situbondo_model->getCameraById($id_camera);
            $data["terminal"] = $this->Situbondo_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('situbondo/edit_situbondo');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Situbondo_model->editCamera($id_camera);
                redirect('Situbondo','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Situbondo_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Situbondo_model->deleteCamera($id_camera);
                    redirect('Situbondo', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Situbondo','refresh');
                }
        }

        
    
    }
    
    /* End of file Situbondo.php */
    
?>