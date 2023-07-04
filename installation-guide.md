Server Requirement :
1. Apache server 2.4.52
2. PHP 8.1
3. Database = 10.4.22-MariaDB

Setup database :
1. Open folder config/setting
2. Change [
    //** SETTING DATABASE */
    define('DB_HOST','localhost');
    define('DB_NAME','alvero');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
] into your database name, username and password
3. Import alvero.sql into your database section

Setup website :
1. Open folder config/setting
2. Change [
    define('MAIN_HOST', 'vero');
    define('JENJANG', 'SMK');
] Note : Just change MAIN_HOST to your folder name. if you running on SD, MI, SMP, MTS, SMA or MA change JENJANG section.
3. If you running this webserver on main web site delete All // [
    // $base_url['whatsApp'] = "$scheme://$host:8000";
    // $base_url['main'] = "$scheme://$host/";
    // $base_url['assets'] = "$scheme://$host/assets/";
    // $base_url['foto'] = "$scheme://$host/assets/uploads/";
]

Default Username and Password [
    ADMIN :
    username : admin
    password : admin

    Operator Perpus :
    username : perpus
    password : admin

    Tata Usaha :
    username : admintu
    password : admin

    Operator KBM :
    username : operator
    password : admin

    Kesiswaan :
    username : kesiswaan
    password : admin

    BP / BK :
    username : adminbp
    passowrd : admin
]

For Auth guru is [
    Username : (You can access in management guru section)
    Password : Same like username.

    Note : Guru can change password when login as Guru
]

For Auth Wali and Siswa [
    WALI :
    username : wali[USERNAMESISWA]
    password : NIS

    SISWA:
    username : (You can access in datamaster siswa section)
    password : NIS
]