<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Ngadirojo extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Ngadirojo_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Ngadirojo_model->getTerminal();
		    $data['data_camera'] = $this->Ngadirojo_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('ngadirojo/ngadirojo',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Ngadirojo_model->getTerminal();
            $data['data_camera'] = $this->Ngadirojo_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('ngadirojo/ngadirojo');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Ngadirojo_model->insertNgadirojo();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Ngadirojo','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Ngadirojo_model->getCameraById($id_camera);
            $data["terminal"] = $this->Ngadirojo_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('ngadirojo/edit_ngadirojo');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Ngadirojo_model->editCamera($id_camera);
                redirect('Ngadirojo','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Ngadirojo_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Ngadirojo_model->deleteCamera($id_camera);
                    redirect('Ngadirojo', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Ngadirojo','refresh');
                }
        }

        
    
    }
    
    /* End of file Ngadirojo.php */
    
?>