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
          <h1>Quản lý danh mục sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
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
                <h3 class="card-title">Thêm danh mục sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=themdanhmuc' ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_loai" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['ten_loai'])) { ?>
                        <p class="text-danger"><?= $error['ten_loai']?></p>
                    <?php }?>
                  </div>

                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="mota" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
                    
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