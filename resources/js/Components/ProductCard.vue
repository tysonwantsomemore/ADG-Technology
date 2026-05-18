<template>
    <div class="product-card">
        <div class="product-icon">
            <i :class="icon"></i>
        </div>
        <h3>{{ title }}</h3>
        <p>{{ description }}</p>
        <a href="#contact" class="product-link">Tìm hiểu thêm <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</template>

<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    icon: {
        type: String,
        default: 'fa-solid fa-server'
    }
});
</script>

<style scoped>
.product-card {
    background: var(--bg-white, #ffffff);
    border-radius: 16px;
    padding: 40px 30px;
    text-align: center;
    border: 1px solid var(--border-color, #e2e8f0);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}
.product-card::before {
    content: ''; position: absolute;
    top: 0; left: 0; width: 100%; height: 4px;
    background: var(--accent-color, #3b82f6);
    transform: scaleX(0); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); transform-origin: left;
}
.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
    border-color: transparent;
}
.product-card:hover::before { transform: scaleX(1); }
.product-icon {
    font-size: 3rem;
    color: var(--accent-color, #3b82f6);
    margin-bottom: 1.5rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.product-card:hover .product-icon { transform: scale(1.1); }
.product-card h3 { 
    font-size: 1.25rem; 
    margin-bottom: 1rem; 
    color: var(--primary-color, #0f172a);
}
.product-card p { 
    color: var(--text-light, #94a3b8); 
    font-size: 0.95rem; 
    margin-bottom: 1.5rem; 
}
.product-link { 
    color: var(--accent-color, #3b82f6); 
    font-weight: 600; 
    font-size: 0.9rem; 
    display: inline-flex; 
    align-items: center; 
    gap: 5px; 
    text-decoration: none;
}
.product-link:hover { gap: 10px; }
</style>
