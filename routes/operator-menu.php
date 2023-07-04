<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>

    <li>
        <a href="<?php echo $base_url['main']; ?>">
            <i data-feather="home"></i>
            <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
        </a>
    </li>

    <li>
        <a href="../pengumuman">
            <i data-feather="volume-2"></i>
            <span data-key="t-pengumuman">Pengumuman</span>
        </a>
    </li>
    
    <li>
        <a href="../datamaster/siswa">
            <i data-feather="users"></i>
            <span data-key="t-Siswa">Data Master Siswa</span>
        </a>
    </li>

    <li class="menu-title mt-2" data-key="t-Absensi">Absensi Online</li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="check"></i>
            <span data-key="t-dataAbsensi">Data Absensi</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../dataabsensi/kartu-siswa">
                    <span data-key="dataSiswa">Data Kartu Siswa</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span data-key="dataHarian">Data Absensi Harian Siswa</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span data-key="dataBulanan">Rekap Data Siswa</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-title mt-2" data-key="t-components">APPS</li>

    <li>
        <a href="#">
            <i data-feather="cloud"></i>
            <span data-key="t-API">API WhatsApp</span>
        </a>
    </li>

    <li>
        <a href="../setting/setting">
            <i data-feather="settings"></i>
            <span data-key="t-Setting">Setting Apps</span>
        </a>
    </li>

    

</ul>