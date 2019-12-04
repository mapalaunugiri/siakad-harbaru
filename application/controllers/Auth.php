<?php

class Auth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }
    
    public function index(){
        if($this->session->userdata('MASUK') == TRUE){
            redirect("wargabelajar");
        }
        $data["title"] = "Login - Siak Harba";
        $this->load->view('auth/login',$data);
         
    }

    public function cek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Auth_model->cekLogin($username,$password);

                    
             $this->form_validation->set_rules('username','username','required|trim|xss_clean');
             $this->form_validation->set_rules('passowrd','password','required|xss_clean');


            if (!empty($result)) {
                $this->session->set_userdata('MASUK',TRUE);
                $this->session->set_userdata($result);
                redirect('wargabelajar');
            } else {
                redirect('auth');
            }
            print_r($result);
        } else {
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}