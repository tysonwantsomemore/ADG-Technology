<template>
    <header class="header">
        <div class="container nav-container">
            <a href="/" class="logo">
                <i class="fa-solid fa-server"></i> ADG<span>Tech</span>
            </a>
            <nav class="nav-links">
                <a href="#home">Trang chủ</a>
                <a href="#about">Về chúng tôi</a>
                <a href="#products">Sản phẩm</a>
                <a href="#services">Dịch vụ</a>
                <a href="#contact">Liên hệ</a>
            </nav>
            <i class="fa-solid fa-bars mobile-menu-btn"></i>
        </div>
    </header>
</template>

<script setup>
// Navbar logic here if needed
</script>

<style scoped>
.header {
    position: fixed;
    top: 0; left: 0; right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--border-color, #e2e8f0);
    z-index: 1000;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 80px;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}
.logo {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--primary-color, #0f172a);
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}
.logo i { color: var(--accent-color, #3b82f6); }
.logo span { color: var(--text-dark, #334155); }

.nav-links { display: flex; gap: 32px; }
.nav-links a { 
    font-weight: 500; 
    font-size: 0.95rem; 
    position: relative; 
    text-decoration: none;
    color: var(--text-dark, #334155);
}
.nav-links a::after {
    content: ''; position: absolute; width: 0; height: 2px;
    bottom: -4px; left: 0; background-color: var(--accent-color, #3b82f6);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.nav-links a:hover::after { width: 100%; }
.mobile-menu-btn { display: none; font-size: 1.5rem; cursor: pointer; color: var(--primary-color, #0f172a); }

@media (max-width: 768px) {
    .nav-links { display: none; }
    .mobile-menu-btn { display: block; }
}
</style>
