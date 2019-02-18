<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class UntungSuropati extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('UntungSuropati_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->UntungSuropati_model->getTerminal();
		    $data['data_camera'] = $this->UntungSuropati_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('untungsuropati/untungsuropati',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->UntungSuropati_model->getTerminal();
            $data['data_camera'] = $this->UntungSuropati_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('untungsuropati/untungsuropati');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->UntungSuropati_model->insertUntungSuropati();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('UntungSuropati','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->UntungSuropati_model->getCameraById($id_camera);
            $data["terminal"] = $this->UntungSuropati_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('untungsuropati/edit_untungsuropati');
                $this->load->view('footer/footer', $data);
            }else{
                $this->UntungSuropati_model->editCamera($id_camera);
                redirect('UntungSuropati','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->UntungSuropati_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->UntungSuropati_model->deleteCamera($id_camera);
                    redirect('UntungSuropati', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('UntungSuropati','refresh');
                }
        }
        
    }
    
    /* End of file UntungSuropati.php */
    
?>