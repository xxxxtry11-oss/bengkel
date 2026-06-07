<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        if($this->input->post()){

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $admin = $this->db
                          ->where('username', $username)
                          ->where('password', $password)
                          ->get('admin')
                          ->row();

            if($admin){

                $data = [
                    'id_admin' => $admin->id_admin,
                    'username' => $admin->username,
                    'login' => TRUE
                ];

                $this->session->set_userdata($data);

                redirect('index.php/dashboard');

            }else{

                $this->session->set_flashdata(
                    'error',
                    'Username atau Password Salah'
                );

                redirect('index.php/login');
            }
        }

        $this->load->view('login/index');
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('index.php/login');
    }
}