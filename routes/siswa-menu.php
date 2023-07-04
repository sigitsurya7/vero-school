<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>

    <li>
        <a href="<?php echo $base_url['main']; ?>">
            <i data-feather="home"></i>
            <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
        </a>
    </li>
    
    <li>
        <a href="../siswa/profile">
            <i data-feather="users"></i>
            <span data-key="t-Siswa">Profile</span>
        </a>
    </li>

    <li class="menu-title mt-2" data-key="t-Absensi">Absensi</li>

    <li>
        <a href="../siswa/absensi">
            <i data-feather="users"></i>
            <span data-key="t-DataAbsensiSiswa">Data Absensi</span>
        </a>
    </li>

    <div style="<?php if (!$isWali) {echo 'display: none';} ?>">
        <li class="menu-title mt-2" data-key="t-Absensi">Laporan Siswa</li>

        <li>
            <a href="../siswa/laporan">
                <i data-feather="alert-circle"></i>
                <span data-key="t-Siswa">Data Laporan Siswa</span>
            </a>
        </li>

        <li>
            <a href="../siswa/pembayaran">
                <i data-feather="archive"></i>
                <span data-key="t-tataUsaha">Data Tata Usaha Siswa</span>
            </a>
        </li>

        <li class="menu-title mt-2" data-key="t-Profile">Profile</li>

        <li>
            <a href="../siswa/profile-wali">
                <i data-feather="book"></i>
                <span data-key="t-SettingProfile">Setting Profile</span>
            </a>
        </li>

    </div>

    <li class="menu-title mt-2" data-key="t-components">Perpustakaan</li>

    <li>
        <a href="../siswa/perpustakaan">
            <i data-feather="book"></i>
            <span data-key="t-peminjamanBuku">Peminjaman Buku</span>
        </a>
    </li>

    <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
        <div class="card-body">
            <h4 class="card-title">Status Kartu</h4>
            <div class="mt-4">
                <?php echo $cardStatus; ?>
            </div>
        </div>
    </div>

</ul>