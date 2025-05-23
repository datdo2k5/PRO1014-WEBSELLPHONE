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

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">

            <div class="col-12">
              <img style="width: 400px; height: 400px" src="<?= BASE_URL . $sanPham['hinh'] ?>" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image"></div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_sp'] ?></h3>
            <hr>
            <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia'] . 'đ' ?></small></h4>
            <h4 class="mt-3">Giá khuyến mại: <small><?= $sanPham['giam_gia'] . 'đ' ?></small></h4>
            <h4 class="mt-3">Số lượng: <small><?= $sanPham['soluong'] ?></small></h4>
            <h4 class="mt-3">Lượt xem: <small><?= $sanPham['so_luot_xem'] ?></small></h4>
            <h4 class="mt-3">Ngày nhập khẩu: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
            <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_loai'] ?></small></h4>
            <h4 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Hết hàng' ?></small></h4>
            <h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h4>

          </div>
        </div>
        

        <div class="col-12">
                    <hr>
                    <h2>Bình luận của sản phẩm</h2>
                    <div>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người bình luận</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chitietkhachhang&id_khachhang=' . $binhLuan['tai_khoan_id'] ?>">
                                            <?= $binhLuan['hoten'] ?></a>
                                        </td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_bl'] ?></td>
                                        <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                        <td>
                                            <form action="<?= BASE_URL_ADMIN . '?act=updatetrangthaibinhluan&id_binhluan=' . $binhLuan['id'] ?>" method="post">
                                                <input type="hidden" name="id_binhluan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_sanpham">
           
                                                <button onclick="return confirm('Bạn có chắc muốn ẩn bình luận này không ?')" class="btn btn-warning">
                                                    <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

</html>