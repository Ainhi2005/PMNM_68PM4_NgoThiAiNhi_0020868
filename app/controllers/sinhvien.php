<?php
require_once '../app/models/sinhvienModel.php';
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
    public function index()
    {
        $sinhvienModel = $this->model('sinhvienModel');
        // Import lophocModel to get the list of classes for the filter
        require_once '../app/models/lophocModel.php';
        $lophocModel = new lophocModel();
        $dsLopHoc = $lophocModel->getAllLopHoc();

        // 1. Lấy tham số tìm kiếm và lọc
        $search = $_GET['search'] ?? '';
        $malop = $_GET['malop'] ?? '';
        $sort_by = $_GET['sort_by'] ?? 'id';
        $sort_dir = $_GET['sort_dir'] ?? 'DESC';

        // 2. Lấy số lượng trên mỗi trang
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
        if ($limit < 1) $limit = 10;

        // 3. Lấy trang hiện tại từ URL (mặc định là trang 1)
        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];
        } else {
            // Dự phòng: Tự bóc tách tham số page từ REQUEST_URI (trường hợp .htaccess nuốt mất $_GET)
            $queryStr = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            if ($queryStr) {
                parse_str($queryStr, $params);
                if (isset($params['page'])) {
                    $currentPage = (int) $params['page'];
                }
            }
        }
        if ($currentPage < 1) $currentPage = 1;

        // 4. Tính toán offset
        $offset = ($currentPage - 1) * $limit;

        // 5. Lấy dữ liệu sinh viên có phân trang
        $sinhvien = $sinhvienModel->paging($limit, $offset, $search, $malop, $sort_by, $sort_dir);

        // 6. Lấy tổng số sinh viên để tính tổng số trang
        $totalRecords = $sinhvienModel->getTotalSinhVien($search, $malop);
        $totalPages = ceil($totalRecords / $limit);

        // 7. Trả dữ liệu sang view
        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/index",
            "sinhvien" => $sinhvien,
            "title" => "Danh sách sinh viên",
            "currentPage" => $currentPage,
            "totalPages" => $totalPages,
            "totalRecords" => $totalRecords,
            "limit" => $limit,
            "search" => $search,
            "malop" => $malop,
            "sort_by" => $sort_by,
            "sort_dir" => $sort_dir,
            "dsLopHoc" => $dsLopHoc
        ]);
    }
    public function create()
    {
        require_once '../app/models/lophocModel.php';
        $lophocModel = new lophocModel();
        $dsLopHoc = $lophocModel->getAllLopHoc();

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/create",
            "title" => "Thêm thông tin sinh viên",
            "dsLopHoc" => $dsLopHoc
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sinhvien = $_POST['sinhvien'] ?? '';
            $giotinh = $_POST['giotinh'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->insertSinhVien($sinhvien, $giotinh, $mssv, $malop);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }

    public function edit($id = null)
    {
        if (!$id) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
            exit;
        }
        $sinhvienModel = $this->model('sinhvienModel');
        $student = $sinhvienModel->getSinhVienById($id);

        if (!$student) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
            exit;
        }

        require_once '../app/models/lophocModel.php';
        $lophocModel = new lophocModel();
        $dsLopHoc = $lophocModel->getAllLopHoc();

        $this->view("layout/masterlayout", [
            "viewname" => "sinhvien/edit",
            "student" => $student,
            "title" => "Sửa thông tin sinh viên",
            "dsLopHoc" => $dsLopHoc
        ]);
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id) {
            $sinhvien = $_POST['sinhvien'] ?? '';
            $giotinh = $_POST['giotinh'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->updateSinhVien($id, $sinhvien, $giotinh, $mssv, $malop);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }

    public function delete($id = null)
    {
        if ($id) {
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->deleteSinhVien($id);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien');
        exit;
    }
}
?>