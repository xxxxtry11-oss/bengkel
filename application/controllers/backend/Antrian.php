<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    // Halaman daftar antrean
    public function index()
    {
        $data['title'] = 'Data Antrean';
        $data['nama'] = $this->session->userdata('nama');
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');

        // Ambil data antrean beserta info pelanggan dan kendaraan
        $this->db->select('
            antrian.id,
            antrian.no_antrian,
            antrian.keluhan,
            antrian.status,
            antrian.tgl_antrian,
            antrian.created_at,
            pelanggan.nama AS nama_pelanggan,
            pelanggan.no_hp,
            kendaraan.plat_nomor,
            kendaraan.merk,
            kendaraan.tipe
        ');
        $this->db->from('antrian');
        $this->db->join('pelanggan', 'pelanggan.id = antrian.id_pelanggan', 'left');
        $this->db->join('kendaraan', 'kendaraan.id = antrian.id_kendaraan', 'left');
        $this->db->order_by('antrian.tgl_antrian', 'DESC'); // tanggal terbaru di atas
        $this->db->order_by('antrian.no_antrian', 'ASC');

        $data['antrian'] = $this->db->get()->result();

        $this->loadPartials('backend/antrian/index', $data);
    }

    // Halaman tambah antrean
public function tambah()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tgl_antrian = $this->input->post('tgl_antrian');

        // Ambil nomor antrean terakhir untuk tanggal tersebut
        $this->db->select_max('no_antrian');
        $this->db->where('tgl_antrian', $tgl_antrian);
        $last = $this->db->get('antrian')->row();
        $no_antrian = ($last && $last->no_antrian) ? $last->no_antrian + 1 : 1;

        $id_kendaraan = $this->input->post('id_kendaraan');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $keluhan = $this->input->post('keluhan');

        $data = [
            'no_antrian'   => $no_antrian,
            'tgl_antrian'  => $tgl_antrian,
            'id_kendaraan' => $id_kendaraan,
            'id_pelanggan' => $id_pelanggan,
            'keluhan'      => $keluhan,
            'status'       => 'menunggu',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $this->db->insert('antrian', $data);
        $this->session->set_flashdata('success', 'Antrean #' . $no_antrian . ' berhasil dibuat.');
        redirect('backend/antrian');
    }

    $data['nama'] = $this->session->userdata('nama');
    $data['username'] = $this->session->userdata('username');
    $data['role'] = $this->session->userdata('role');

    $data['pelanggan'] = $this->db->get('pelanggan')->result();
    $data['kendaraan'] = $this->db->get('kendaraan')->result();

    $this->loadPartials('backend/antrian/tambah', $data);
}

    // Fungsi edit antrean dengan auto-reset nomor jika tanggal diubah
    public function edit($id)
    {
        if (!$id) {
            $this->session->set_flashdata('error', 'ID antrean tidak valid.');
            redirect('backend/antrian');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tgl_antrian = $this->input->post('tgl_antrian');
            $id_kendaraan = $this->input->post('id_kendaraan');
            $id_pelanggan = $this->input->post('id_pelanggan');
            $keluhan = $this->input->post('keluhan');
            $status = $this->input->post('status');

            // Hitung nomor antrean baru jika tanggal berubah
            $this->db->where('tgl_antrian', $tgl_antrian);
            $this->db->where('id !=', $id); // jangan hitung antrean ini sendiri
            $count = $this->db->from('antrian')->count_all_results();
            $no_antrian = $count + 1;

            $data = [
                'tgl_antrian'  => $tgl_antrian,
                'no_antrian'   => $no_antrian,
                'id_kendaraan' => $id_kendaraan,
                'id_pelanggan' => $id_pelanggan,
                'keluhan'      => $keluhan,
                'status'       => $status
            ];

            $this->db->where('id', $id);
            $this->db->update('antrian', $data);

            $this->session->set_flashdata('success', 'Data antrean berhasil diperbarui.');
            redirect('backend/antrian');
        }

        // Ambil data antrean
        $data['antrian'] = $this->db->get_where('antrian', ['id' => $id])->row();

        // Ambil data pelanggan & kendaraan untuk select box
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $data['kendaraan'] = $this->db->get('kendaraan')->result();

        $data['nama'] = $this->session->userdata('nama');
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');

        $this->loadPartials('backend/antrian/edit', $data);
    }

    // Fungsi hapus antrean
    public function hapus($id)
    {
        if (!$id) {
            $this->session->set_flashdata('error', 'ID antrean tidak valid.');
            redirect('backend/antrian');
        }

        $this->db->where('id', $id);
        $this->db->delete('antrian');

        $this->session->set_flashdata('success', 'Antrean berhasil dihapus.');
        redirect('backend/antrian');
    }
}