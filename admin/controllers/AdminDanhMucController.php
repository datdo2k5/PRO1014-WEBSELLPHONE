<?php 

class AdminDanhMucController {
    public $modelDanhMuc;
    
    public function __construct() {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc() {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc(){
        //hàm này dùng để hiện thị form nhập
        require_once './views/danhmuc/addDanhMuc.php';

    }

    public function postAddDanhMuc(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_loai = $_POST['ten_loai'];
            $mota = $_POST['mota'];

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            if(empty($ten_loai)){
                $error['ten_loai'] = 'Bạn phải nhập tên danh mục';
            }

            //Nếu không có lỗi thì tiến hành thêm danh mục
            if(empty($error)){
                //nếu không có lỗi thì tiến hành thêm danh mục
                $this->modelDanhMuc->insertDanhMuc($ten_loai, $mota);
                header("Location: " . BASE_URL_ADMIN . "?act=danhmuc&status=add_success");
                exit();

            }else{
                //trả về form và lỗi
                require_once './views/danhmuc/addDanhMuc.php';
            }
            
        }
    }

    public function formEditDanhMuc(){
        //hàm này dùng để hiện thị form nhập
        //lấy ra thông tin danh mục cần sửa
        $id = $_GET['id_danhmuc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if($danhMuc){
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("Location: " . BASE_URL_ADMIN . "?act=danhmuc");
            exit();
        }
    }

    public function postEditDanhMuc(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $ten_loai = $_POST['ten_loai'];
            $mota = $_POST['mota'];

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            if(empty($ten_loai)){
                $error['ten_loai'] = 'Bạn phải nhập tên danh mục';
            }

            //Nếu không có lỗi thì tiến hành sửa danh mục
            if(empty($error)){
                //nếu không có lỗi thì tiến hành sửa danh mục
                $this->modelDanhMuc->updateDanhMuc($id, $ten_loai, $mota);
                header("Location: " . BASE_URL_ADMIN . "?act=danhmuc&status=update_success");
                exit();

            }else{
                //trả về form và lỗi
                $danhMuc = ['id' => $id, 
                            'ten_loai' => $ten_loai, 
                            'mota' => $mota
                        ];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc(){
        $id = $_GET['id_danhmuc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhMuc){
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header("Location: " . BASE_URL_ADMIN . "?act=danhmuc&status=success");
        exit();
    }
}
?>