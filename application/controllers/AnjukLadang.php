<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AnjukLadang extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('AnjukLadang_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->AnjukLadang_model->getTerminal();
		    $data['data_camera'] = $this->AnjukLadang_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('anjukladang/anjukladang',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->AnjukLadang_model->getTerminal();
            $data['data_camera'] = $this->AnjukLadang_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('anjukladang/anjukladang');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->AnjukLadang_model->insertAnjukLadang();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('AnjukLadang','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->AnjukLadang_model->getCameraById($id_camera);
            $data["terminal"] = $this->AnjukLadang_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('anjukladang/edit_anjukladang');
                $this->load->view('footer/footer', $data);
            }else{
                $this->AnjukLadang_model->editCamera($id_camera);
                redirect('AnjukLadang','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->AnjukLadang_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->AnjukLadang_model->deleteCamera($id_camera);
                    redirect('AnjukLadang', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('AnjukLadang','refresh');
                }
        }

        
    
    }
    
    /* End of file AnjukLadang.php */
    
?>