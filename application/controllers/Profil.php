<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        if ($this->session->isLogin == false) {
            redirect('auth/');
        }
    }
    public function index()
    {
        $data['bank'] = $this->db->get('bank')->result();
        if ($this->session->isSiswa == true) {
            $data['profil'] = $this->M_template->view_profil_siswa($this->session->userid)->result();
            $this->load->view('template/header');
            $this->load->view('home/profil', $data);
            $this->load->view('template/footer');
        } elseif ($this->session->isGuru == true) {
            $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
            $data['bidang'] = $this->M_template->view_where('bidang', ['id_guru' => $this->session->id_guru])->result();
            $data['profil'] = $this->M_template->view_profil_guru($this->session->userid)->result();
            $this->load->view('guru/header');
            $this->load->view('guru/profil', $data);
            $this->load->view('guru/footer');
        } elseif ($this->session->isAdmin == true) {
            $data['profil'] = $this->M_template->view_profil_admin($this->session->userid)->result();
            $this->load->view('admin/header');
            $this->load->view('admin/profil', $data);
            $this->load->view('admin/footer');
        }
    }
    public function update_password()
    {
        $data = $this->M_template->view_where('user', ['userid' => $this->session->userid, 'password' => md5($this->input->post('old_password'))])->result();
        if (count($data) > 0) {
            $this->M_template->update('user', ['userid' => $this->session->userid], ['password' => md5($this->input->post('new_password'))]);
            redirect('profil/');
        }
        echo md5($this->input->post('old_password'));
        echo "<br>";
        print_r($data);
        echo $this->session->userid;
    }
    public function update_username()
    {
        $this->M_template->update('user', ['userid' => $this->session->userid], ['username' => $this->input->post('new_username')]);
        redirect('profil/');
    }
    public function update_foto()
    {
        $config = array(
            'upload_path' => './foto/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 10000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $file_data = $this->upload->data();
            if ($this->session->isSiswa == true) {
                $this->M_template->update('siswa', ['userid' => $this->session->userid], ['foto' => $file_data['file_name']]);
            } elseif ($this->session->isGuru == true) {
                $this->M_template->update('guru', ['userid' => $this->session->userid], ['foto' => $file_data['file_name']]);
            }
            $this->session->set_userdata('avatar', $file_data['file_name']);
            redirect('profil/');
        } else {
            echo $this->upload->display_errors();
        }
    }
    public function update_profil()
    {
        if ($this->session->isSiswa == true) {
            $update_siswa = [
                'siswa' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tingkat' => $this->input->post('tingkat'),
                'asal_sekolah' => $this->input->post('sekolah'),
                'kode_pos' => $this->input->post('kode_pos'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->M_template->update('siswa', ['userid' => $this->session->userid], $update_siswa);
        } elseif ($this->session->isGuru == true) {
            $update_guru = [
                'guru' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'institusi' => $this->input->post('institusi'),
                'program_studi' => $this->input->post('prodi'),
                'ipk' => $this->input->post('ipk'),
                'alamat' => $this->input->post('alamat'),
                'bank' => $this->input->post('bank'),
                'rekening' => $this->input->post('rekening'),
            ];
            if ($this->session->status == "Not Approved") {
                $update_guru['status'] = 'Waiting';
            }
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
            if ($_FILES['ktp']['name'] != "") {
                if ($this->upload->do_upload('ktp')) {
                    $file_data_ktp = $this->upload->data();
                    $update_guru['ktp'] = $file_data_ktp['file_name'];
                }
            }
            if ($_FILES['ijazah']['name'] != "") {
                if ($this->upload->do_upload('ijazah')) {
                    $file_data_ijazah = $this->upload->data();
                    $update_guru['ijazah'] = $file_data_ijazah['file_name'];
                }
            }
            // echo "<pre>";
            // print_r($update_guru);
            $this->M_template->update('guru', ['userid' => $this->session->userid], $update_guru);
            $bidangs = $this->input->post('bidang');
            $this->M_template->delete('bidang', ['id_guru' => $this->session->id_guru]);
            for ($i = 0; $i < count($bidangs); $i++) {
                $this->M_template->insert('bidang', ['id_guru' => $this->session->id_guru, 'id_matpel' => $bidangs[$i]]);
            }
        } elseif ($this->session->isAdmin == true) {
            $update_admin = [
                'nama' => $this->input->post('nama'),
            ];
            $this->M_template->update('admin', ['userid' => $this->session->userid], $update_admin);
        }
        redirect('profil/');
    }
}
