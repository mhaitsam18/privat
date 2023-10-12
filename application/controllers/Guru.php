<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data = [
            'pesanan'=>$this->M_template->view_where('pesanan',['id_guru'=>$this->session->id_guru])->num_rows(),
            'rating'=>$this->M_template->query("SELECT SUM(rating) AS rating FROM testimoni JOIN pesanan USING(id_pesanan) WHERE pesanan.id_guru=".$this->session->id_guru)->row(),
            'pendapatan'=>$this->M_template->query("SELECT SUM(daftar_harga.harga*pesanan.jumlah_pertemuan) as total FROM `pesanan` JOIN daftar_harga USING(id_harga) WHERE pesanan.id_guru=".$this->session->id_guru)->row(),
            'total_testi'=>$this->M_template->query("SELECT * FROM testimoni JOIN pesanan USING(id_pesanan) WHERE pesanan.id_guru=".$this->session->id_guru)->num_rows(),
            'jadwal'=>$this->M_template->query("SELECT DISTINCT tanggal_belajar, waktu_belajar, mata_pelajaran FROM `jadwal` JOIN pesanan USING(id_pesanan) JOIN mata_pelajaran USING(id_mp) WHERE pesanan.id_guru = ".$this->session->id_guru." AND tanggal_belajar > NOW() ORDER BY `jadwal`.`tanggal_belajar`  ASC LIMIT 5")->result(),
        ];
        $this->load->view('guru/header');
        $this->load->view('guru/index',$data);
        $this->load->view('guru/footer');
    }

    // guru
    // public function guru()
    // {
    //     $data['guru'] = $this->M_template->view('guru')->result();
    //     $this->load->view('guru/header');
    //     $this->load->view('guru/guru/guru', $data);
    //     $this->load->view('guru/footer');
    // }
    // public function guruku($id)
    // {
    //     $data['guru'] = $this->M_template->view_where('guru', ['id_guru' => $id])->result();
    //     $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
    //     $this->load->view('guru/header');
    //     $this->load->view('guru/guru/detail', $data);
    //     $this->load->view('guru/footer');
    // }
    // public function create_guru()
    // {
    //     // $data['guru'] = $this->M_template->view('guru')->result();
    //     $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
    //     $this->load->view('guru/header');
    //     $this->load->view('guru/guru/create', $data);
    //     $this->load->view('guru/footer');
    // }
    // public function edit_guru($id)
    // {
    //     $data['guru'] = $this->M_template->view_where('guru', ['id_guru' => $id])->result();
    //     $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
    //     $this->load->view('guru/header');
    //     $this->load->view('guru/guru/detail', $data);
    //     $this->load->view('guru/footer');
    // }
    // public function save_guru()
    // {
    //     $user = [
    //         'username' => $this->input->post('email'),
    //         'password' => md5($this->input->post('email')),
    //         'level' => 2,
    //     ];
    //     $userid = $this->M_template->insert_id('user', $user);

    //     $config = array(
    //         'upload_path' => './foto/',
    //         'overwrite' => false,
    //         'remove_spaces' => true,
    //         'allowed_types' => 'png|jpg|gif|jpeg',
    //         'max_size' => 10000,
    //         'xss_clean' => true,
    //     );
    //     $this->load->library('upload');
    //     $this->upload->initialize($config);
    //     if ($this->upload->do_upload('foto')) {
    //         $file_data = $this->upload->data();

    //         $guru = [
    //             'nama' => $this->input->post('nama'),
    //             'no_hp' => $this->input->post('no_hp'),
    //             'email' => $this->input->post('email'),
    //             'foto' => $file_data['file_name'],
    //             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    //             'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    //             'institusi' => $this->input->post('institusi'),
    //             'program_studi' => $this->input->post('prodi'),
    //             'ipk' => $this->input->post('ipk'),
    //             'alamat' => $this->input->post('alamat'),
    //             'bidang_yang_dikuasai' => $this->input->post('bidang'),
    //             'bidang_yang_dikuasai_2' => $this->input->post('bidang2'),
    //             'userid' => $userid,
    //         ];
    //         $this->M_template->insert('guru', $guru);
    //         redirect('guru/guru');
    //     }
    // }

    // siswa
    public function siswa()
    {
        $data['siswa'] = $this->M_template->view('siswa')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/siswa', $data);
        $this->load->view('guru/footer');
    }
    public function siswaku($id)
    {
        $data['siswa'] = $this->M_template->view_where('siswa', ['id_siswa' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/detail', $data);
        $this->load->view('guru/footer');
    }
    public function create_siswa()
    {
        // $data['siswa'] = $this->M_template->view('siswa')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/create');
        $this->load->view('guru/footer');
    }
    public function edit_siswa($id)
    {
        $data['siswa'] = $this->M_template->view_where('siswa', ['id_siswa' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/edit', $data);
        $this->load->view('guru/footer');
    }

    // matpel
    public function matpel()
    {
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/matpel/matpel', $data);
        $this->load->view('guru/footer');
    }
    public function matpelku($id)
    {
        $data['matpel'] = $this->M_template->view_where('mata_pelajaran', ['id_mp' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/matpel/detail', $data);
        $this->load->view('guru/footer');
    }
    public function create_matpel()
    {
        // $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/matpel/create');
        $this->load->view('guru/footer');
    }
    public function edit_matpel($id)
    {
        $data['matpel'] = $this->M_template->view_where('mata_pelajaran', ['id_mp' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/edit', $data);
        $this->load->view('guru/footer');
    }
    public function save_matpel()
    {
        $this->M_template->insert('mata_pelajaran', ['mata_pelajaran' => $this->input->post('mata_pelajaran')]);
        redirect('guru/matpel');
    }

    // pesanan
    public function pesanan()
    {
        $data['pesanan'] = $this->M_template->view_pesanan_guru()->result();
        $this->load->view('guru/header');
        $this->load->view('guru/pesanan/index', $data);
        $this->load->view('guru/footer');
    }

    public function pembayaran($id_pesanan)
    {
        $this->db->join('pesanan', 'pesanan.id_pesanan = pembayaran.id_pesanan');
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['pembayaran.id_pesanan' => $id_pesanan])->result();
        
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pesanan'] = $this->db->get_where('pesanan', ['pesanan.id_pesanan' => $id_pesanan])->row();
        $this->load->view('guru/header');
        $this->load->view('guru/pesanan/pembayaran', $data);
        $this->load->view('guru/footer');
    }

    public function update_status_keuangan($id_pembayaran = null, $status_keuangan = '')
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', [
            'status_keuangan' => urldecode($status_keuangan)
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Honor telah diberikan</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function pesananku($id)
    {
        $data['pesanan'] = $this->M_template->view_pesananku($id)->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/pesanan/detail', $data);
        $this->load->view('guru/footer');
    }
    public function create_pesanan()
    {
        // $data['pesanan'] = $this->M_template->view('pesanan')->result();
        $this->load->view('guru/header');
        $this->load->view('guru/pesanan/create');
        $this->load->view('guru/footer');
    }
    public function edit_pesanan($id)
    {
        $data['pesanan'] = $this->M_template->view_where('pesanan', ['id_pesanan' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/siswa/edit', $data);
        $this->load->view('guru/footer');
    }
    public function save_pesanan()
    {
        $this->M_template->insert('pesanan', ['pesanan' => $this->input->post('pesanan')]);
        redirect('guru/pesanan');
    }

    // konfirmasi
    public function konfirmasi($id_pesanan, $status)
    {
        switch ($status) {
            case 1:
                $this->M_template->update('pesanan',['id_pesanan'=>$id_pesanan],['status_pesanan'=>'Terima']);
                break;
            case 2:
                $this->M_template->update('pesanan',['id_pesanan'=>$id_pesanan],['status_pesanan'=>'Tolak']);
                break;
        }
        redirect('guru/pesanan');
    }

    // jadwal
    public function jadwal()
    {
        $data['jadwal'] = $this->M_template->view_jadwal_guru()->result();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('guru/header');
        $this->load->view('guru/jadwal/index', $data);
        $this->load->view('guru/footer');
    }
    // honor
    public function honor()
    {
        $data['honor'] = $this->M_template->query('SELECT * FROM jadwal 
            JOIN pesanan USING(id_pesanan) 
            JOIN hari ON jadwal.id_hari=hari.id_hari 
            JOIN mata_pelajaran USING (id_mp) 
            JOIN absen USING (id_absen)
            JOIN kelas USING (id_kelas)
            JOIN siswa USING (id_siswa)
            JOIN daftar_harga ON pesanan.id_mp=daftar_harga.id_mp AND pesanan.id_kelas=daftar_harga.id_kelas
            WHERE absen.waktu_absen != "" AND pesanan.id_guru='.$this->session->id_guru
        )->result();
        $this->load->view('guru/header');
        $this->load->view('guru/honor/index', $data);
        $this->load->view('guru/footer');
    }
    //konfirmasi_jadwal
    public function konfirmasi_jadwal($id,$status)
    {
        if($status == 1){
            $this->M_template->update('absen',['id_absen'=>$id],['tanggal_absen'=>$this->input->post('tanggal')]);
            $this->M_template->update('jadwal',['id_jadwal'=>$id],['status_jadwal'=>'Ganti']);
        }else{
            $jadwal=$this->M_template->view_where('absen',['id_absen'=>$id])->result();
            $this->M_template->update('jadwal',['id_absen'=>$id],[
                'status_jadwal'=>'Tidak Ganti',
                'tanggal_belajar'=>$jadwal[0]->tanggal_belajar_asli,
                'waktu_belajar'=>$jadwal[0]->waktu_asli,
            ]);
        }
        redirect('guru/jadwal');
    }

    // kelas
    public function kelas()
    {
        $data['privat'] = $this->M_template->query('SELECT * FROM `privat` JOIN kelas USING(id_kelas) JOIN guru USING(id_guru) JOIN mata_pelajaran USING(id_mp) WHERE id_guru='.$this->session->id_guru)->result();
        $this->load->view('guru/header');
        $this->load->view('guru/kelas/index', $data);
        $this->load->view('guru/footer');
    }
    public function kelasku($id)
    {
        $data['kelas'] = $this->M_template->query("SELECT * FROM privat JOIN guru USING(id_guru) JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp) WHERE id_privat=" . $id)->result();
        // $data['kelas'] = $this->M_template->view_where('v_kelas_privat', ['id_privat' => $id])->result();
        $data['siswa'] = $this->M_template->query("SELECT * FROM privat_pesanan JOIN pesanan USING(id_pesanan) JOIN privat USING(id_privat) JOIN siswa USING(id_siswa) WHERE id_privat=".$id)->result();
        $data['absen'] = $this->M_template->query("SELECT * FROM `absen` JOIN jadwal USING(id_absen) JOIN pesanan USING(id_pesanan) JOIN siswa USING(id_siswa) WHERE id_privat = ".$id)->result();
        $this->load->view('guru/header');
        $this->load->view('guru/kelas/detail', $data);
        $this->load->view('guru/footer');
    }
    public function tambah_kelasku($id = null)
    {
        if ($id == null) {
            if ($this->input->post()) {
                $count = $this->M_template->view_where('privat_pesanan',['id_privat'=>$this->input->post('private')])->num_rows();
                $privat = $this->M_template->view_where('privat',['id_privat'=>$this->input->post('private')])->result();
                if($privat[0]->kapasitas == ($count + 1)){
                    $this->M_template->update('privat',['id_privat'=>$this->input->post('private')],['is_fulll'=>1]);
                }

                $data_pesanan_privat=[
                    'id_pesanan'=>$this->input->post('pesanan'),
                    'id_privat'=>$this->input->post('private'),
                ];
                $this->M_template->insert('privat_pesanan',$data_pesanan_privat);
                $this->M_template->update('pesanan',['id_pesanan'=>$this->input->post('pesanan')],['is_created'=>1]);
                $this->M_template->update('jadwal',['id_pesanan'=>$this->input->post('pesanan')],['id_privat'=>$this->input->post('private')]);
                redirect('guru/kelasku/'.$this->input->post('private'));
            }
        }else{
            // $data['pesanan']=$this->M_template->query("SELECT * FROM pesanan JOIN siswa USING(id_siswa) JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp) WHERE is_created = 0")->result();
            $privat = $this->M_template->view_where('privat',['id_privat'=>$id])->result();
            $data['kelas'] = $this->M_template->view_where('v_kelas_privat', 
                [
                    'is_full' => 0,
                    'id_mp'=>$privat[0]->id_mp,
                    'id_guru'=>$privat[0]->id_guru,
                    'id_kelas'=>$privat[0]->id_kelas,
                ]
                )->result();
            $data['id'] = $id;

            $this->load->view('guru/header');
            $this->load->view('guru/kelas/create', $data);
            $this->load->view('guru/footer');
        }
    }
    public function create_kelas($id)
    {
        $data = $this->M_template->view_where('pesanan',['id_pesanan'=>$id])->result();
        if ($data[0]->jumlah_siswa == 1) {
            $is_full = 1;
        }else{
            $is_full = 0;
        }
        
        $data_kelas_privat=[
            'id_kelas'=>$data[0]->id_kelas,
            'id_guru'=>$data[0]->id_guru,
            'id_mp'=>$data[0]->id_mp,
            'kapasitas'=>$data[0]->jumlah_siswa,
            'is_full'=>$is_full
        ];

        $id_privat = $this->M_template->insert_id('privat',$data_kelas_privat);

        $data_pesanan_privat=[
            'id_pesanan'=>$data[0]->id_pesanan,
            'id_privat'=>$id_privat,
        ];
        $this->M_template->insert('privat_pesanan',$data_pesanan_privat);
        $this->M_template->update('pesanan',['id_pesanan'=>$id],['is_created'=>1]);
        $this->M_template->update('jadwal',['id_pesanan'=>$this->input->post('pesanan')],['id_privat'=>$id_privat]);
        redirect('guru/kelasku/'.$id_privat);

    }
    public function edit_kelas($id)
    {
        $data['kelas'] = $this->M_template->view_where('kelas', ['id_privat' => $id])->result();
        $this->load->view('guru/header');
        $this->load->view('guru/kelas/edit', $data);
        $this->load->view('guru/footer');
    }
    public function delete_kelas($id)
    {
        $this->M_template->delete('kelas',['id_privat'=>$id]);
        redirect('guru/kelas');
    }
}
