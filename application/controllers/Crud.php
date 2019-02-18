<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Crud extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Crud_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Crud_model->getTerminal();
            $data['data_camera'] = $this->Crud_model->showCamera();
            // $this->load->view('header/header',$data);
            // $this->load->view('ambulu/ambulu',$data);
            // $this->load->view('footer/footer',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required|callback_cekLink');
            $data["terminal"] = $this->Crud_model->getTerminal();
            $data['data_camera'] = $this->Crud_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('camera');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Crud_model->insertCrud();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!'); 
                redirect('Camera','refresh');
            }
        }

        public function view($id_camera)
        {
            $data['terminal']= $this->Crud_model->getTerminal();
            $data['data_camera']=$this->Crud_model->getCamera();
            $data['view_camera'] = $this->Crud_model->getCameraById($id_camera);
            $this->load->view('viewCamera', $data);
            
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Crud_model->getCameraById($id_camera);
            $data["terminal"] = $this->Crud_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('edit_camera');
                $this->load->view('footer/footer2', $data);
            }else{
                $this->Crud_model->editCamera($id_camera);
                redirect('Home','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Crud_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Crud_model->deleteCamera($id_camera);
                    redirect($_SERVER['HTTP_REFERER']);
                } elseif (!$terdaftar) {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect($_SERVER['HTTP_REFERER']);
                }
        }

        public function cekLink($link)
		{
			$this->load->library('form_validation');
		    $is_exist = $this->Crud_model->select_camera($link);

		    if ($is_exist) {
		        $this->form_validation->set_message('cekLink', 'Link telah Digunakan.');    
		        return false;
		    } else {
		        return true;
		    }
		}

        
    
    }
    
    /* End of file Crud.php */
    
?>