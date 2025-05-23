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
        <div class="col-sm-11">
          <h1>Sửa thông tin sản phẩm: <?= $sanPham['ten_sp'] ?></h1>
        </div>
        <div class="col-sm-1">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">Cancel</a>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <form action="<?= BASE_URL_ADMIN . '?act=suasanpham' ?>" method="post" enctype="multipart/form-data">

            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_sp">Tên sản phẩm</label>
                <input type="text" id="ten_sp" name="ten_sp" class="form-control" value="<?= $sanPham['ten_sp']; ?>"></input>
                <?php if (isset($_SESSION['error']['ten_sp'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ten_sp'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="gia">Giá sản phẩm</label>
                <input type="text" id="gia" name="gia" class="form-control" value="<?= $sanPham['gia']; ?>"></input>
                <?php if (isset($_SESSION['error']['gia'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="giam_gia">Giá khuyến mại</label>
                <input type="text" id="giam_gia" name="giam_gia" class="form-control" value="<?= $sanPham['giam_gia']; ?>"></input>
                <?php if (isset($_SESSION['error']['giam_gia'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['giam_gia'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="hinh">Hình ảnh</label>
                <input type="file" id="hinh" name="hinh" class="form-control"></input>
              </div>

              <div class="form-group">
                <label for="soluong">Số lượng</label>
                <input type="number" id="soluong" name="soluong" class="form-control" value="<?= $sanPham['soluong']; ?>"></input>
                <?php if (isset($_SESSION['error']['soluong'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['soluong'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="ngay_nhap">Ngày nhập</label>
                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap']; ?>"></input>
                <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Danh mục sản phẩm</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id']; ?>"><?= $danhMuc['ten_loai']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="trang_thai">Trạng thái sản phẩm</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                  <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng</option>
                </select>
              </div>


              <div class="form-group">
                <label for="mo_ta">Mô tả sản phẩm</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta']; ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
        </div>
        </form>

        <!-- /.card -->
      </div>

      <div class="col-md-4">
    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=suaalbumanhsanpham' ?>" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table id="faqs" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>File</th>
                                <th class="text-center">
                                    <button onclick="addfaqs();" type="button" class="badge badge-success">
                                        <i class="fa fa-plus"></i> THÊM MỚI
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                            <input type="hidden" id="img_delete" name="img_delete">
                            <?php foreach ($listAnhSanPham as $key => $value): ?>
                                <tr id="faqs-row-<?= $key ?>">
                                    <input type="hidden" name="current_img_ids[]" value="<?= $value['id']; ?>">
                                    <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px" alt=""></td>
                                    <td><input type="file" name="img_array[]" class="form-control"></td>
                                    <td class="mt-10">
                                        <button class="badge badge-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
        </div>
    </div>
    <!-- /.card -->
</div>
</div>

    
    </form>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

<script>
    var faqs_row = <?= count($listAnhSanPham); ?>;

    function addfaqs() {
        var html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><img src="https://th.bing.com/th/id/OIP.K_53vg76iyG2ZoqyQZkMXAHaI3?w=153&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7" style="width: 50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row' + rowId).remove();
        if (imgId != null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>


</html>