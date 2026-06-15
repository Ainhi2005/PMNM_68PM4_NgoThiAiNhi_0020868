<?php
require_once '../app/core/DB.php';
class lophocModel
{
    private $conn;
    public function __construct()
    {
        $db = new ConnectDB();
        $this->conn = $db->connect();
    }

    public function getTotalLopHoc($search = '')
    {
        $query = "SELECT COUNT(*) as total FROM tbl_lophoc";
        if ($search != '') {
            $query .= " WHERE malop LIKE :search OR tenlop LIKE :search";
        }
        $stmt = $this->conn->prepare($query);
        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function paging($limit = 10, $offset = 0, $search = '')
    {
        $query = "SELECT * FROM tbl_lophoc";
        if ($search != '') {
            $query .= " WHERE malop LIKE :search OR tenlop LIKE :search";
        }
        $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLopHocById($id)
    {
        $query = "SELECT * FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertLopHoc($malop, $tenlop, $ghichu)
    {
        $query = "INSERT INTO tbl_lophoc (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    public function updateLopHoc($id, $malop, $tenlop, $ghichu)
    {
        $query = "UPDATE tbl_lophoc SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':malop', $malop);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':ghichu', $ghichu);
        return $stmt->execute();
    }

    public function deleteLopHoc($id)
    {
        $query = "DELETE FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function getAllLopHoc()
    {
        $query = "SELECT * FROM tbl_lophoc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
