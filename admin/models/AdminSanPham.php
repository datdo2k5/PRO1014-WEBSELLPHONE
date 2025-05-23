<?php
class AdminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
            FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_sp,$gia,$giam_gia,$soluong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta, $hinh)
    {
        try {
            $sql = "INSERT INTO sanpham(ten_sp,gia,giam_gia,soluong,ngay_nhap,danh_muc_id,trang_thai, mo_ta, hinh)
            VALUES (:ten_sp,:gia,:giam_gia,:soluong,:ngay_nhap,:danh_muc_id,:trang_thai, :mo_ta, :hinh)";

            $stmt = $this->conn->prepare($sql);
            //var_dump($stmt);die();

            $stmt->execute([
                ':ten_sp' => $ten_sp ,
                ':gia' => $gia ,
                ':giam_gia' => $giam_gia,
                ':soluong' => $soluong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh' => $hinh,
                
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function insertAlbumAnhHinhAnh($san_pham_id,$link_hinh_anh)
    {
        try {
            $sql = "INSERT INTO hinh_anh_san_pham(san_pham_id,link_hinh_anh)
            VALUES (:san_pham_id,:link_hinh_anh)";
            

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT sanpham.*, danhmuc.ten_loai 
            FROM sanpham INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
            WHERE sanpham.id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id){
        try {
            $sql = "SELECT * FROM hinh_anh_san_pham WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function updateSanPham($san_pham_id, $ten_sp,$gia,$giam_gia,$soluong,$ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta, $new_file){
        try{
            $sql = "UPDATE sanpham SET ten_sp = :ten_sp, gia = :gia, giam_gia = :giam_gia, soluong = :soluong, ngay_nhap = :ngay_nhap, danh_muc_id = :danh_muc_id, trang_thai = :trang_thai, mo_ta = :mo_ta";
            if($new_file!= ''){
                $sql.= ", hinh = :new_file";
            }
            $sql.= " WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':gia' => $gia,
                ':giam_gia' => $giam_gia,
                ':soluong' => $soluong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':san_pham_id' => $san_pham_id,
                ':new_file' => $new_file
            ]);
                return true;
        }catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailAnhSanPham($id){
        try {
            $sql = "SELECT * FROM hinh_anh_san_pham WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    public function updateAnhSanPham($id,$new_file){
        try {
            $sql = "UPDATE hinh_anh_san_pham SET 
            link_hinh_anh = :new_file 
            WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function destroyAnhSanPham($id){
        try {
            $sql = "DELETE FROM hinh_anh_san_pham WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh){
        try{
            $sql = "INSERT INTO hinh_anh_san_pham (san_pham_id,link_hinh_anh) VALUES (:san_pham_id,:link_hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);
            return true;
        }catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function destroySanPham($id){
        try {
            $sql = "DELETE FROM sanpham WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

}
