<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MinakKoncar extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('MinakKoncar_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->MinakKoncar_model->getTerminal();
		    $data['data_camera'] = $this->MinakKoncar_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('minakkoncar/minakkoncar',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->MinakKoncar_model->getTerminal();
            $data['data_camera'] = $this->MinakKoncar_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('minakkoncar/minakkoncar');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->MinakKoncar_model->insertMinakKoncar();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('MinakKoncar','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->MinakKoncar_model->getCameraById($id_camera);
            $data["terminal"] = $this->MinakKoncar_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('minakkoncar/edit_minakkoncar');
                $this->load->view('footer/footer', $data);
            }else{
                $this->MinakKoncar_model->editCamera($id_camera);
                redirect('MinakKoncar','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->MinakKoncar_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->MinakKoncar_model->deleteCamera($id_camera);
                    redirect('MinakKoncar', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('MinakKoncar','refresh');
                }
        }

        
    
    }
    
    /* End of file MinakKoncar.php */
    
?>