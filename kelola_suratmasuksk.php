<?php 
session_start();
include("koneksi.php"); 

if (!$_SESSION['username']) {
  header("Location:login.php");
  exit();
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Home Sekretariat</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <h2 class="app-header__logo"><span class="hidden-xs"><?php echo $_SESSION['jabatan']; ?></span></h2>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
          <span class="hidden-xs"><?php echo $_SESSION['divisi']; ?></span>
          <i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><span class="hidden-xs"><?php echo $_SESSION['nama_lengkap']; ?></span></p>
      </div>
    </div>
    <ul class="app-menu">

      <li><a class="app-menu__item" href="home1.php"><i class="app-menu__icon fa fa-home"></i><span
            class="app-menu__label">Home</span></a></li>

      <li><a class="app-menu__item" href="kelola_user.php"><i class="app-menu__icon fa fa-users">
          </i><span class="app-menu__label">Kelola User</span></a></li>

      <li><a class="app-menu__item" href="kelola_suratmasuksk.php"><i class="app-menu__icon fa fa-envelope"></i>
          <span class="app-menu__label">Kelola Surat Masuk</span></a></li>

      <li><a class="app-menu__item" href="ktracking_suratmasuk.php"><i class="app-menu__icon fa fa-search"></i>
          <span class="app-menu__label">Kelola Tracking <br> Surat Masuk</span></a></li>

          <li><a class="app-menu__item" href="ktracking_suratkeluar.php"><i class="app-menu__icon fa fa-search"></i>
          <span class="app-menu__label">Kelola Tracking <br> Surat Keluar</span></a></li>

      <li><a class="app-menu__item" href="kelola_suratkeluarsk.php"><i class="app-menu__icon fa fa-paper-plane"></i>
          <span class="app-menu__label">Kelola Surat Keluar</span></a></li>

    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-envelope"></i> Data Surat Masuk</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Kelola Surat Masuk</li>

      </ul>
    </div>
    <!-- <div class="col-md-6"> -->
    <!--  <div class="tile-title-w-btn"> -->
    <!-- <p><a class="btn btn-primary icon-btn" href="tambah_cuti.php"><i class="fa fa-plus"></i>Tambah</a></p> -->

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Surat Masuk</th>
                  <th>Nama Pengirim</th>
                  <th>No Surat Masuk</th>
                  <th>Disposisi Tujuan</th>
                  <th>File Surat</th>
                  <th>Keterangan</th>
                  <th>Perihal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'koneksi.php';
                    $no = 1;
                    $query = mysqli_query($db, "SELECT tgl_suratmasuk, user.nama_lengkap, id_suratm, no_suratm, disposisi_tujuan, file_surat, keterangan, perihal FROM `surat_masuk`
                    JOIN user USING (id_user)");
                    

                    while($suratmasuk = mysqli_fetch_array($query)){ ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $suratmasuk['tgl_suratmasuk']; ?></td>
                  <td><?php echo $suratmasuk['nama_lengkap']; ?></td>
                  <td><?php echo $suratmasuk['no_suratm']; ?></td>
                  <td><?php echo $suratmasuk['disposisi_tujuan']; ?></td>
                  <td><?php echo $suratmasuk['file_surat']; ?></td>
                  <td><?php echo $suratmasuk['keterangan']; ?></td>
                  <td><?php echo $suratmasuk['perihal']; ?></td>
                  <td>
                  <?php if ($suratmasuk['keterangan'] == 'terkirim')
                                        {
                                         }else {echo "<a class='btn btn-default btn-primary' target='_blank' href='cetak_suratmasuk.php?file_surat=".$suratmasuk['file_surat']."'><i class='fa fa-print'></i>Cetak Surat</a>";
                                          ;}
                                        ?>
                    <?php if ($suratmasuk['keterangan'] == 'Diterima')
                                         {
                                         echo "<a class='btn btn-info' href='edit_suratmasuksk.php?id_suratm=".$suratmasuk['id_suratm']."'><i class='fa fa-lg fa-edit'></i>Edit Surat</a>";
                                         echo" ";
                                         echo "<a class='btn btn-info' href='tambah_tracking.php?id_suratm=".$suratmasuk['id_suratm']."'>Tambah Tracking </a>";
                                         } else if ($suratmasuk['keterangan'] == 'terkirim') 
                                         {echo "<a class='btn btn-info' href='edit_suratmasuksk.php?id_suratm=".$suratmasuk['id_suratm']."'><i class='fa fa-lg fa-edit'></i>Edit Surat</a>";
                                         }else if($suratmasuk['keterangan'] == 'Selesai') { }
                                         else if($suratmasuk['keterangan'] == 'Diproses') {echo "<a class='btn btn-info' href='edit_suratmasuksk.php?id_suratm=".$suratmasuk['id_suratm']."'><i class='fa fa-lg fa-edit'></i>Edit Surat</a>";
                                         }
                                         else{}
                                        ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
</body>

</html>