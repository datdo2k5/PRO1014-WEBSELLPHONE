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
          <h1>Quản lý danh sách điện thoại</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=formthemsanpham' ?>">
                <button class="btn btn-success">Thêm điện thoại mới</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listSanPham as $key => $sanPham): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanPham['ten_sp'] ?></td>
                      <td><?= $sanPham['gia'] ?></td>
                      <td>
                        <img src="<?= BASE_URL . $sanPham['hinh'] ?>" style="width:100px" alt=""
                          onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP.K_53vg76iyG2ZoqyQZkMXAHaI3?w=153&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7';">
                      </td>
                      <td><?= $sanPham['soluong'] ?></td>
                      <td><?= $sanPham['ten_loai'] ?></td>
                      <td><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Hết hàng' ?></td>
                      <td>
                        <div class="btn-group">

                          <a href="<?= BASE_URL_ADMIN . '?act=chitietsanpham&id_sanpham=' . $sanPham['id'] ?>">
                            <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                          </a>

                          <a href="<?= BASE_URL_ADMIN . '?act=formsuasanpham&id_sanpham=' . $sanPham['id'] ?>">
                            <button class="btn btn-warning"><i class="far fa-edit"></i></button>
                          </a>

                          <a href="<?= BASE_URL_ADMIN . '?act=xoasanpham&id_sanpham=' . $sanPham['id'] . '&status=success' ?>"
                            onclick="return confirm('Bạn có muốn xóa ?')">
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </a>

                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ngày nhập</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>

</html>