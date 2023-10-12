<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        // $data['privat'] = $this->M_template->view_where('v_kelas_privat',['id_siswa'=>$this->session->id_siswa])->result();
        $data['privat'] = $this->M_template->query("SELECT * FROM privat_pesanan JOIN pesanan USING(id_pesanan) JOIN privat USING(id_privat) 
        JOIN guru ON guru.id_guru=privat.id_guru JOIN kelas ON kelas.id_kelas=privat.id_kelas 
        JOIN mata_pelajaran ON mata_pelajaran.id_mp=privat.id_mp WHERE id_siswa=" . $this->session->id_siswa)->result();
        $this->load->view('template/header');
        $this->load->view('home/kelas/index',$data);
        $this->load->view('template/footer');
    }

    public function kelasku($id)
    {
        $data['kelas'] = $this->M_template->query("SELECT * FROM privat JOIN guru USING(id_guru) JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp) WHERE id_privat=" . $id)->result();
        // $data['kelas'] = $this->M_template->view_where('v_kelas_privat', ['id_privat' => $id])->result();
        $data['siswa'] = $this->M_template->query("SELECT * FROM privat_pesanan JOIN pesanan USING(id_pesanan) JOIN privat USING(id_privat) JOIN siswa USING(id_siswa) WHERE id_privat=".$id)->result();
        $data['absen'] = $this->M_template->query("SELECT * FROM `absen` JOIN jadwal USING(id_absen) JOIN pesanan USING(id_pesanan) JOIN siswa USING(id_siswa) WHERE id_privat = ".$id." AND id_siswa=".$this->session->id_siswa)->result();
        $this->load->view('template/header');
        $this->load->view('home/kelas/detail', $data);
        $this->load->view('template/footer');
    }
    public function ubah_jadwal($id = null, $role = null)
    {
        if ($this->input->post()) {
            $jadwal=$this->M_template->view_where('jadwal',['id_jadwal'=>$id])->result();
            $this->M_template->update('jadwal',['id_jadwal'=>$id],[
                'tanggal_belajar'=>$this->input->post('tanggal'),
                'waktu_belajar'=>$this->input->post('waktu'),
                'id_hari'=>$this->input->post('hari'),
                'tanggal_belajar_asli'=>$jadwal[0]->tanggal_belajar,
                'waktu_asli'=>$jadwal[0]->waktu_belajar,
                'status_jadwal'=>'Usulan Ganti'
            ]);
            if (!$role) {
                redirect('pesan/jadwal');
            } else{
                redirect('guru/jadwal');
            }
        }else{
            $jadwal=$this->M_template->view_where('jadwal',['id_jadwal'=>$id])->result();
            $day=$this->M_template->view_where('hari',['id_hari'=>$jadwal[0]->id_hari])->result();
            $data['hari'] = $this->M_template->view('hari')->result();
            $data['id']=$id;
            $data['hari_lama']=$day[0]->hari;
            $data['jadwal_lama']=$jadwal[0]->tanggal_belajar;
            $data['waktu_lama']=$jadwal[0]->waktu_belajar;
            $this->load->view('template/header');
            $this->load->view('home/ubah_jadwal', $data);
            $this->load->view('template/footer');
        }
    }
}