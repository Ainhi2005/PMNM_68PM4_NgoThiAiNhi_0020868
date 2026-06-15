<?php
require_once '../app/models/lophocModel.php';
require_once '../app/core/Controller.php';

class lophoc extends Controller
{
    public function index()
    {
        $lophocModel = $this->model('lophocModel');

        // Lấy từ khóa tìm kiếm
        $search = $_GET['search'] ?? '';

        // Lấy số lượng trên mỗi trang
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
        if ($limit < 1) $limit = 10;

        // Lấy trang hiện tại từ URL
        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];
        } else {
            $queryStr = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            if ($queryStr) {
                parse_str($queryStr, $params);
                if (isset($params['page'])) {
                    $currentPage = (int) $params['page'];
                }
            }
        }
        if ($currentPage < 1) $currentPage = 1;

        // Tính toán offset
        $offset = ($currentPage - 1) * $limit;

        // Lấy dữ liệu lớp học có phân trang và tìm kiếm
        $lophoc = $lophocModel->paging($limit, $offset, $search);

        // Tính tổng số trang
        $totalRecords = $lophocModel->getTotalLopHoc($search);
        $totalPages = ceil($totalRecords / $limit);

        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/index",
            "lophoc" => $lophoc,
            "title" => "Danh sách lớp học",
            "currentPage" => $currentPage,
            "totalPages" => $totalPages,
            "totalRecords" => $totalRecords,
            "limit" => $limit,
            "search" => $search
        ]);
    }

    public function create()
    {
        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/create",
            "title" => "Thêm lớp học mới"
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $malop = $_POST['malop'] ?? '';
            $tenlop = $_POST['tenlop'] ?? '';
            $ghichu = $_POST['ghichu'] ?? '';

            $lophocModel = $this->model('lophocModel');
            $lophocModel->insertLopHoc($malop, $tenlop, $ghichu);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc');
        exit;
    }

    public function edit($id = null)
    {
        if (!$id) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc');
            exit;
        }
        $lophocModel = $this->model('lophocModel');
        $lophoc = $lophocModel->getLopHocById($id);

        if (!$lophoc) {
            header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc');
            exit;
        }

        $this->view("layout/masterlayout", [
            "viewname" => "lophoc/edit",
            "lophoc" => $lophoc,
            "title" => "Sửa thông tin lớp học"
        ]);
    }

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id) {
            $malop = $_POST['malop'] ?? '';
            $tenlop = $_POST['tenlop'] ?? '';
            $ghichu = $_POST['ghichu'] ?? '';

            $lophocModel = $this->model('lophocModel');
            $lophocModel->updateLopHoc($id, $malop, $tenlop, $ghichu);
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc');
        exit;
    }

    public function delete($id = null)
    {
        if ($id) {
            $lophocModel = $this->model('lophocModel');
            try {
                $lophocModel->deleteLopHoc($id);
                header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc?msg=success');
            } catch (PDOException $e) {
                // Lỗi 23000 là do vi phạm khóa ngoại (Foreign Key Constraint)
                if ($e->getCode() == 23000) {
                    header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc?error=constraint');
                } else {
                    header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc?error=unknown');
                }
            }
            exit;
        }
        header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc');
        exit;
    }
}
?>
