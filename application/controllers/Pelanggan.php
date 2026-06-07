<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){

            redirect('index.php/login');
        }
    }

    public function index()
    {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('pelanggan/index', $data);
    }

    public function tambah()
    {
        if($this->input->post()){

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'no_hp'          => $this->input->post('no_hp'),
                'alamat'         => $this->input->post('alamat')
            ];

            $this->db->insert('pelanggan', $data);

            redirect('index.php/pelanggan');
        }

        $this->load->view('pelanggan/tambah');
    }

    public function edit($id)
    {
        if($this->input->post()){

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'no_hp'          => $this->input->post('no_hp'),
                'alamat'         => $this->input->post('alamat')
            ];

            $this->db->where('id_pelanggan', $id);
            $this->db->update('pelanggan', $data);

            redirect('index.php/pelanggan');
        }

        $data['pelanggan'] = $this->db
                                   ->where('id_pelanggan', $id)
                                   ->get('pelanggan')
                                   ->row();

        $this->load->view('pelanggan/edit', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');

        redirect('index.php/pelanggan');
    }
}