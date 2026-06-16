<div class="card">
    <div class="action-bar">
        <h2 style="margin: 0; font-size: 1.25rem;">Danh sách Lớp học</h2>
        <div class="search-box">
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/create" class="btn btn-success">+ Thêm mới</a>
            
            <form method="GET" action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/index" style="display: flex; gap: 8px;">
                <input type="text" name="search" class="form-control" style="width: 250px;" placeholder="Tìm tên hoặc mã lớp..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
                <input type="hidden" name="limit" value="<?php echo htmlspecialchars($limit ?? 10); ?>">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'constraint'): ?>
        <script>
            alert("⚠️ Lỗi: Không thể xóa lớp học này!\n\nLớp học này hiện tại đang có sinh viên. Vui lòng chuyển các sinh viên sang lớp khác hoặc xóa các sinh viên này trước khi xóa lớp học.");
            // Xóa tham số error khỏi url để không hiện lại alert khi f5
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>

    <table class="modern-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($lophoc) > 0) {
            $startRecord = ($currentPage - 1) * $limit + 1;
            $endRecord = min($currentPage * $limit, $totalRecords);
            $stt = $startRecord;
            foreach ($lophoc as $lh) { ?>
            <tr>
                <td> <?php echo $stt++; ?> </td>
                <td> <?php echo htmlspecialchars($lh['malop']); ?> </td>
                <td> 
                    <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/index?malop=<?php echo urlencode($lh['malop']); ?>" title="Xem danh sách sinh viên" style="text-decoration: none; color: #007bff; font-weight: 500;">
                        <?php echo htmlspecialchars($lh['tenlop']); ?>
                    </a>
                </td>
                <td> <?php echo htmlspecialchars($lh['ghichu']); ?> </td>
                <td>
                    <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/edit/<?php echo $lh['id']; ?>" class="action-link edit">Sửa</a>
                    <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/delete/<?php echo $lh['id']; ?>" class="action-link delete" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?');">Xóa</a>
                </td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="5" style="text-align: center; color: var(--text-muted);">Không tìm thấy lớp học nào.</td></tr>
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
        <form method="GET" action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/index" class="limit-form">
            <input type="hidden" name="search" value="<?php echo htmlspecialchars($search ?? ''); ?>">
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
