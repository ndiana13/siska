 <?php
 include "rel.php";
 include "script.php";
 include '../login/config.php';
$nip = $_SESSION['nip'];
$result = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE nip='$nip'");
$row  = mysqli_fetch_array($result);
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
          <img src="../AdminLTE/dist/img/<?= $row['foto'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['nama_lengkap']; ?></a>
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
            <a href="tb_pengajuan.php" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>Pengajuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tb_verifikasi.php" class="nav-link">
              <i class="nav-icon far fa-check-square"></i>
              <p>Verifikasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tb_history.php" class="nav-link">
              <i class="nav-icon far fa-check-square"></i>
              <p>History</p>
            </a>
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