<?php

function session_true()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('user_id');
    if ($session_result) {
        redirect('admin/index');
    }
}

function session_false()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('user_id');
    if (!$session_result) {
        redirect('auth/login');
    }
}

function check_role()
{
    $ci = &get_instance();
    $check = $ci->data->get_data();
    if ($check->level != 1) {
        redirect('admin/index');
    }
}

function rupiah($value)
{
    $result = "Rp " . number_format($value, 0, ',', '.');
    return $result;
}
function date_local($value)
{
    $tanggal = substr($value, 8, 2);
    $bulan = substr($value, 5, 2);
    $tahun = substr($value, 0, 4);
    return $resukl = $tanggal . '/' . $bulan . '/' . $tahun . '/';
}
function barcodeRender()
{
    $ci = &get_instance();
    $sale_m = $ci->load->model('Items_model', 'items');
    return $ci->items->barcodeRand();
}
