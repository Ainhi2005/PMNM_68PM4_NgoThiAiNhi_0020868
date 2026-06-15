<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f8f9fa; }
    .modern-header {
        background: #cad8e6ff;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 0;
        z-index: 50;
        border-bottom: 1px solid var(--border-color);
    }
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        height: 64px;
    }
    .brand {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-color);
        text-decoration: none;
        letter-spacing: -0.025em;
    }
    .nav-links {
        display: flex;
        gap: 24px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .nav-link {
        color: var(--text-muted);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 8px 12px;
        border-radius: var(--radius-sm);
        transition: var(--transition);
    }
    .nav-link:hover {
        color: var(--primary-color);
        background-color: #f0fdf4; /* Light green/blue tint */
    }
    .nav-link.active {
        color: var(--primary-color);
        background-color: #eff6ff; /* Blue tint */
    }
    .logout-btn {
        color: var(--danger-color);
        font-weight: 500;
        text-decoration: none;
        padding: 6px 16px;
        border: 1px solid var(--danger-color);
        border-radius: var(--radius-md);
        transition: var(--transition);
    }
    .logout-btn:hover {
        background-color: var(--danger-color);
        color: white;
    }
</style>

<header class="modern-header">
    <div class="header-container">
        <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien" class="brand">QLSV</a>
        <ul class="nav-links">
            <li>
                <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/sinhvien" class="nav-link">
                    Quản lý Sinh viên
                </a>
            </li>
            <li>
                <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/lophoc" class="nav-link">
                    Quản lý Lớp học
                </a>
            </li>
            <li>
                <a href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/auth/logout" class="nav-link btn-logout">Đăng xuất</a>
            </li>
        </ul>
    </div>
</header>