<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->model('Login_model'); 
        }

        public function index()
        {
           
                $this->load->view('login/login');
            
        }

        

        public function cekLogin()
        {
            
		    $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
            $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
           
            $cek_admin=$this->Login_model->admin($username,$password);

            if($cek_admin->num_rows() > 0){
                $data=$cek_admin->row_array();
                $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_nama',$data['username']);
                    redirect('home');
            }else{
                $cek_mavens=$this->Login_model->adminmavens($username,$password);
                    if($cek_mavens->num_rows() > 0){
                        $data=$cek_mavens->row_array();
                        $this->session->set_userdata('masuk',TRUE);
                        $this->session->set_userdata('akses','2');
                        $this->session->set_userdata('ses_nama',$data['username']);
                        redirect('HomeMav');
                    }else{
                        $url=base_url();
                        echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                        redirect($url);
                    }
            }
            
	    }
        

 
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
		    $this->session->sess_destroy();
		    redirect('Login','refresh');
        }
    
    }
    
    
    
    /* End of file Login.php */
    
?>