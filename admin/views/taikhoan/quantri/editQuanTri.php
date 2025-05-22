<!-- <header> -->
<?php include_once('./views/layout/header.php'); ?>
<!-- </header> -->
<!-- Navbar -->
<?php include_once('./views/layout/navbar.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once('./views/layout/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản quản trị viên</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa thông tin tài khoản quản trị: <?= $quanTri['hoten']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=suaquantri' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="quantri_id" value="<?= $quanTri['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="hoten" value="<?= $quanTri['hoten']; ?>" placeholder="Nhập họ tên quản trị">
                  <?php if (isset($_SESSION['error']['hoten'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['hoten'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?= $quanTri['email']; ?>" placeholder="Nhập email quản trị">
                  <?php if (isset($_SESSION['error']['email'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" name="dienthoai" value="<?= $quanTri['dienthoai']; ?>" placeholder="Nhập số điện thoại quản trị">
                  <?php if (isset($_SESSION['error']['dienthoai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['dienthoai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="trang_thai">Trạng thái tài khoản</label>
                  <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                    <option <?= $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động </option>
                    <option <?= $quanTri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Không hoạt động</option>
                  </select>
                </div>

                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

</html>
