<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bangkalan extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Bangkalan_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Bangkalan_model->getTerminal();
		    $data['data_camera'] = $this->Bangkalan_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('bangkalan/bangkalan',$data);
           $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Bangkalan_model->getTerminal();
            $data['data_camera'] = $this->Bangkalan_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('bangkalan/bangkalan');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Bangkalan_model->insertBangkalan();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Bangkalan','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Bangkalan_model->getCameraById($id_camera);
            $data["terminal"] = $this->Bangkalan_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('bangkalan/edit_bangkalan');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Bangkalan_model->editCamera($id_camera);
                redirect('Bangkalan','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Bangkalan_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Bangkalan_model->deleteCamera($id_camera);
                    redirect('Bangkalan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Bangkalan','refresh');
                }
        }

        
    
    }
    
    /* End of file Bangkalan.php */
    
?>