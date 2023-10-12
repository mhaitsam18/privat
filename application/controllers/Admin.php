<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        if ($this->session->isSiswa == true) {
            redirect('privat/');
        } elseif ($this->session->isGuru == true) {
            redirect('guru/');
        }
        if ($this->session->isLogin == false) {
            if ($this->session->isAdmin == false) {
                redirect('auth/');
            }
        }
    }
    public function index()
    {
        $data = [
            'pesanan' => $this->M_template->view('pesanan')->num_rows(),
            'guru' => $this->M_template->view('guru')->num_rows(),
            'siswa' => $this->M_template->view('siswa')->num_rows(),
            'mata_pelajaran' => $this->M_template->view('mata_pelajaran')->num_rows(),
            'rating' => $this->M_template->query("SELECT SUM(rating) AS rating FROM testimoni")->row(),
            'pendapatan' => $this->M_template->query("SELECT SUM(daftar_harga.harga*pesanan.jumlah_pertemuan) as total FROM `pesanan` JOIN daftar_harga USING(id_harga)")->row(),
            'total_testi' => $this->M_template->view('testimoni')->num_rows(),
        ];
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    public function guru()
    {
        $data['guru'] = $this->M_template->view('guru')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/guru/guru', $data);
        $this->load->view('admin/footer');
    }
    public function guruku($id)
    {
        $data['guru'] = $this->M_template->view_where('guru', ['id_guru' => $id])->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/guru/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_guru()
    {
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/guru/create', $data);
        $this->load->view('admin/footer');
    }
    public function edit_guru($id)
    {
        $data['guru'] = $this->M_template->view_where('guru', ['id_guru' => $id])->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/guru/detail', $data);
        $this->load->view('admin/footer');
    }
    public function save_guru()
    {
        $user = [
            'username' => $this->input->post('email'),
            'password' => md5($this->input->post('email')),
            'level' => 2,
        ];
        $userid = $this->M_template->insert_id('user', $user);

        $config = array(
            'upload_path' => './foto/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg|pdf',
            'max_size' => 10000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $file_data = $this->upload->data();
        }
        if ($this->upload->do_upload('ktp')) {
            $file_data_ktp = $this->upload->data();
        }
        if ($this->upload->do_upload('ijazah')) {
            $file_data_ijazah = $this->upload->data();
        }
        $bidangs = $this->input->post('bidang');
        $guru = [
            'guru' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'foto' => $file_data['file_name'],
            'ktp' => $file_data_ktp['file_name'],
            'ijazah' => $file_data_ijazah['file_name'],
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'institusi' => $this->input->post('institusi'),
            'program_studi' => $this->input->post('prodi'),
            'ipk' => $this->input->post('ipk'),
            'alamat' => $this->input->post('alamat'),
            'bank' => $this->input->post('bank'),
            'rekening' => $this->input->post('rekening'),
            'status' => "Approved",
            'userid' => $userid,
        ];
        $guru_id = $this->M_template->insert('guru', $guru);
        for ($i = 0; $i < count($bidangs); $i++) {
            $this->M_template->insert('bidang', ['id_guru' => $guru_id, 'id_matpel' => $bidangs[$i]]);
        }
        redirect('admin/guru');
    }
    public function delete_guru($id)
    {
        $this->M_template->delete('guru', ['id_guru' => $id]);
        redirect('admin/guru');
    }
    public function approve_guruku($value, $id)
    {
        if ($value == "approve") {
            $this->M_template->update('guru', ['id_guru' => $id], ['status' => "Approved"]);
        } else {
            $this->M_template->update('guru', ['id_guru' => $id], ['status' => "Not Approved"]);
        }

        redirect('admin/guru');
    }

    public function siswa()
    {
        $data['siswa'] = $this->M_template->view('siswa')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/siswa', $data);
        $this->load->view('admin/footer');
    }
    public function siswaku($id)
    {
        $data['siswa'] = $this->M_template->view_where('siswa', ['id_siswa' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_siswa()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/create');
        $this->load->view('admin/footer');
    }
    public function edit_siswa($id)
    {
        $data['siswa'] = $this->M_template->view_where('siswa', ['id_siswa' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('admin/footer');
    }
    public function delete_siswa($id)
    {
        $this->M_template->delete('siswa', ['id_siswa' => $id]);
        redirect('admin/siswa');
    }

    public function matpel()
    {
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/matpel/matpel', $data);
        $this->load->view('admin/footer');
    }
    public function matpelku($id)
    {
        $data['matpel'] = $this->M_template->view_where('mata_pelajaran', ['id_mp' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/matpel/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_matpel()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/matpel/create');
        $this->load->view('admin/footer');
    }
    public function edit_matpel($id)
    {
        $data['matpel'] = $this->M_template->view_where('mata_pelajaran', ['id_mp' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/matpel/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_matpel()
    {
        $this->M_template->insert('mata_pelajaran', ['mata_pelajaran' => $this->input->post('mata_pelajaran')]);
        redirect('admin/matpel');
    }
    public function update_matpel()
    {
        $this->M_template->update('mata_pelajaran', ['id_mp' => $this->input->post('id_mp')],['mata_pelajaran' => $this->input->post('mata_pelajaran')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Mata Pelajaran diperbarui!
                </div>');
        // redirect($_SERVER['HTTP_REFERER']);
        redirect('admin/matpel');
    }
    public function delete_matpel($id)
    {
        $this->M_template->delete('mata_pelajaran', ['id_mp' => $id]);
        redirect('admin/matpel');
    }

    public function pesanan()
    {
        $data['pesanan'] = $this->M_template->view_pesanan()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/pesanan/index', $data);
        $this->load->view('admin/footer');
    }
    public function pesananku($id)
    {
        $data['pesanan'] = $this->M_template->view_pesananku($id)->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/pesanan/detail', $data);
        $this->load->view('admin/footer');
    }
    public function pembayaran($id_pesanan)
    {
        $this->db->join('pesanan', 'pesanan.id_pesanan = pembayaran.id_pesanan');
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['pembayaran.id_pesanan' => $id_pesanan])->result();
        
        $this->db->join('daftar_harga', 'daftar_harga.id_harga = pesanan.id_harga');
        $data['pesanan'] = $this->db->get_where('pesanan', ['pesanan.id_pesanan' => $id_pesanan])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/pesanan/pembayaran', $data);
        $this->load->view('admin/footer');
    }

    public function update_status_pembayaran($id_pembayaran = null, $status = '')
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', [
            'status' => urldecode($status)
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bukti Pembayaran telah dinyatakan '.urldecode($status).'</div>');
        redirect($_SERVER['HTTP_REFERER']);
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
    public function create_pesanan()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/pesanan/create');
        $this->load->view('admin/footer');
    }
    public function edit_pesanan($id)
    {
        $data['pesanan'] = $this->M_template->view_where('pesanan', ['id_pesanan' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_pesanan()
    {
        $this->M_template->insert('pesanan', ['pesanan' => $this->input->post('pesanan')]);
        redirect('admin/pesanan');
    }
    public function delete_pesanan($id)
    {
        $this->M_template->delete('pesanan', ['id_pesanan' => $id]);
        redirect('admin/pesanan');
    }

    public function konfirmasi($id_pesanan, $status)
    {
        $pesanan = $this->M_template->view_where('pesanan', ['id_pesanan' => $id_pesanan])->result();
        $today = $pesanan[0]->tanggal_mulai_belajar;
        switch ($status) {
            case 1:
                $this->M_template->update('pesanan', ['id_pesanan' => $id_pesanan], ['status_pembayaran' => 'Sudah Konfirmasi']);

                for ($i = 1; $i <= $pesanan[0]->jumlah_pertemuan; $i++) {
                    $repeat = strtotime("+7 day", strtotime($today));
                    $today = date('Y-m-d', $repeat);
                    echo $today . "<br>";
                    $insert_absen = [
                        'tanggal_absen' => $today
                    ];
                    $id_absen = $this->M_template->insert_id('absen', $insert_absen);
                    $insert_jadwal = [
                        'pertemuan' => $i,
                        'tanggal_belajar' => $today,
                        'waktu_belajar' => '16:00',
                        'status_jadwal' => 'Sesuai',
                        'id_hari' => $pesanan[0]->id_hari,
                        'id_absen' => $id_absen,
                        'id_pesanan' => $id_pesanan
                    ];
                    $this->M_template->insert('jadwal', $insert_jadwal);
                }
                break;
            case 2:
                $this->M_template->update('pesanan', ['id_pesanan' => $id_pesanan], ['status_pembayaran' => 'Belum Konfirmasi']);
                break;
        }
        redirect('admin/pesanan');
    }

    public function harga()
    {
        $data['harga'] = $this->M_template->view_harga('daftar_harga')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/harga/harga', $data);
        $this->load->view('admin/footer');
    }
    public function hargaku($id)
    {
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mp = daftar_harga.id_mp');
        $this->db->join('kelas', 'kelas.id_kelas = daftar_harga.id_kelas');
        $data['harga'] = $this->M_template->view_where('daftar_harga', ['id_harga' => $id])->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['kelas'] = $this->M_template->view('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/harga/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_harga()
    {
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['kelas'] = $this->M_template->view('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/harga/create', $data);
        $this->load->view('admin/footer');
    }
    public function edit_harga($id)
    {
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mp = daftar_harga.id_mp');
        $this->db->join('kelas', 'kelas.id_kelas = daftar_harga.id_kelas');
        $data['harga'] = $this->M_template->view_where('daftar_harga', ['id_harga' => $id])->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['kelas'] = $this->M_template->view('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/harga/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_harga()
    {
        $this->M_template->insert(
            'daftar_harga',
            [
                'harga' => $this->input->post('harga'),
                'id_kelas' => $this->input->post('kelas'),
                'id_mp' => $this->input->post('mata_pelajaran'),
            ]
        );
        redirect('admin/harga');
    }
    public function update_harga($id)
    {
        $this->M_template->update(
            'daftar_harga',
            ['id_harga' => $id],
            [
                'harga' => $this->input->post('harga'),
                'id_kelas' => $this->input->post('kelas'),
                'id_mp' => $this->input->post('mata_pelajaran'),
            ]
        );
        redirect('admin/harga');
    }

    public function jadwal()
    {
        $data['jadwal'] = $this->M_template->view_jadwal_admin()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/jadwal/index', $data);
        $this->load->view('admin/footer');
    }

    public function kelas()
    {

        // $data['privat'] = $this->M_template->view('v_kelas_privat')->result();
        $this->db->join('privat', 'privat.id_privat = privat_pesanan.id_privat');
        $this->db->join('kelas', 'privat.id_kelas = kelas.id_kelas');
        $this->db->join('guru', 'privat.id_guru = guru.id_guru');
        $this->db->join('mata_pelajaran', 'privat.id_mp = mata_pelajaran.id_mp');
        $this->db->join('pesanan', 'pesanan.id_pesanan = privat_pesanan.id_pesanan');
        $this->db->join('siswa', 'siswa.id_siswa = pesanan.id_siswa');
        $data['privat'] = $this->db->get('privat_pesanan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/index', $data);
        $this->load->view('admin/footer');
    }
    public function kelasku($id)
    {
        $data['kelas'] = $this->M_template->query("SELECT * FROM privat JOIN guru USING(id_guru) JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp) WHERE id_privat=" . $id)->result();
        $data['siswa'] = $this->M_template->query("SELECT * FROM privat_pesanan JOIN pesanan USING(id_pesanan) JOIN privat USING(id_privat) JOIN siswa USING(id_siswa) WHERE id_privat=" . $id)->result();
        $data['absen'] = $this->M_template->query("SELECT * FROM `absen` JOIN jadwal USING(id_absen) JOIN pesanan USING(id_pesanan) JOIN siswa USING(id_siswa) WHERE id_privat = " . $id)->result();
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/detail', $data);
        $this->load->view('admin/footer');
    }
    public function tambah_kelasku($id = null)
    {
        if ($id == null) {
            if ($this->input->post()) {
                $count = $this->M_template->view_where('privat_pesanan', ['id_privat' => $this->input->post('private')])->num_rows();
                $privat = $this->M_template->view_where('privat', ['id_privat' => $this->input->post('private')])->result();
                if ($privat[0]->kapasitas == ($count + 1)) {
                    $this->M_template->update('privat', ['id_privat' => $this->input->post('private')], ['is_fulll' => 1]);
                }

                $data_pesanan_privat = [
                    'id_pesanan' => $this->input->post('pesanan'),
                    'id_privat' => $this->input->post('private'),
                ];
                $this->M_template->insert('privat_pesanan', $data_pesanan_privat);
                $this->M_template->update('pesanan', ['id_pesanan' => $this->input->post('pesanan')], ['is_created' => 1]);
                $this->M_template->update('jadwal', ['id_pesanan' => $this->input->post('pesanan')], ['id_privat' => $this->input->post('private')]);
                redirect('admin/kelasku/' . $this->input->post('private'));
            }
        } else {
            $privat = $this->M_template->view_where('privat', ['id_privat' => $id])->result();
            $data['kelas'] = $this->M_template->view_where(
                'v_kelas_privat',
                [
                    'is_full' => 0,
                    'id_mp' => $privat[0]->id_mp,
                    'id_guru' => $privat[0]->id_guru,
                    'id_kelas' => $privat[0]->id_kelas,
                ]
            )->result();
            $data['id'] = $id;

            $this->load->view('admin/header');
            $this->load->view('admin/kelas/create', $data);
            $this->load->view('admin/footer');
        }
    }
    public function create_kelas($id)
    {
        $data = $this->M_template->view_where('pesanan', ['id_pesanan' => $id])->result();
        if ($data[0]->jumlah_siswa == 1) {
            $is_full = 1;
        } else {
            $is_full = 0;
        }

        $data_kelas_privat = [
            'id_kelas' => $data[0]->id_kelas,
            'id_guru' => $data[0]->id_guru,
            'id_mp' => $data[0]->id_mp,
            'kapasitas' => $data[0]->jumlah_siswa,
            'is_full' => $is_full
        ];

        $id_privat = $this->M_template->insert_id('privat', $data_kelas_privat);

        $data_pesanan_privat = [
            'id_pesanan' => $data[0]->id_pesanan,
            'id_privat' => $id_privat,
        ];
        $this->M_template->insert('privat_pesanan', $data_pesanan_privat);
        $this->M_template->update('pesanan', ['id_pesanan' => $id], ['is_created' => 1]);
        $this->M_template->update('jadwal', ['id_pesanan' => $this->input->post('pesanan')], ['id_privat' => $id_privat]);
        redirect('admin/kelasku/' . $id_privat);
    }
    public function edit_kelas($id)
    {
        $data['kelas'] = $this->M_template->view_where('kelas', ['id_privat' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/edit', $data);
        $this->load->view('admin/footer');
    }
    public function delete_kelas($id)
    {
        $this->M_template->delete('kelas', ['id_privat' => $id]);
        redirect('admin/kelas');
    }

    public function honor()
    {
        $data['honor'] = $data['honor'] = $this->M_template->query(
            'SELECT * FROM jadwal 
            JOIN pesanan USING(id_pesanan) 
            JOIN guru ON pesanan.id_guru=guru.id_guru 
            JOIN hari ON jadwal.id_hari=hari.id_hari 
            JOIN mata_pelajaran USING (id_mp) 
            JOIN absen USING (id_absen)
            JOIN kelas USING (id_kelas)
            JOIN siswa USING (id_siswa)
            JOIN daftar_harga ON pesanan.id_mp=daftar_harga.id_mp AND pesanan.id_kelas=daftar_harga.id_kelas
            WHERE absen.waktu_absen != ""')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/honor/index', $data);
        $this->load->view('admin/footer');
    }
}
