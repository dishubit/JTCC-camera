<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Magetan extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Magetan_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Magetan_model->getTerminal();
		    $data['data_camera'] = $this->Magetan_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('magetan/magetan',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Magetan_model->getTerminal();
            $data['data_camera'] = $this->Magetan_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('magetan/magetan');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Magetan_model->insertMagetan();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Magetan','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Magetan_model->getCameraById($id_camera);
            $data["terminal"] = $this->Magetan_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('magetan/edit_magetan');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Magetan_model->editCamera($id_camera);
                redirect('Magetan','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Magetan_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Magetan_model->deleteCamera($id_camera);
                    redirect('Magetan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Magetan','refresh');
                }
        }

        
    
    }
    
    /* End of file Larangan.php */
    
?>