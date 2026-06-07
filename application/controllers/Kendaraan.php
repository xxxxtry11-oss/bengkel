<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){

            redirect('index.php/login');
        }
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = kendaraan.id_pelanggan'
        );

        $data['kendaraan'] = $this->db->get()->result();

        $this->load->view('kendaraan/index', $data);
    }

    public function tambah()
    {
        if($this->input->post()){

            $data = [
                'id_pelanggan'   => $this->input->post('id_pelanggan'),
                'merk_kendaraan' => $this->input->post('merk_kendaraan'),
                'no_polisi'      => $this->input->post('no_polisi'),
                'warna'          => $this->input->post('warna')
            ];

            $this->db->insert('kendaraan', $data);

            redirect('index.php/kendaraan');
        }

        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('kendaraan/tambah', $data);
    }

    public function edit($id)
    {
        if($this->input->post()){

            $data = [
                'id_pelanggan'   => $this->input->post('id_pelanggan'),
                'merk_kendaraan' => $this->input->post('merk_kendaraan'),
                'no_polisi'      => $this->input->post('no_polisi'),
                'warna'          => $this->input->post('warna')
            ];

            $this->db->where('id_kendaraan', $id);
            $this->db->update('kendaraan', $data);

            redirect('index.php/kendaraan');
        }

        $data['kendaraan'] = $this->db
                                   ->where('id_kendaraan', $id)
                                   ->get('kendaraan')
                                   ->row();

        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('kendaraan/edit', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_kendaraan', $id);
        $this->db->delete('kendaraan');

        redirect('index.php/kendaraan');
    }
}