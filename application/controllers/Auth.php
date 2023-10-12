<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $this->load->view('auth/login');
    }
    public function signup()
    {
        $this->load->view('auth/register');
    }
    public function guruSignUp()
    {
        if ($this->input->post()) {
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
            echo "<pre>";
            print_r($bidangs);
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
                'status' => "Waiting",
                'userid' => $userid,
            ];
            $guru_id = $this->M_template->insert('guru', $guru);
            for ($i = 0; $i < count($bidangs); $i++) {
                $this->M_template->insert('bidang', ['id_guru' => $guru_id, 'id_matpel' => $bidangs[$i]]);
            }
            $this->session->set_flashdata('error', '<span class="alert alert-success">Registrasi berhasil! Silahkan Masuk.');
            redirect('auth');
        } else {
            $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
            $data['pendidikan'] = $this->db->get('pendidikan')->result();
            $data['bank'] = $this->db->get('bank')->result();
            $this->load->view('auth/register_guru', $data);
        }
    }
    public function log()
    {
        $cek = $this->M_template->view_where('user', [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        ])->result();
        if (count($cek) == 1) {
            if ($cek[0]->level == 1) {
                $admin = $this->M_template->view_where('admin', [
                    'userid' => $cek[0]->userid
                ])->result();
                $data_sess = [
                    'userid'    => $cek[0]->userid,
                    'isAdmin'   => TRUE,
                    'isLogin'   => TRUE,
                    'name'      => $admin[0]->nama
                ];
                $this->session->set_userdata($data_sess);
                redirect('admin/');
            } elseif ($cek[0]->level == 2) {
                $guru = $this->M_template->view_where('guru', [
                    'userid' => $cek[0]->userid
                ])->result();
                $data_sess = [
                    'userid'    => $cek[0]->userid,
                    'isGuru'   => TRUE,
                    'isLogin'   => TRUE,
                    'name'      => $guru[0]->guru,
                    'avatar'      => $guru[0]->foto,
                    'id_guru'      => $guru[0]->id_guru,
                    'status'      => $guru[0]->status
                ];
                $this->session->set_userdata($data_sess);
                redirect('guru/');
            } elseif ($cek[0]->level == 3) {
                $siswa = $this->M_template->view_where('siswa', [
                    'userid' => $cek[0]->userid
                ])->result();
                $data_sess = [
                    'userid'    => $cek[0]->userid,
                    'isSiswa'   => TRUE,
                    'isLogin'   => TRUE,
                    'id_siswa'  => $siswa[0]->id_siswa,
                    'name'      => $siswa[0]->siswa,
                    'avatar'    => $siswa[0]->foto
                ];
                $this->session->set_userdata($data_sess);
                redirect('privat/');
            } else {
                $this->session->set_flashdata('error', '<span class="alert alert-danger">Username or password is wrong!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', '<span class="alert alert-danger">Username or password is wrong!');
            redirect('auth');
        }
    }
    public function reg()
    {
        $insert = [
            'username' => $this->input->post('email'),
            'password' => md5($this->input->post('pass')),
            'level' => 3
        ];
        $userid = $this->M_template->insert_id('user', $insert);
        $insert_siswa = [
            'email' => $this->input->post('email'),
            'siswa' => $this->input->post('name'),
            'no_hp' => $this->input->post('no_hp'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tingkat' => $this->input->post('tingkat'),
            'asal_sekolah' => $this->input->post('sekolah'),
            'userid' => $userid,
        ];
        $this->M_template->insert('siswa', $insert_siswa);
        $this->session->set_flashdata('error', '<span class="alert alert-success">Registrasi berhasil! Silahkan Masuk.');
        redirect('auth/');
    }
    public function signout()
    {
        $this->session->sess_destroy();
        redirect('privat/');
    }
}
