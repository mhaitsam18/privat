<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_template extends CI_Model {
	public function insert($tabel, $data) {
         $this->db->insert($tabel, $data);
         return $this->db->insert_id();
    }
    public function insert_id($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
	public function update($tabel, $where, $data) {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }
    public function delete($tabel, $where) {
        $this->db->where($where);
        return $this->db->delete($tabel);
    }
    public function view_where($tabel, $where) {
        $this->db->where($where);
        return $this->db->get($tabel);
    }
    public function view($tabel) {
        return $this->db->get($tabel);
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function join($tabel,$using,$with)
    {
    	$this->db->select('*');
		$this->db->from($tabel);
		$this->db->join($with, $using);
		$query = $this->db->get();
		return $query;
    }
    public function view_pesanan()
    {
        return $this->db->query('SELECT * FROM `pesanan` 
        JOIN siswa USING(id_siswa) 
        JOIN mata_pelajaran USING(id_mp) 
        JOIN kelas USING(id_kelas) 
        JOIN guru USING(id_guru) 
        JOIN daftar_harga USING(id_harga) 
        JOIN hari USING (id_hari)');
    }
    public function view_pesanan_guru()
    {
        return $this->db->query('SELECT * FROM `pesanan` 
        JOIN siswa USING(id_siswa) 
        JOIN mata_pelajaran USING(id_mp) 
        JOIN kelas USING(id_kelas)
        JOIN daftar_harga USING(id_harga) 
        JOIN hari USING (id_hari)
        WHERE pesanan.id_guru = '.$this->session->id_guru);
    }
    public function view_pesanan_siswa()
    {
        return $this->db->query('SELECT * FROM `pesanan` 
        JOIN mata_pelajaran USING(id_mp) 
        JOIN kelas USING(id_kelas) 
        JOIN guru USING(id_guru) 
        JOIN daftar_harga USING(id_harga) 
        JOIN hari USING (id_hari)
        WHERE pesanan.id_siswa = '.$this->session->id_siswa.' ORDER BY pesanan.id_pesanan DESC');
    }
    public function view_pesananku($id)
    {
        return $this->db->query('SELECT * FROM `pesanan` 
        JOIN siswa USING(id_siswa) 
        JOIN mata_pelajaran USING(id_mp) 
        JOIN kelas USING(id_kelas) 
        JOIN guru USING(id_guru) 
        JOIN daftar_harga USING(id_harga) 
        JOIN hari USING (id_hari)
        WHERE pesanan.id_pesanan = '.$id);
    }
    public function view_harga()
    {
        return $this->db->query('SELECT * FROM `daftar_harga` JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp)');
    }
    public function view_hargaku($id)
    {
        return $this->db->query('SELECT * FROM `daftar_harga` JOIN kelas USING(id_kelas) JOIN mata_pelajaran USING(id_mp)');
    }
    public function view_profil_siswa($userid)
    {
        return $this->db->query('SELECT * FROM `user` JOIN siswa USING(userid) WHERE user.userid ='.$userid);
    }
    public function view_profil_guru($userid)
    {
        return $this->db->query('SELECT * FROM `user` JOIN guru USING(userid) WHERE user.userid ='.$userid);
    }
    public function view_profil_admin($userid)
    {
        return $this->db->query('SELECT * FROM `user` JOIN admin USING(userid) WHERE user.userid ='.$userid);
    }
    public function view_jadwal_admin()
    {
        return $this->db->query('SELECT * FROM jadwal 
        JOIN pesanan USING(id_pesanan) 
        JOIN hari ON jadwal.id_hari=hari.id_hari 
        JOIN mata_pelajaran USING (id_mp)
        JOIN absen USING (id_absen)
        JOIN guru USING (id_guru)
        JOIN kelas USING (id_kelas)
        JOIN siswa USING (id_siswa)');
    }
    public function view_jadwal_admin_pesananku($id)
    {
        return $this->db->query('SELECT * FROM jadwal 
        JOIN pesanan USING(id_pesanan) 
        JOIN hari ON jadwal.id_hari=hari.id_hari 
        JOIN mata_pelajaran USING (id_mp) 
        JOIN absen USING (id_absen)
        JOIN guru USING (id_guru)
        WHERE jadwal.id_pesanan='.$id);
    }
    public function view_jadwal_siswa_pesanan()
    {
        return $this->db->query('SELECT * FROM jadwal 
        JOIN pesanan USING(id_pesanan) 
        JOIN hari ON jadwal.id_hari=hari.id_hari 
        JOIN mata_pelajaran USING (id_mp) 
        JOIN absen USING (id_absen)
        JOIN kelas USING (id_kelas)
        JOIN guru USING (id_guru)
        WHERE pesanan.id_siswa='.$this->session->id_siswa);
    }
    public function view_jadwal_guru()
    {
        return $this->db->query('SELECT * FROM jadwal 
        JOIN privat USING(id_privat) 
        JOIN hari ON jadwal.id_hari=hari.id_hari 
        JOIN mata_pelajaran USING (id_mp) 
        JOIN absen USING (id_absen)
        JOIN kelas USING (id_kelas)
        WHERE privat.id_guru='.$this->session->id_guru.' ORDER BY absen.waktu_absen DESC, jadwal.tanggal_belajar ASC');
    }

}
