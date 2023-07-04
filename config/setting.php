<?php
    //** TimeZone */
    date_default_timezone_set('Asia/Jakarta');

    //** Setting Name Apps And Version Apps */
    define('APP_NAME', 'ASA');
    define('DESCRIPTION', 'ALVERO SCHOOLS APPS');
    define('VERSION_APP', '1.0 Beta');
    define('WARNING', 'You cant Access this page dumbnuts');
    define('AUTHOR', 'Lysca');

    //** Setting MAIN HOST AND JENJANG */
    define('MAIN_HOST', 'vero');
    define('JENJANG', 'SMK');

    //** SETTING DATABASE */
    define('DB_HOST','localhost');
    define('DB_NAME','alvero');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');

    //** Setting HOST */

    // Get the scheme and hostname of the current request
    $scheme = $_SERVER['REQUEST_SCHEME'];
    $host = $_SERVER['HTTP_HOST'];

    // Create the base URL
    $base_url['whatsApp'] = "$scheme://$host:8000";
    $base_url['main'] = "$scheme://$host/".MAIN_HOST;
    $base_url['assets'] = "$scheme://$host/".MAIN_HOST."/assets/";
    $base_url['foto'] = "$scheme://$host/".MAIN_HOST."/assets/uploads/";

    // Create the base URL
    // $base_url['whatsApp'] = "$scheme://$host:8000";
    // $base_url['main'] = "$scheme://$host/";
    // $base_url['assets'] = "$scheme://$host/assets/";
    // $base_url['foto'] = "$scheme://$host/assets/uploads/";

    // Path Name //
    $path = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    $file1 = basename($path);
    $file2 = basename($path, ".php");
    $file2 = str_replace('-', ' ', $file2);

    $dir = basename(dirname($_SERVER['SCRIPT_NAME']));

    //** JENJANG VIEW */
    if(JENJANG == "SMK" || JENJANG == "SMA"){
        $isJenjang =  "";
    }else{
        $isJenjang = 'display: none';
    }

    // Tanggal Indonesia

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    //** Rupiah Function */
    function rupiah($angka) {
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

      
    // Date
    $date = date('Y-m-d');

?>