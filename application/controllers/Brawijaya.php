<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Brawijaya extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Brawijaya_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Brawijaya_model->getTerminal();
		    $data['data_camera'] = $this->Brawijaya_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('brawijaya/brawijaya',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Brawijaya_model->getTerminal();
            $data['data_camera'] = $this->Brawijaya_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('brawijaya/brawijaya');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Brawijaya_model->insertBrawijaya();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Brawijaya','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Brawijaya_model->getCameraById($id_camera);
            $data["terminal"] = $this->Brawijaya_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('brawijaya/edit_brawijaya');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Brawijaya_model->editCamera($id_camera);
                redirect('Brawijaya','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Brawijaya_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Brawijaya_model->deleteCamera($id_camera);
                    redirect('Brawijaya', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Brawijaya','refresh');
                }
        }

        
    
    }
    
    /* End of file Brawijaya.php */
    
?>