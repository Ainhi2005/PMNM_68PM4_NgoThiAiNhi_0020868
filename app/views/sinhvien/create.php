<div class="card card-small">
    <h2 style="margin-top: 0; color: var(--primary-color); border-bottom: 2px solid var(--border-color); padding-bottom: 12px; margin-bottom: 24px; font-size: 1.5rem;">Thêm Sinh Viên Mới</h2>

    <form action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien/store" method="POST">
        <div class="form-group">
            <label class="form-label">Họ và tên <span style="color: red;">*</span></label>
            <input type="text" name="sinhvien" class="form-control" placeholder="Nhập họ tên sinh viên" required>
        </div>

        <div class="form-group">
            <label class="form-label">Giới tính <span style="color: red;">*</span></label>
            <input type="text" name="giotinh" class="form-control" placeholder="Nam / Nữ" required>
        </div>

        <div class="form-group">
            <label class="form-label">Mã số Sinh viên (MSSV) <span style="color: red;">*</span></label>
            <input type="text" name="mssv" class="form-control" placeholder="Nhập MSSV" required>
        </div>

        <div class="form-group">
            <label class="form-label">Lớp học <span style="color: red;">*</span></label>
            <select name="malop" class="form-control" required>
                <option value="">-- Chọn lớp học --</option>
                <?php if (!empty($dsLopHoc)): ?>
                    <?php foreach ($dsLopHoc as $lh): ?>
                        <option value="<?php echo htmlspecialchars($lh['malop']); ?>">
                            <?php echo htmlspecialchars($lh['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div style="margin-top: 32px; display: flex; gap: 12px;">
            <button type="submit" class="btn btn-success" style="flex: 1; padding: 12px;">Xác nhận Thêm mới</button>
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien" class="btn btn-outline" style="padding: 12px 24px;">Hủy bỏ</a>
        </div>
    </form>
</div>