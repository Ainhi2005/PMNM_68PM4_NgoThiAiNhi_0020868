<h1><?php echo $title ?></h1>

<div class="card card-small">
    <h2 style="margin-top: 0; color: var(--primary-color); border-bottom: 2px solid var(--border-color); padding-bottom: 12px; margin-bottom: 24px; font-size: 1.5rem;">Thêm Lớp học Mới</h2>

    <form action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc/store" method="POST">
        <div class="form-group">
            <label class="form-label">Mã Lớp <span style="color: red;">*</span></label>
            <input type="text" name="malop" class="form-control" placeholder="Nhập mã lớp" required>
        </div>

        <div class="form-group">
            <label class="form-label">Tên Lớp <span style="color: red;">*</span></label>
            <input type="text" name="tenlop" class="form-control" placeholder="Nhập tên lớp" required>
        </div>

        <div class="form-group">
            <label class="form-label">Ghi chú</label>
            <textarea name="ghichu" class="form-control" rows="3" placeholder="Nhập ghi chú (nếu có)"></textarea>
        </div>

        <div style="margin-top: 32px; display: flex; gap: 12px;">
            <button type="submit" class="btn btn-success" style="flex: 1; padding: 12px;">Xác nhận Thêm mới</button>
            <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc" class="btn btn-outline" style="padding: 12px 24px;">Hủy bỏ</a>
        </div>
    </form>
</div>
