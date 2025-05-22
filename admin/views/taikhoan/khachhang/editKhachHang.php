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
          <h1>Quản lý tài khoản khách hàng</h1>
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
              <h3 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['hoten']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=suakhachhang' ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="khachhang_id" value="<?= $khachHang['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="hoten" value="<?= $khachHang['hoten']; ?>" placeholder="Nhập họ tên khách hàng">
                  <?php if (isset($_SESSION['error']['hoten'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['hoten'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?= $khachHang['email']; ?>" placeholder="Nhập email khách hàng">
                  <?php if (isset($_SESSION['error']['email'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" name="dienthoai" value="<?= $khachHang['dienthoai']; ?>" placeholder="Nhập số điện thoại khách hàng">
                  <?php if (isset($_SESSION['error']['dienthoai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['dienthoai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input type="date" class="form-control" name="ngay_sinh" value="<?= !empty($khachHang['ngay_sinh']) ? $khachHang['ngay_sinh'] : ''; ?>" placeholder="Nhập ngày sinh của khách hàng">
                  <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group">
                  <label for="gioi_tinh">Giới tính</label>
                  <select id="gioi_tinh" name="gioi_tinh" class="form-control custom-select">
                    <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam </option>
                    <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
                  </select>
                </div>


                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="diachi" value="<?= $khachHang['diachi']; ?>" placeholder="Nhập địa chỉ khách hàng">
                  <?php if (isset($_SESSION['error']['diachi'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['diachi'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="trang_thai">Trạng thái khách hàng</label>
                  <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                    <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động </option>
                    <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Không hoạt động</option>
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