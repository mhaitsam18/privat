<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $querymenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $querymenu['menu_id'];

        $userAccess = $ci->db->get_where('user_acces_menu', ['role_id' => $role_id, ' menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_acces_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function cek_keahlian($id_keahlian, $id_kategori)
{
    $ci = get_instance();
    $result = $ci->db->get_where('kategori_keahlian', [
        'id_keahlian' => $id_keahlian,
        'id_kategori' => $id_kategori
    ]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function cari_tanggal($tanggal)
{
    $bulan = '';
    switch (date('n',strtotime($tanggal))) {
        case 1: $bulan = 'Januari'; break;
        case 2: $bulan = 'Februari'; break;
        case 3: $bulan = 'Maret'; break;
        case 4: $bulan = 'April'; break;
        case 5: $bulan = 'Mei'; break;
        case 6: $bulan = 'Juni'; break;
        case 7: $bulan = 'Juli'; break;
        case 8: $bulan = 'Agustus'; break;
        case 9: $bulan = 'September'; break;
        case 10: $bulan = 'Okteber'; break;
        case 11: $bulan = 'November'; break;
        case 12: $bulan = 'Desember'; break;
    }

    return date('j',strtotime($tanggal))." $bulan ".date('Y',strtotime($tanggal));
}

function cari_waktu($tanggal)
{
    $bulan = '';
    switch (date('n',strtotime($tanggal))) {
        case 1: $bulan = 'Januari'; break;
        case 2: $bulan = 'Februari'; break;
        case 3: $bulan = 'Maret'; break;
        case 4: $bulan = 'April'; break;
        case 5: $bulan = 'Mei'; break;
        case 6: $bulan = 'Juni'; break;
        case 7: $bulan = 'Juli'; break;
        case 8: $bulan = 'Agustus'; break;
        case 9: $bulan = 'September'; break;
        case 10: $bulan = 'Okteber'; break;
        case 11: $bulan = 'November'; break;
        case 12: $bulan = 'Desember'; break;
    }

    return date('j',strtotime($tanggal))." $bulan ".date('Y H:i:s',strtotime($tanggal));
}