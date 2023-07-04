<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>

    <li>
        <a href="<?php echo $base_url['main']; ?>">
            <i data-feather="home"></i>
            <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
        </a>
    </li>

    <li>
        <a href="../guru/quotes">
            <i data-feather="volume-2"></i>
            <span data-key="t-quoets">Quotes Guru</span>
        </a>
    </li>

    <li <?php echo $walikelas; ?> class="menu-title" data-key="t-menu">Data Siswa : <?php echo $authGuru['idkelas']?></li>

    <li <?php echo $walikelas; ?>>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="check"></i>
            <span data-key="t-dataAbsensi">Data Absensi Siswa</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../guru/data-siswa">
                    <span data-key="dataWaliKelasSiswa">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="../guru/absensi">
                    <span data-key="dataHarian">Data Absensi Harian Siswa</span>
                </a>
            </li>
            <li>
                <a href="../guru/rekap-absensi">
                    <span data-key="dataBulanan">Rekap Data Siswa</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-title" data-key="t-absensiGuru">Rekap Absensi</li>

    <li>
        <a href="../guru/absen-guru">
            <i data-feather="check"></i>
            <span data-key="t-absensiGuru">Absensi Guru</span>
        </a>
    </li>

</ul>