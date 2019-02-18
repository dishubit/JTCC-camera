<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lamongan extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Lamongan_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Lamongan_model->getTerminal();
		    $data['data_camera'] = $this->Lamongan_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('lamongan/lamongan',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Lamongan_model->getTerminal();
            $data['data_camera'] = $this->Lamongan_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('lamongan/lamongan');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Lamongan_model->insertLamongan();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Lamongan','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Lamongan_model->getCameraById($id_camera);
            $data["terminal"] = $this->Lamongan_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('lamongan/edit_lamongan');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Lamongan_model->editCamera($id_camera);
                redirect('Lamongan','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Lamongan_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Lamongan_model->deleteCamera($id_camera);
                    redirect('Lamongan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Lamongan','refresh');
                }
        }

        
    
    }
    
    /* End of file Lamongan.php */
    
?>