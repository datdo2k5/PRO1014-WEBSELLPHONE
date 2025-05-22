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
                <div class="col-6">
                    <img src="<?= BASE_URL . $khachHang['hinh'] ?>" style="width:75%" alt=""
                        onerror="this.onerror=null; this.src='https://pluspng.com/img-png/user-png-icon-download-icons-logos-emojis-users-2240.png';">

                </div>
                <div class="col-6">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-size: large;">
                                <tr>
                                    <th>Họ tên:</th>
                                    <td><?= $khachHang['hoten'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Giới tính:</th>
                                    <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                </tr>

                                <tr>
                                    <th>Ngày sinh:
                                    <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Email:</th>
                                    <td><?= $khachHang['email'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?= $khachHang['dienthoai'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?= $khachHang['diachi'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Trạng thái:</th>
                                    <td><?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    <h2>Lịch sử mua hàng</h2>
                    <div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listDonHang as $key => $donHang): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= $donHang['tong_tien'] ?></td>
                                        <td><?= $donHang['ten_trang_thai'] ?></td>


                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= BASE_URL_ADMIN . '?act=chitietdonhang&id_donhang=' . $donHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                </a>

                                                <a href="<?= BASE_URL_ADMIN . '?act=formsuadonhang&id_donhang=' . $donHang['id'] ?>">
                                                    <button class="btn btn-warning"><i class="far fa-edit"></i></button>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <h2>Lịch sử bình luận khách hàng</h2>
                    <div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm</th>
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
                                            <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chitietsanpham&id_sanpham=' . $binhLuan['san_pham_id'] ?>">
                                                <?= $binhLuan['ten_sp'] ?></a>
                                        </td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_bl'] ?></td>
                                        <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                        <td>
                                            <form action="<?= BASE_URL_ADMIN . '?act=updatetrangthaibinhluan&id_binhluan=' . $binhLuan['id'] ?>" method="post">
                                                <input type="hidden" name="id_binhluan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_khach">
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>
</body>

</html>