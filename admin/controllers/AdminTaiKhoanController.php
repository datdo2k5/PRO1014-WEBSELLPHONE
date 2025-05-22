<?php 
class AdminTaiKhoanController{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();

    }

    public function danhSachQuanTri(){
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        //var_dump($listQuanTri);die();
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri(){
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }

    public function postAddQuanTri(){
            // Hàm này dùng để xử lý thêm dữ liệu
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
    
                //tạo 1 mảng trống để chứa dữ liệu
                $error = [];
                if(empty($hoten)){
                    $error['hoten'] = 'Bạn phải nhập tên quản trị';
                }

                if(empty($email)){
                    $error['email'] = 'Bạn phải nhập email quản trị';
                }

                $_SESSION['error'] = $error;
    
                //Nếu không có lỗi thì tiến hành thêm tài khoản
                if(empty($error)){
                    //nếu không có lỗi thì tiến hành thêm tài khoản
                    //password verify là giải mã mật khẩu
                    //password hash là mã hoá mật khẩu
                    //PASSWORD_BCRYPT là tham số mã hoá
                    $password = password_hash('123456', PASSWORD_BCRYPT);
                    //var_dump($password);die();
                    $role = 1;

                    $this->modelTaiKhoan->insertTaiKhoan($hoten, $email, $password, $role);
                    //var_dump($this);die();

                    

                    header("Location: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                    exit();
    
                }else{
                    //trả về form và lỗi
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN. "?act=formthemquantri");
                    exit();
                }
                
            }
    }


    public function formEditQuanTri(){
        $id_quantri = $_GET['id_quantri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quantri);
        //var_dump($quanTri);die();
        
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    public function postEditQuanTri(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $quantri_id = $_POST['quantri_id'] ?? '';
           
            $hoten = $_POST['hoten'] ?? '';
            $email = $_POST['email'] ?? '';
            $dienthoai = $_POST['dienthoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            
            if(empty($hoten)){
                $error['hoten'] = 'Bạn phải nhập tên quản trị';
            }

            if(empty($email)){
                $error['email'] = 'Bạn phải nhập email quản trị';
            }

            if(empty($dienthoai)){
                $error['dienthoai'] = 'Bạn phải nhập số điện thoại quản trị';
            }

            if(empty($trang_thai)){
                $error['trang_thai'] = 'Bạn phải nhập trạng thái quản trị';
            }
            

            $_SESSION['error'] = $error;
            //var_dump($error);die();
            
            
            if(empty($error)){
                $this->modelTaiKhoan->updateTaiKhoan($quantri_id, $hoten, $email, $dienthoai, $trang_thai);

                header("Location: " . BASE_URL_ADMIN . "?act=listtaikhoanquantri");
                exit();

            }else{
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=formsuaquantri&id_quantri=' . $quantri_id);
                exit();
            }
            
        }
    }

    public function deletePassword(){
        $tai_khoan_id = $_GET['id_quantri'];
        $tai_khoan = $this-> modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123456', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->deletePassword($tai_khoan_id, $password);
        //var_dump($status); die();
        if($status && $tai_khoan['role'] == 1){
            header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoanquantri');
            exit();
        }elseif($status && $tai_khoan['role'] == 0){
            header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoankhachhang');
            exit();
        }else{
            var_dump('Lỗi không xóa được tài khoản'); die();
        }
    }

    public function danhSachKhachHang(){
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(0);
        //var_dump($listQuanTri);die();
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang(){
        $id_khachhang = $_GET['id_khachhang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khachhang);
        //var_dump($quanTri);die();
        
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }

    public function postEditKhachHang(){
        // Hàm này dùng để xử lý thêm dữ liệu
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $khachhang_id = $_POST['khachhang_id'] ?? '';
           
            $hoten = $_POST['hoten'] ?? '';
            $email = $_POST['email'] ?? '';
            $dienthoai = $_POST['dienthoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $diachi = $_POST['diachi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            //tạo 1 mảng trống để chứa dữ liệu
            $error = [];
            
            if(empty($hoten)){
                $error['hoten'] = 'Bạn phải nhập tên khách hàng';
            }

            if(empty($email)){
                $error['email'] = 'Bạn phải nhập email khách hàng';
            }

            if(empty($dienthoai)){
                $error['dienthoai'] = 'Bạn phải nhập số điện thoại khách hàng';
            }

            if(empty($ngay_sinh)){
                $error['ngay_sinh'] = 'Bạn phải nhập ngày sinh khách hàng';
            }

            if(empty($gioi_tinh)){
                $error['gioi_tinh'] = 'Bạn phải chọn giới tính';
            }

            if(empty($diachi)){
                $error['diachi'] = 'Bạn phải nhập địa chỉ khách hàng';
            }

            if(empty($trang_thai)){
                $error['trang_thai'] = 'Bạn phải nhập trạng thái khách hàng';
            }
            

            $_SESSION['error'] = $error;
            //var_dump($error);die();
            
            
            if(empty($error)){
                $this->modelTaiKhoan->updateKhachHang($khachhang_id, $hoten, $email, $dienthoai, $ngay_sinh, $gioi_tinh, $diachi, $trang_thai);

                header("Location: " . BASE_URL_ADMIN . "?act=listtaikhoankhachhang");
                exit();

            }else{
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=formsuakhachhang&id_khachhang=' . $khachhang_id);
                exit();
            }
        }
    }

    public function detailKhachHang(){
        $id_khachhang = $_GET['id_khachhang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khachhang);

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khachhang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khachhang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';

        deleteSessionError();
    }

    public function formLogin(){
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lẤY email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($password);die;
            // xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            if($user == $email){     
                // trường hợp đăng nhập thành công
                // lưu thông tin cào session
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            }else{
                // neu loi thi luu loi vao session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit(); 
            }
        }
    }
    public function logout(){
        if (isset($_SESSION['user_admin'])){
            unset($_SESSION['user_admin']);
            header("location: ". BASE_URL_ADMIN . '?act=login-admin');
        }
    }
}

?>