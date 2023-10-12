<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        if ($this->session->level == 1) {
            redirect('admin/');
        } elseif ($this->session->level == 2) {
            redirect('guru/');
        }
    }
    public function index()
    {
        

        // $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        
        $this->db->join('bidang', 'bidang.id_matpel = mata_pelajaran.id_mp');
        $this->db->group_by('id_mp');
        $data['matpel'] = $this->db->get('mata_pelajaran')->result();

        $data['siswa'] = $this->M_template->view('siswa')->result();
        $data['guru'] = $this->M_template->view('guru')->result();

        $this->db->join('siswa', 'siswa.id_siswa = testimoni.id_siswa');
        $this->db->join('pesanan', 'pesanan.id_pesanan = testimoni.id_pesanan');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mp = pesanan.id_mp');
        $this->db->limit(1);
        $data['testimoni'] = $this->db->get('testimoni')->result();
        // $data['testimoni'] = $this->M_template->query('SELECT foto,asal_sekolah,siswa,rating,mata_pelajaran,testimoni FROM `testimoni` JOIN siswa USING(id_siswa) JOIN pesanan USING(id_pesanan) JOIN mata_pelajaran USING(id_mp) LIMIT 5')->result();
        $this->load->view('template/header');
        $this->load->view('template/carousell');
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
    public function search()
    {
        // print_r($this->input->post());
        if ($this->input->post('opsi') == 'matpel') {
            $data = $this->M_template->query("SELECT bidang.id_guru,guru,id_mp,mata_pelajaran FROM bidang JOIN guru ON guru.id_guru=bidang.id_guru JOIN mata_pelajaran ON bidang.id_matpel=mata_pelajaran.id_mp WHERE mata_pelajaran LIKE '%" . $this->input->post('value') . "%'")->result();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            if (!empty($data)) {
                $html = '<br><div class="alert alert-success" role="alert">Hasil pencarian les privat <b>Mata Pelajaran</b> dengan kata <b>' . $this->input->post("value") . '</b></div><table class="table table-bordered m-2">';
                foreach ($data as $key) {
                    $html .= '<tr><td>' . $key->guru . '</td><td>' . $key->mata_pelajaran . '</td><td><a class="btn btn-primary" href="' . base_url() . 'pesan/pesan/' . $key->id_guru . '/' . $key->id_mp . '">Pesan</a></td></tr>';
                }
                $html .= '</table>';
                echo json_encode(["table" => $html]);
                // echo $html;
            } else {
                $html = '<br><div class="alert alert-info" role="alert">Privat belum tersedia.</div>';
                echo json_encode(["table" => $html]);
            }
        } else {
            $data = $this->M_template->query("SELECT bidang.id_guru,guru,id_mp,mata_pelajaran FROM bidang JOIN guru ON guru.id_guru=bidang.id_guru JOIN mata_pelajaran ON bidang.id_matpel=mata_pelajaran.id_mp WHERE guru LIKE '%" . $this->input->post('value') . "%'")->result();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            if (!empty($data)) {
                $html = '<br><div class="alert alert-success" role="alert">Hasil pencarian les privat <b>Guru</b> dengan kata <b>' . $this->input->post("value") . '</b></div><table class="table table-bordered m-2">';
                foreach ($data as $key) {
                    $html .= '<tr><td>' . $key->guru . '</td><td>' . $key->mata_pelajaran . '</td><td><a class="btn btn-primary" href="' . base_url() . 'pesan/pesan/' . $key->id_guru . '/' . $key->id_mp . '">Pesan</a></td></tr>';
                }
                $html .= '</table>';
                // echo json_encode($html);
                echo json_encode(["table" => $html]);
            } else {
                $html = '<br><div class="alert alert-info" role="alert">Privat belum tersedia.</div>';
                echo json_encode(["table" => $html]);
            }
        }
    }
}
