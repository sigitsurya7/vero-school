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

    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="database"></i>
            <span data-key="t-database">Data Master</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../datamaster/level">
                    <span data-key="t-level">Level</span>
                </a>
            </li>
            <li>
                <a href="../datamaster/kelas">
                    <span data-key="t-kelas">Kelas</span>
                </a>
            </li>
            <?php
                $jenjang = JENJANG;
                if($jenjang == 'SMK'){
                    echo '<li>
                    <a href="../datamaster/jurusan">
                        <span data-key="t-jurusan">Jurusan</span>
                    </a>
                </li>';
                }
            ?>
            <li>
                <a href="../datamaster/import">
                    <span data-key="t-calendar">Import Data Master</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="menu-title mt-2" data-key="t-Absensi">Absensi Online</li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="check"></i>
            <span data-key="t-dataAbsensi">Data Absensi Siswa</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../dataabsensi/kartu-siswa">
                    <span data-key="dataSiswa">Data Kartu Siswa</span>
                </a>
            </li>
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
            <i data-feather="check"></i>
            <span data-key="t-dataAbsensiGuru">Data Absensi Guru</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../dataabsensi/kartu-guru">
                    <span data-key="dataguru">Data Kartu Guru</span>
                </a>
            </li>
            <li>
                <a href="../dataabsensi/data-harianguru">
                    <span data-key="dataHarianguru">Data Absensi Harian Guru</span>
                </a>
            </li>
            <li>
                <a href="../dataabsensi/rekap-dataguru">
                    <span data-key="dataBulananGuru">Rekap Data Guru</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-title mt-2" data-key="t-Absensi">Kesiswaan</li>

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

    <li class="menu-title mt-2" data-key="t-Absensi">Tata Usaha</li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="archive"></i>
            <span data-key="t-dataTataUsaha">Data Tata Usaha</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../tatausaha/master-pembayaran">
                    <span data-key="masterPembayaran">Master Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="../tatausaha/payment-data">
                    <span data-key="dataPaymentSiswa">Data Siswa</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-title mt-2" data-key="t-Absensi">Perpustakaan</li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="book"></i>
            <span data-key="t-Perpustakaan">Data Buku</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../perpustakaan/data-buku">
                    <span data-key="dataSiswa">Daftar Buku</span>
                </a>
            </li>
            <li>
                <a href="../perpustakaan/import-buku">
                    <span data-key="dataHarian">Import Buku</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="book-open"></i>
            <span data-key="t-transaksiPerpustakaan">Transaksi</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../perpustakaan/peminjaman">
                    <span data-key="dataSiswa">Peminjaman Buku</span>
                </a>
            </li>
            <li>
                <a href="../perpustakaan/pengembalian">
                    <span data-key="dataHarian">Pengembalian Buku</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-title mt-2" data-key="t-components">APPS</li>

    <li>
        <a href="../setting/whatsapp-api">
            <i data-feather="cloud"></i>
            <span data-key="t-API">API WhatsApp</span>
        </a>
    </li>

    <li>
        <a href="javascript: void(0)" class="has-arrow">
            <i data-feather="settings"></i>
            <span data-key="t-settings">Setting</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="../setting/setting">
                    <span data-key="setting">Setting Apps</span>
                </a>
            </li>
            <li>
                <a href="../setting/management-user">
                    <span data-key="managamentUser">Managent User</span>
                </a>
            </li>
            <li>
                <a href="../setting/management-guru">
                    <span data-key="managamentguru">Managent User Guru</span>
                </a>
            </li>
        </ul>
    </li>

    

</ul>