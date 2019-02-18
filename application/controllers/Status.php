<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Status extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Status_model');
            if($this->session->userdata('akses')=='2'){
                
                
                
            }else{
                
                redirect('Login','refresh');
                
            }
        }
        

        public function index()
        {
            $data['terminal']=$this->Status_model->getTerminal();
            $data['data_status']=$this->Status_model->showStatus();
            $this->load->view('header/headermav', $data);
            $this->load->view('status/status');
            $this->load->view('footer/footer2', $data);
            
        }

        public function add()
        {
            
            $this->form_validation->set_rules('ip', 'ip', 'trim|required|callback_cekIp');
            $data["terminal"] = $this->Status_model->getTerminal();
            $data['data_status'] = $this->Status_model->showStatus();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/headermav', $data);
                $this->load->view('status/status');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Status_model->insertStatus();
                $this->session->set_flashdata('sudah_input', 'IP sudah ditambah!'); 
                redirect('Status','refresh');
            }
        }

        public function edit($id_status)
        {
            $data['get_status']=$this->Status_model->getStatusById($id_status);
            $data["terminal"] = $this->Status_model->getTerminal();
            $this->form_validation->set_rules('ip', 'ip', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/headermav', $data);
                $this->load->view('status/edit_status');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Status_model->editStatus($id_status);
                redirect('Status','refresh');
            }
        }

        public function delete($id_status)
        {
                $terdaftar=$this->Status_model->statusTerdaftar($id_status);
                if ($terdaftar) {
                    
                    $this->session->set_flashdata('terhapus', 'IP Berhasil Dihapus');
                    $this->Status_model->deleteStatus($id_status);
                    redirect($_SERVER['HTTP_REFERER']);
                } elseif (!$terdaftar) {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, IP tersebut telah digunakan');
                    redirect($_SERVER['HTTP_REFERER']);
                }
        }

        public function cekIp($ip)
		{
			$this->load->library('form_validation');
		    $is_exist = $this->Status_model->select_status($ip);

		    if ($is_exist) {
		        $this->form_validation->set_message('cekIp', 'IP telah Digunakan.');    
		        return false;
		    } else {
		        return true;
		    }
		}
    
    }
    
    /* End of file Status.php */
    
?>