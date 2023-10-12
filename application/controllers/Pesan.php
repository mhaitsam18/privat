<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
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
        if ($this->session->isLogin == false) {
            if ($this->session->isSiswa == false) {
                redirect('auth/');
            }
        }
    }

    // public function run()
    // {
    //     for ($x=1; $x <= 25 ; $x++) { 
    //         for ($i=1; $i <= 12; $i++) { 
    //             $this->db->insert('daftar_harga', [
    //                 'harga' => rand(1, 20) . '0000',
    //                 'id_mp' => $x,
    //                 'id_kelas' => $i,
    //             ]);
    //         }
    //     }
    // }

    public function pesan($id, $id_guru = NULL)
    {
        $this->db->join('bidang', 'bidang.id_matpel = mata_pelajaran.id_mp');
        $this->db->group_by('id_mp');
        $data['matpel'] = $this->db->get('mata_pelajaran')->result();
        
        // $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        
        $this->db->join('daftar_harga', 'daftar_harga.id_kelas = kelas.id_kelas');
        $this->db->group_by('kelas.id_kelas');
        $data['kelas'] = $this->M_template->view('kelas')->result();
        
        $data['harga'] = $this->M_template->view('daftar_harga')->result();
        $data['hari'] = $this->M_template->view('hari')->result();
        $data['guru'] = $this->M_template->query("SELECT guru.* FROM bidang JOIN guru ON guru.id_guru=bidang.id_guru WHERE bidang.id_matpel =$id")->result();
        $data['id'] = $id;
        if ($id_guru) {
            $data['id_guru'] = $id_guru;
        }
        $this->load->view('template/header');
        $this->load->view('home/pesan', $data);
        $this->load->view('template/footer');
    }
    public function get_harga($id_mp, $id_kelas)
    {
        $data = $this->M_template->view_where('daftar_harga', ['id_mp' => $id_mp, 'id_kelas' => $id_kelas])->result();

        echo json_encode($data);
    }
    public function get_guru($id_mp)
    {
        $data = $this->M_template->view_where('guru', ['id_mp' => $id_mp])->result();

        echo json_encode($data);
    }
    public function select_guru($id_mp)
    {
        $this->db->join('bidang', 'bidang.id_guru = guru.id_guru');
        $data['guru'] = $this->db->get_where('guru', ['id_matpel' => $id_mp])->result();
        $this->load->view('home/select-guru', $data);
    }
    public function save()
    {
        $insert = [
            'kode_pesanan' => date('Ymdhis'),
            'tanggal_mulai_belajar' => $this->input->post('tanggal'),
            'jumlah_siswa' => $this->input->post('jumlah_siswa'),
            'jumlah_pertemuan' => $this->input->post('jumlah_pertemuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_guru' => $this->input->post('guru'),
            'id_mp' => $this->input->post('mata_pelajaran'),
            'id_hari' => $this->input->post('hari'),
            'id_kelas' => $this->input->post('kelas'),
            'id_siswa' => $this->session->id_siswa,
            'id_harga' => $this->input->post('harga'),
            'metode_pembayaran' => 'Transfer',
            'status_pesanan' => 'Guru Belum Konfirmasi',
            'status_pembayaran' => 'Belum bayar',
        ];
        echo "<pre>";
        print_r($this->input->post());
        echo "</pre>";
        $this->M_template->insert('pesanan', $insert);
        redirect('pesan/pesanan/');
    }
    public function pesanan()
    {
        $data['pesanan'] = $this->M_template->view_pesanan_siswa()->result();
        
        $this->load->view('template/header');
        $this->load->view('home/pesanan', $data);
        $this->load->view('template/footer');
    }
    public function pesananku($id)
    {
        $data['pesanan'] = $this->M_template->view_pesananku($id)->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['testimoni'] = $this->M_template->query('SELECT * FROM `jadwal` JOIN absen USING(id_absen) WHERE id_pesanan =' . $id . ' AND absen.waktu_absen IS NULL')->result();
        $data['testi'] = $this->M_template->view_where('testimoni', ['id_pesanan' => $id])->result();
        $this->load->view('template/header');
        $this->load->view('home/detail_pesanan', $data);
        $this->load->view('template/footer');
    }
    // jadwal
    public function jadwal()
    {
        $data['jadwal'] = $this->M_template->view_jadwal_siswa_pesanan()->result();
        $this->load->view('template/header');
        $this->load->view('home/jadwal', $data);
        $this->load->view('template/footer');
    }

    //bukti pembayaran
    public function upload_pembayaran()
    {
        $config = array(
            'upload_path' => './bukti_pembayaran/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 5000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $this->M_template->update(
                'pesanan',
                ['id_pesanan' => $this->input->post('id_pesanan')],
                [
                    'foto_pembayaran' => $file_data['file_name'],
                    'status_pembayaran' => 'Belum konfirmasi',
                ]
            );
            redirect('pesan/pesanan');
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function insert_pembayaran()
    {
        $this->form_validation->set_rules('nominal', 'Nominal Transfer', 'required|trim');
        $this->form_validation->set_rules('bukti_transfer', 'Bukti Transfer', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->pembayaran($this->input->post('id_pesanan'));
        }
        $upload_bukti_transfer = $_FILES['bukti_transfer']['name'];
        if ($upload_bukti_transfer) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
            $config['upload_path'] = './asset/bukti-transfer/';
            $config['max_size']     = '20048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_transfer')) {
                $bukti_transfer = $this->upload->data('file_name');
                $this->db->insert('pembayaran', [
                    'id_pesanan' => $this->input->post('id_pesanan'),
                    'nominal' => $this->input->post('nominal'),
                    'bukti_transfer' => $bukti_transfer,
                    'keterangan' => $this->input->post('keterangan'),
                    'status' => 'Belum dikonfirmasi',
                    'status_keuangan' => 'Belum diberikan',
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bukti Pembayaran Berhasil diupload</div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Bukti Pembayaran wajib diupload</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function pembayaran($id_pesanan)
    {
        $this->db->join('pesanan', 'pesanan.id_pesanan = pembayaran.id_pesanan');
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['pembayaran.id_pesanan' => $id_pesanan])->result();
        
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pesanan'] = $this->db->get_where('pesanan', ['pesanan.id_pesanan' => $id_pesanan])->row();
        $this->load->view('template/header');
        $this->load->view('home/pembayaran', $data);
        $this->load->view('template/footer');
    }
}
