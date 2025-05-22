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
          <h1>Quản lý danh sách sản phẩm</h1>
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
              <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=themsanpham' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_sp" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($_SESSION['error']['ten_sp'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten_sp'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="text" class="form-control" name="gia" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['error']['gia'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá khuyến mãi</label>
                  <input type="text" class="form-control" name="giam_gia" placeholder="Nhập giá khuyến mãi">
                  <?php if (isset($_SESSION['error']['giam_gia'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['giam_gia'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh">
                  <?php if (isset($_SESSION['error']['hinh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['hinh'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Album ảnh</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng sản phẩm" >
                  <?php if (isset($_SESSION['error']['soluong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['soluong'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Ngày nhập</label>
                  <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập ngày nhập hàng sản phẩm">
                  <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh Mục</label>
                  <section>
                    <select class="form-control" name="danh_muc_id" id="danhMucSelect">
                      <option selected disabled>Chọn danh mục sản phẩm</option>
                      <?php foreach ($listDanhMuc as $danhMuc): ?>
                        <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_loai'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </section>
                  <?php if (isset($_SESSION['error']['danh_muc_id'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-6">
                  <label>Trạng thái</label>
                  <section>
                    <select class="form-control" name="trang_thai" id="trangThaiSelect">
                      <option selected disabled>Chọn trạng thái sản phẩm</option>
                      <option value="1">Còn bán</option>
                      <option value="2">Hết hàng</option>
                    </select>
                  </section>
                  <?php if (isset($_SESSION['error']['trang_thai'])): ?>
                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group col-12">
                  <label>Mô tả</label>
                  <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>
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
