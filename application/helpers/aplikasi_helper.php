<?php 


function rupiah($nomor)
{
	return number_format($nomor, 0, ",", ".");
}

function tanggal($tanggal, $format = "d F Y")
{
	return date($format, strtotime($tanggal));
}

function bulan($bul)
{
    $bulan = [
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember",
    ];

    return isset($bulan[$bul]) ? $bulan[$bul] : "?";
}

function data_login($index, $user='pengguna')
{
	$CI =& get_instance();
	$data = $CI->session->userdata($user);

	return isset($data) ? $data[$index] : '-';

}

function data_notif()
{
    $CI =& get_instance();
    $data['barang_habis'] = count($CI->model->tampil_barang('habis'));
    $data['barang_kritis'] = count($CI->model->tampil_barang('hampir-habis'));
  
    return $data;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min;
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; 
    $bits = (int) $log + 1; 
    $filter = (int) (1 << $bits) - 1; 
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; 
    } while ($rnd > $range);
    return $min + $rnd;
}

function generateRandomString($length = 10) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); 

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}