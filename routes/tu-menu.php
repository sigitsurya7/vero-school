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
</ul>