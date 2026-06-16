<?php
require_once '../app/core/DB.php';
class sinhvienModel
{
    private $conn;
    public function __construct()
    {
        $db = new ConnectDB();
        $this->conn = $db->connect();
    }
    public function getALLSinhVien()
    {
        $query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalSinhVien($search = '', $malop = '')
    {
        $query = "SELECT COUNT(*) as total FROM tbl_sinhvien WHERE 1=1";
        if ($search != '') {
            $query .= " AND (sinhvien LIKE :search OR mssv LIKE :search)";
        }
        if ($malop != '') {
            $query .= " AND malop = :malop";
        }
        $stmt = $this->conn->prepare($query);
        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        if ($malop != '') {
            $stmt->bindParam(':malop', $malop);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function paging($limit = 10, $offset = 0, $search = '', $malop = '', $sort_by = 'id', $sort_dir = 'DESC')
    {
        $query = "SELECT s.*, l.tenlop FROM tbl_sinhvien s LEFT JOIN tbl_lophoc l ON s.malop = l.malop WHERE 1=1";
        if ($search != '') {
            $query .= " AND (s.sinhvien LIKE :search OR s.mssv LIKE :search)";
        }
        if ($malop != '') {
            $query .= " AND s.malop = :malop";
        }

        $valid_sort_columns = ['id', 'sinhvien', 'mssv'];
        $sort_by = in_array($sort_by, $valid_sort_columns) ? $sort_by : 'id';
        $sort_dir = strtoupper($sort_dir) === 'ASC' ? 'ASC' : 'DESC';

        $query .= " ORDER BY s.$sort_by $sort_dir LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam);
        }
        if ($malop != '') {
            $stmt->bindParam(':malop', $malop);
        }
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getSinhVienById($id)
    {
        $query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSinhVien($id, $sinhvien, $giotinh, $mssv, $malop)
    {
        $query = "UPDATE tbl_sinhvien SET sinhvien = :sinhvien, giotinh = :giotinh, mssv = :mssv, malop = :malop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':sinhvien', $sinhvien);
        $stmt->bindParam(':giotinh', $giotinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop);
        return $stmt->execute();
    }

    public function deleteSinhVien($id)
    {
        $query = "DELETE FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function insertSinhVien($sinhvien, $giotinh, $mssv, $malop)
    {
        $query = "INSERT INTO tbl_sinhvien (sinhvien, giotinh, mssv, malop) VALUES (:sinhvien, :giotinh, :mssv, :malop)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':sinhvien', $sinhvien);
        $stmt->bindParam(':giotinh', $giotinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop);
        return $stmt->execute();
    }
}
?>