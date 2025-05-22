<?php 

class AdminSanPhamController {
    public $modelSanPham;
    public $modelDanhMuc;
    
    public function __construct() {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham() {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham(){
        //hàm này dùng để hiện thị form nhập
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
        deleteSessionError();
    }

    public function postAddSanPham(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_sp = $_POST['ten_sp'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $giam_gia = $_POST['giam_gia'] ?? '';
            $soluong = $_POST['soluong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh=$_FILES['hinh'] ?? null;

            //lưu hình ảnh vào
            $file_thumb = uploadFile($hinh, './uploads/');

            $img_array = $_FILES['img_array'];

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            
            if(empty($ten_sp)){
                $error['ten_sp'] = 'Bạn phải nhập tên sản phẩm';
            }

            if(empty($gia)){
                $error['gia'] = 'Bạn phải nhập giá sản phẩm';
            }

            if(empty($giam_gia)){
                $error['giam_gia'] = 'Bạn phải nhập giá khuyến mại sản phẩm';
            }

            if(empty($soluong)){
                $error['soluong'] = 'Bạn phải nhập số lượng của sản phẩm';
            }

            if(empty($ngay_nhap)){
                $error['ngay_nhap'] = 'Bạn phải nhập ngày nhập hàng của sản phẩm';
            }

            if(empty($danh_muc_id)){
                $error['danh_muc_id'] = 'Bạn phải nhập danh mục sản phẩm';
            }

            if(empty($trang_thai)){
                $error['trang_thai'] = 'Bạn phải nhập trạng thái sản phẩm';
            }

            if($hinh['error'] !== 0){
                $error['hinh'] = 'Phải chọn ảnh sản phẩm';
            }

            $_SESSION['error'] = $error;
            //var_dump($error);die();

            
            if(empty($error)){
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_sp,$gia,$giam_gia,$soluong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta, $file_thumb);
                //var_dump($san_pham_id);die();
                if(!empty($img_array['name'])){
                    foreach($img_array['name'] as $key => $value){
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhHinhAnh($san_pham_id, $link_hinh_anh);

                    }
                }
                header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
                exit();

            }else{
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . "?act=formthemsanpham");
                exit();
            }
            
        }
    }

    public function formEditSanPham(){
        //hàm này dùng để hiện thị form nhập
        //lấy ra thông tin danh mục cần sửa
        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if($sanPham){
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        }else{
            header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
            exit();
        }
    }

    public function postEditSanPham(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //truy vấn
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh'];
            

            $ten_sp = $_POST['ten_sp'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $giam_gia = $_POST['giam_gia'] ?? '';
            $soluong = $_POST['soluong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh=$_FILES['hinh'] ?? null;

            

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            
            if(empty($ten_sp)){
                $error['ten_sp'] = 'Bạn phải nhập tên sản phẩm';
            }

            if(empty($gia)){
                $error['gia'] = 'Bạn phải nhập giá sản phẩm';
            }

            if(empty($giam_gia)){
                $error['giam_gia'] = 'Bạn phải nhập giá khuyến mại sản phẩm';
            }

            if(empty($soluong)){
                $error['soluong'] = 'Bạn phải nhập số lượng của sản phẩm';
            }

            if(empty($ngay_nhap)){
                $error['ngay_nhap'] = 'Bạn phải nhập ngày nhập hàng của sản phẩm';
            }

            if(empty($danh_muc_id)){
                $error['danh_muc_id'] = 'Bạn phải nhập danh mục sản phẩm';
            }

            if(empty($trang_thai)){
                $error['trang_thai'] = 'Bạn phải nhập trạng thái sản phẩm';
            }

            

            $_SESSION['error'] = $error;
            
            //var_dump($error); die;
            if(isset($hinh) && $hinh['error'] == UPLOAD_ERR_OK){
                $new_file = uploadFile($hinh, './uploads/');
                if(!empty($old_file)){ //Nếu có ảnh thì xóa đi
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }
            
            if(empty($error)){
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten_sp,$gia,$giam_gia,$soluong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta, $new_file);

                header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
                exit();

            }else{
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=formsuasanpham&id_san_pham=' . $san_pham_id);
                exit();
            }
            
        }
    }

    public function postEditAnhSanPham() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
    
            // Lấy danh sách ảnh sản phẩm hiện tại
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
    
            // Xử lý các ảnh được gửi từ form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = isset($_POST['current_img_ids']) ? $_POST['current_img_ids'] : [];
    
            // Khai báo để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_files = [];
    
            // Upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_files[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file,
                        ];
                    }
                }
            }
    
            // Cập nhật ảnh hoặc thêm mới
            foreach ($upload_files as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
    
                    // Cập nhật ảnh cũ
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
    
                    // Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    // Thêm ảnh mới
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
    
            // Xử lý xóa ảnh
            foreach ($listAnhSanPhamCurrent as $anhSP) { 
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // Xóa ảnh
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
    
                    // Xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
    
            header("Location: " . BASE_URL_ADMIN . '?act=formsuasanpham&id_sanpham=' . $san_pham_id);
            exit();
        }
    }
    

    public function deleteSanPham(){
        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


        if($sanPham){
            deleteFile($sanPham['hinh']);
            $this->modelSanPham->destroySanPham($id);     
        }

        if($listAnhSanPham){
            foreach($listAnhSanPham as $key=>$anhSp){
                deleteFile($anhSp['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
            }
        }
        header("Location: " . BASE_URL_ADMIN . "?act=sanpham&status=success");
        exit();
    }

    public function detailSanPham(){
        //hàm này dùng để hiện thị form nhập
        //lấy ra thông tin danh mục cần sửa
        $id = $_GET['id_sanpham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if($sanPham){
            require_once './views/sanpham/detailSanPham.php';
            
        }else{
            header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
            exit();
        }
    }

}
?>