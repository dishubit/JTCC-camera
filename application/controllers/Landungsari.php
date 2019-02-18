<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Landungsari extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Landungsari_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Landungsari_model->getTerminal();
		    $data['data_camera'] = $this->Landungsari_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('landungsari/landungsari',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Landungsari_model->getTerminal();
            $data['data_camera'] = $this->Landungsari_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('landungsari/landungsari');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Landungsari_model->insertLandungsari();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Landungsari','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Landungsari_model->getCameraById($id_camera);
            $data["terminal"] = $this->Landungsari_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('landungsari/edit_landungsari');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Landungsari_model->editCamera($id_camera);
                redirect('Landungsari','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Landungsari_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Landungsari_model->deleteCamera($id_camera);
                    redirect('Landungsari', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Landungsari','refresh');
                }
        }

        
    
    }
    
    /* End of file Landungsari.php */
    
?>