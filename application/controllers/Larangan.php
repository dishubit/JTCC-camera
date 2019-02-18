<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Larangan extends CI_Controller {
     
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Larangan_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
		  
        }
        

        public function index()
        {
            $data["terminal"] = $this->Larangan_model->getTerminal();
		    $data['data_camera'] = $this->Larangan_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('larangan/larangan',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function view($id_camera)
        {
            $data['terminal']= $this->Larangan_model->getTerminal();
            $data['view_camera'] = $this->Larangan_model->viewCamera($id_camera);
            $this->load->view('viewCamera', $data);
            
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Larangan_model->getTerminal();
            $data['data_camera'] = $this->Larangan_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('larangan/larangan');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Larangan_model->insertLarangan();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Larangan','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Larangan_model->getCameraById($id_camera);
            $data["terminal"] = $this->Larangan_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('larangan/edit_larangan');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Larangan_model->editCamera($id_camera);
                redirect('Larangan','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Larangan_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Larangan_model->deleteCamera($id_camera);
                    redirect('Larangan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Larangan','refresh');
                }
        }

        
    
    }
    
    /* End of file Larangan.php */
    
?>