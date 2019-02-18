<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Arjasa extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Arjasa_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Arjasa_model->getTerminal();
		    $data['data_camera'] = $this->Arjasa_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('arjasa/arjasa',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Arjasa_model->getTerminal();
            $data['data_camera'] = $this->Arjasa_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('arjasa/arjasa');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Arjasa_model->insertArjasa();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Arjasa','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Arjasa_model->getCameraById($id_camera);
            $data["terminal"] = $this->Arjasa_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('arjasa/edit_arjasa');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Arjasa_model->editCamera($id_camera);
                redirect('Arjasa','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Arjasa_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Arjasa_model->deleteCamera($id_camera);
                    redirect('Arjasa', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Arjasa','refresh');
                }
        }

        
    
    }
    
    /* End of file Arjasa.php */
    
?>