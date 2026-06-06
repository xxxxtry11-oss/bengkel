<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparepart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sparepart_model');
    }

    public function index()
    {
        $data['sparepart'] = $this->Sparepart_model->getAll();
        $this->load->view('sparepart/index',$data);
    }

    public function create()
    {
        $this->load->view('sparepart/create');
    }

    public function store()
    {
        $data = [
            'kode_sparepart' => $this->input->post('kode_sparepart'),
            'nama_sparepart' => $this->input->post('nama_sparepart'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        ];

        $this->Sparepart_model->insert($data);

        redirect('sparepart');
    }

    public function edit($id)
    {
        $data['sparepart'] = $this->Sparepart_model->getById($id);

        $this->load->view('sparepart/edit',$data);
    }

    public function update($id)
    {
        $data = [
            'kode_sparepart' => $this->input->post('kode_sparepart'),
            'nama_sparepart' => $this->input->post('nama_sparepart'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        ];

        $this->Sparepart_model->update($id,$data);

        redirect('sparepart');
    }

    public function delete($id)
    {
        $this->Sparepart_model->delete($id);

        redirect('sparepart');
    }
}