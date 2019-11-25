<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $this->load->view('auth/login');
         
    }

    function cek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->User_model->cekLogin($username,$password);

                    
             $this->form_validation->set_rules('username','username','required');
             $this->form_validation->set_rules('passowrd','password','required');


            if (!empty($result)) {
                $this->session->set_userdata('MASUK',TRUE);
                $this->session->set_userdata($result);
                redirect('siswa');
            } else {
                redirect('auth');
            }
            print_r($result);
        } else {
            redirect('auth');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}