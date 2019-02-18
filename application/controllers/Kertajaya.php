<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kertajaya extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Kertajaya_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Kertajaya_model->getTerminal();
		    $data['data_camera'] = $this->Kertajaya_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('kertajaya/kertajaya',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Kertajaya_model->getTerminal();
            $data['data_camera'] = $this->Kertajaya_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('kertajaya/kertajaya');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Kertajaya_model->insertKertajaya();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Kertajaya','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Kertajaya_model->getCameraById($id_camera);
            $data["terminal"] = $this->Kertajaya_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('kertajaya/edit_kertajaya');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Kertajaya_model->editCamera($id_camera);
                redirect('Kertajaya','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Kertajaya_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Kertajaya_model->deleteCamera($id_camera);
                    redirect('Kertajaya', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Kertajaya','refresh');
                }
        }

        
    
    }
    
    /* End of file Kertajaya.php */
    
?>