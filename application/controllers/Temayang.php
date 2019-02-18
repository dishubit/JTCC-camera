<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Temayang extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Temayang_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Temayang_model->getTerminal();
		    $data['data_camera'] = $this->Temayang_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('temayang/temayang',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Temayang_model->getTerminal();
            $data['data_camera'] = $this->Temayang_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('temayang/temayang');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Temayang_model->insertTemayang();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Temayang','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Temayang_model->getCameraById($id_camera);
            $data["terminal"] = $this->Temayang_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('temayang/edit_temayang');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Temayang_model->editCamera($id_camera);
                redirect('Temayang','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Temayang_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Temayang_model->deleteCamera($id_camera);
                    redirect('Temayang', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Temayang','refresh');
                }
        }

        
    
    }
    
    /* End of file Temayang.php */
    
?>