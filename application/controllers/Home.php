<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
        }
        
    
        public function index()
        {
            
            $this->load->view('header/header');
            $this->load->view('home/home');
            $this->load->view('footer/footer');
            
        }
    
    }
    
    /* End of file Home.php */
    
?>