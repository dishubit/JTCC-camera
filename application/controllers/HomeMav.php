<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class HomeMav extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('akses')=='2'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
        }
        

        public function index()
        {
            
            $this->load->view('header/headermav');
            $this->load->view('home/homemav');
            $this->load->view('footer/footer');
            
        }
    
    }
    
    /* End of file Home.php */
    
?>