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

    <li class="menu-title mt-2" data-key="t-Absensi">Kesiswaan</li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="check"></i>
            <span data-key="t-dataAbsensi">Data Absensi</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../dataabsensi/data-harian">
                    <span data-key="dataHarian">Data Absensi Harian Siswa</span>
                </a>
            </li>
            <li>
                <a href="../dataabsensi/rekap-data">
                    <span data-key="dataBulanan">Rekap Data Siswa</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="flag"></i>
            <span data-key="t-kesiswaan">Laporan Siswa</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../kesiswaan/">
                    <span data-key="dataKesiswaan">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="../kesiswaan/prestasi">
                    <span data-key="dataPrestasi">Data Prestasi Siswa</span>
                </a>
            </li>
            <li>
                <a href="../kesiswaan/pelanggaran">
                    <span data-key="dataPelanggaran">Pelanggaran Siswa</span>
                </a>
            </li>
        </ul>
    </li>
</ul>