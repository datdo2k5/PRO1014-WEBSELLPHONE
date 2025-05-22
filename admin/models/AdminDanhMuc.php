<?php
class AdminDanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danhmuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function insertDanhMuc($ten_loai, $mota)
    {
        try {
            $sql = "INSERT INTO danhmuc(ten_loai, mota)
            VALUES (:ten_loai, :mota)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_loai' => $ten_loai,
                ':mota' => $mota
            ]);

            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailDanhMuc($id)
    {
        try {
            $sql = "SELECT * FROM danhmuc WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    
    public function updateDanhMuc($id,$ten_loai, $mota)
    {
        try {
            $sql = "UPDATE danhmuc SET ten_loai = :ten_loai, mota = :mota WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_loai' => $ten_loai,
                ':mota' => $mota,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function destroyDanhMuc($id)
    {
        try {
            $sql = "DELETE FROM danhmuc WHERE id = :id";
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
