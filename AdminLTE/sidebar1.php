 <?php
 include "rel.php";
 include "script.php";
 ?>
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../AdminLTE/dist/img/pnc.png" alt="SISKA" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I S K A | P N C</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../AdminLTE/dist/img/pnc.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["username"] ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                Surat Pengajuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tb_sp_mengajar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SK Mengajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SK Magang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SK Dosen Wali</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                Import Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="import_skm.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lampiran SK Mengajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lampiran SK Magang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Lampiran SK Dosen Wali</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="tb_jurusan.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Tabel Jurusan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tb_user.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Tabel User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tb_verifikasi.php" class="nav-link">
              <i class="nav-icon far fa-check-square"></i>
              <p>Tabel Verifikasi</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="tb_history_sk_mengajar.php" class="nav-link">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>History SK</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="../login/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          </li>
            </ul>
          </li>
      </nav>
  </div>
</aside>