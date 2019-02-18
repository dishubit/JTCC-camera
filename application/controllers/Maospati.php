<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Maospati extends CI_Controller {
    
         
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Maospati_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Maospati_model->getTerminal();
		    $data['data_camera'] = $this->Maospati_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('maospati/maospati',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Maospati_model->getTerminal();
            $data['data_camera'] = $this->Maospati_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('maospati/maospati');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Maospati_model->insertMaospati();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Maospati','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Maospati_model->getCameraById($id_camera);
            $data["terminal"] = $this->Maospati_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('maospati/edit_maospati');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Maospati_model->editCamera($id_camera);
                redirect('Maospati','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Maospati_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Maospati_model->deleteCamera($id_camera);
                    redirect('Maospati', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Maospati','refresh');
                }
        }

        
    
    }
    
    /* End of file Maospati.php */
    
?>