<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<div class="card">
    <div class="action-bar">
        <h2 style="margin: 0; font-size: 1.25rem;">Danh sách sinh viên</h2>
        <div class="search-box">
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/create" class="btn btn-success">+ Thêm mới</a>
            
            <form method="GET" action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/index" style="display: flex; gap: 8px;">
                <select name="malop" class="form-control" style="width: auto;" onchange="this.form.submit()">
                    <option value="">-- Tất cả lớp học --</option>
                    <?php foreach ($dsLopHoc as $lh): ?>
                        <option value="<?php echo htmlspecialchars($lh['malop']); ?>" <?php echo (isset($malop) && $malop === $lh['malop']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lh['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="text" name="search" class="form-control" style="width: 250px;" placeholder="Tìm tên hoặc MSSV..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
                <input type="hidden" name="limit" value="<?php echo htmlspecialchars($limit ?? 10); ?>">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <table class="modern-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Lớp học</th>
                <th>MSSV</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($sinhvien) > 0) {
            $startRecord = ($currentPage - 1) * $limit + 1;
            $endRecord = min($currentPage * $limit, $totalRecords);
            $stt = $startRecord;
            foreach ($sinhvien as $sv) { ?>
            <tr>
                <td> <?php echo $stt++; ?> </td>
                <td> <?php echo htmlspecialchars($sv['sinhvien']); ?> </td>
                <td> <?php echo htmlspecialchars($sv['giotinh']); ?> </td>
                <td> <?php echo htmlspecialchars($sv['tenlop'] ?? $sv['malop']); ?> </td>
                <td> <?php echo htmlspecialchars($sv['mssv']); ?> </td>
                <td>
                    <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/edit/<?php echo $sv['id']; ?>" class="action-link edit">Sửa</a>
                    <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/delete/<?php echo $sv['id']; ?>" class="action-link delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">Xóa</a>
                </td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="6" style="text-align: center; color: var(--text-muted);">Không tìm thấy sinh viên nào.</td></tr>
        <?php } ?>
        </tbody>
    </table>

    <?php 
    if ($totalRecords > 0): 
        $startRecord = ($currentPage - 1) * $limit + 1;
        $endRecord = min($currentPage * $limit, $totalRecords);
    endif;
    ?>

    <div class="pagination-container">
        <form method="GET" action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/index" class="limit-form">
            <input type="hidden" name="search" value="<?php echo htmlspecialchars($search ?? ''); ?>">
            <input type="hidden" name="malop" value="<?php echo htmlspecialchars($malop ?? ''); ?>">
            <input type="number" name="limit" value="<?php echo htmlspecialchars($limit ?? 10); ?>" min="1" max="100" class="limit-input">
            <span>bản ghi/trang</span>
            <button type="submit" class="btn btn-outline" style="padding: 6px 12px;">OK</button>
        </form>

        <?php if ($totalRecords > 0): ?>
            <div class="pagination-info">
                Đang hiển thị <strong><?php echo $startRecord; ?></strong> đến <strong><?php echo $endRecord; ?></strong> trong tổng số <strong><?php echo $totalRecords; ?></strong>
            </div>
        <?php endif; ?>
    </div>

    <!-- Khối Phân Trang -->
    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div style="display: flex; justify-content: center; margin-top: 24px;">
            <div class="pagination-links">
                <?php 
                    $urlParts = parse_url($_SERVER['REQUEST_URI']);
                    $queryArr = [];
                    if(isset($urlParts['query'])) {
                        parse_str($urlParts['query'], $queryArr);
                    }
                ?>
                
                <?php if ($currentPage > 1): ?>
                    <?php $queryArr['page'] = $currentPage - 1; ?>
                    <a href="?<?php echo http_build_query($queryArr); ?>" class="page-link">&laquo;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php $queryArr['page'] = $i; ?>
                    <a href="?<?php echo http_build_query($queryArr); ?>" class="page-link <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <?php $queryArr['page'] = $currentPage + 1; ?>
                    <a href="?<?php echo http_build_query($queryArr); ?>" class="page-link">&raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>