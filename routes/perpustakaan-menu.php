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
</ul>