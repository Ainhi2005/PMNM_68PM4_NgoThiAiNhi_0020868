<h1><?php echo $title ?></h1>

<div class="card card-small">
    <h2 style="margin-top: 0; color: var(--primary-color); border-bottom: 2px solid var(--border-color); padding-bottom: 12px; margin-bottom: 24px; font-size: 1.5rem;">Cập nhật Lớp học</h2>

    <form action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/update/<?php echo $lophoc['id']; ?>" method="POST">
        <div class="form-group">
            <label class="form-label">Mã Lớp <span style="color: red;">*</span></label>
            <input type="text" name="malop" class="form-control" value="<?php echo htmlspecialchars($lophoc['malop']); ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Tên Lớp <span style="color: red;">*</span></label>
            <input type="text" name="tenlop" class="form-control" value="<?php echo htmlspecialchars($lophoc['tenlop']); ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Ghi chú</label>
            <textarea name="ghichu" class="form-control" rows="3"><?php echo htmlspecialchars($lophoc['ghichu']); ?></textarea>
        </div>

        <div style="margin-top: 32px; display: flex; gap: 12px;">
            <button type="submit" class="btn btn-primary" style="flex: 1; padding: 12px;">Lưu thay đổi</button>
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc" class="btn btn-outline" style="padding: 12px 24px;">Hủy bỏ</a>
        </div>
    </form>
</div>
