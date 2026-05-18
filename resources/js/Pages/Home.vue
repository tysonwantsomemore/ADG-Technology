<template>
    <div class="app-wrapper">
        <Navbar />

        <!-- Hero Banner -->
        <section id="home" class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Nền tảng IT vững chắc cho <span>doanh nghiệp tương lai</span></h1>
                    <p>Chúng tôi cung cấp các giải pháp phần cứng CNTT, máy chủ, lưu trữ và hạ tầng mạng toàn diện, giúp tối ưu hóa hiệu suất và bảo mật cho doanh nghiệp của bạn.</p>
                    <div class="hero-btns">
                        <a href="#contact" class="btn btn-primary">Nhận tư vấn ngay <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="#products" class="btn btn-outline">Xem sản phẩm</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us -->
        <section id="about" class="about">
            <div class="container about-grid">
                <div class="about-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800" alt="ADG Technology Data Center" class="about-img">
                </div>
                <div class="about-text">
                    <h2>Đối tác tin cậy trong quá trình chuyển đổi số</h2>
                    <p><strong>ADG Technology</strong> là đơn vị hàng đầu chuyên cung cấp giải pháp phần cứng toàn diện. Với hơn 10 năm kinh nghiệm, chúng tôi cam kết mang đến những thiết bị công nghệ tiên tiến nhất từ các thương hiệu toàn cầu.</p>
                    <p>Chúng tôi không chỉ bán thiết bị, mà còn đồng hành cùng sự phát triển của doanh nghiệp thông qua dịch vụ tư vấn sâu sát và hỗ trợ kỹ thuật chuyên nghiệp 24/7.</p>
                    <ul class="features-list">
                        <li><i class="fa-solid fa-check"></i> Đội ngũ chuyên gia CNTT giàu kinh nghiệm</li>
                        <li><i class="fa-solid fa-check"></i> Phân phối chính hãng 100%</li>
                        <li><i class="fa-solid fa-check"></i> Cam kết hỗ trợ kỹ thuật trọn đời</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Products Category -->
        <section id="products" class="products">
            <div class="container">
                <h2 class="section-title">Danh Mục Sản Phẩm</h2>
                <p class="section-subtitle">Khám phá dải sản phẩm phần cứng đa dạng, đáp ứng mọi quy mô và nhu cầu khắt khe nhất của hệ thống doanh nghiệp.</p>
                
                <div class="product-grid">
                    <ProductCard 
                        v-for="(product, index) in products" 
                        :key="index"
                        :title="product.title"
                        :description="product.description"
                        :icon="product.icon"
                    />
                </div>
            </div>
        </section>

        <!-- Partners Logo Strip -->
        <section class="partners">
            <div class="container">
                <div class="partner-logos">
                    <div class="partner-item"><i class="fa-brands fa-dell"></i> DELL</div>
                    <div class="partner-item"><i class="fa-solid fa-h"></i><i class="fa-solid fa-p"></i> Enterprise</div>
                    <div class="partner-item"><i class="fa-solid fa-chart-network"></i> CISCO</div>
                    <div class="partner-item"><i class="fa-solid fa-microchip"></i> INTEL</div>
                </div>
            </div>
        </section>

        <!-- Contact & Footer Section -->
        <section id="contact" class="contact-footer-wrap">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-info">
                        <h2>Bắt đầu tối ưu hạ tầng của bạn</h2>
                        <p>Hãy để các chuyên gia của ADG Technology giúp bạn xây dựng một hệ thống IT mạnh mẽ và linh hoạt. Để lại thông tin để nhận báo giá và tư vấn miễn phí.</p>
                        
                        <div class="info-card">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <h4>Trụ sở chính</h4>
                                <span>Tầng 12, Tòa nhà Tech Tower, Quận Cầu Giấy, Hà Nội</span>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <h4>Hotline hỗ trợ</h4>
                                <span>1900 8888 (24/7)</span>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <h4>Email liên hệ</h4>
                                <span>contact@adgtech.vn</span>
                            </div>
                        </div>
                    </div>
                    
                    <ContactForm />
                </div>
            </div>
            
            <Footer />
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
import ProductCard from '@/Components/ProductCard.vue';
import ContactForm from '@/Components/ContactForm.vue';

// Static products based on layout design, can be loaded from API
const products = ref([
    {
        title: 'Máy chủ & Lưu trữ',
        description: 'Hệ thống server mạnh mẽ, giải pháp SAN/NAS mở rộng linh hoạt, đảm bảo an toàn dữ liệu tuyệt đối.',
        icon: 'fa-solid fa-server'
    },
    {
        title: 'Thiết bị mạng & Bảo mật',
        description: 'Switch, Router, Firewall cấp doanh nghiệp mang lại đường truyền tốc độ cao và bảo vệ khỏi rủi ro an ninh.',
        icon: 'fa-solid fa-network-wired'
    },
    {
        title: 'PC Doanh nghiệp',
        description: 'Máy trạm (Workstation), PC đồng bộ bền bỉ và hiệu suất cao cho mọi vị trí công việc chuyên biệt.',
        icon: 'fa-solid fa-laptop-code'
    },
    {
        title: 'Linh kiện & Phụ kiện',
        description: 'CPU, RAM ECC, Ổ cứng Enterprise SSD/HDD chuyên dụng nâng cấp hệ thống hiện tại của bạn.',
        icon: 'fa-solid fa-microchip'
    }
]);

// Optionally fetch from backend API
onMounted(async () => {
    try {
        const response = await axios.get('/api/products');
        if(response.data && response.data.data && response.data.data.length > 0) {
            // Uncomment to use data from DB
            // products.value = response.data.data;
        }
    } catch (error) {
        console.error("Error fetching products", error);
    }
});
</script>

<style scoped>
/* Inject root variables scoped or globally. Usually global is better, 
   but added here for completeness based on original CSS */
.app-wrapper {
    --primary-color: #0f172a;
    --secondary-color: #1e293b;
    --accent-color: #3b82f6;
    --accent-glow: rgba(59, 130, 246, 0.4);
    --text-dark: #334155;
    --text-light: #94a3b8;
    --bg-light: #f8fafc;
    --bg-white: #ffffff;
    --border-color: #e2e8f0;
    
    font-family: 'Inter', sans-serif;
    color: var(--text-dark);
    background-color: var(--bg-white);
    line-height: 1.6;
}

.container { width: 100%; max-width: 1280px; margin: 0 auto; padding: 0 24px; }

h1, h2, h3, h4, h5, h6 { color: var(--primary-color); font-weight: 700; line-height: 1.2; }

.section-title { 
    text-align: center; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 800; letter-spacing: -0.02em;
}
.section-subtitle {
    text-align: center; color: var(--text-light); font-size: 1.125rem; max-width: 600px; margin: 0 auto 3.5rem;
}

/* Buttons */
.btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    padding: 14px 32px; border-radius: 8px; font-weight: 600; font-size: 1rem;
    cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none; text-decoration: none;
}
.btn-primary {
    background: linear-gradient(135deg, var(--accent-color), #2563eb); color: white;
    box-shadow: 0 4px 15px var(--accent-glow);
}
.btn-primary:hover {
    transform: translateY(-2px); box-shadow: 0 8px 25px var(--accent-glow);
}
.btn-outline {
    background: transparent; color: var(--bg-white); border: 2px solid var(--bg-white);
}
.btn-outline:hover {
    background: var(--bg-white); color: var(--primary-color);
}

/* Hero Banner */
.hero {
    padding: 160px 0 100px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white; position: relative; overflow: hidden; min-height: 80vh; display: flex; align-items: center;
}
.hero::before {
    content: ''; position: absolute; top: 0; right: 0; bottom: 0; left: 0;
    background: url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80') center/cover;
    opacity: 0.15; mix-blend-mode: overlay;
}
.hero::after {
    content: ''; position: absolute; width: 600px; height: 600px;
    background: radial-gradient(circle, var(--accent-glow) 0%, transparent 70%);
    top: -200px; right: -200px; border-radius: 50%;
}
.hero-content { position: relative; z-index: 10; max-width: 700px; }
.hero h1 { color: white; font-size: 4rem; letter-spacing: -0.03em; margin-bottom: 1.5rem; line-height: 1.1; }
.hero h1 span { color: var(--accent-color); }
.hero p { font-size: 1.25rem; color: #cbd5e1; margin-bottom: 2.5rem; font-weight: 300; }
.hero-btns { display: flex; gap: 16px; }

/* About Us */
.about { padding: 100px 0; background: var(--bg-white); }
.about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
.about-img-wrapper { position: relative; }
.about-img { width: 100%; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); transition: all 0.3s; }
.about-img:hover { transform: translateY(-5px); }
.about-text h2 { font-size: 2.5rem; margin-bottom: 1.5rem; }
.about-text p { font-size: 1.1rem; color: var(--text-light); margin-bottom: 1.5rem; }
.features-list { margin-top: 2rem; padding: 0; list-style: none; }
.features-list li { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-weight: 500; }
.features-list i { color: var(--accent-color); background: rgba(59, 130, 246, 0.1); padding: 8px; border-radius: 50%; }

/* Products Section */
.products { padding: 100px 0; background: var(--bg-light); }
.product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }

/* Partners Logo Strip */
.partners { padding: 50px 0; background: var(--bg-white); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); }
.partner-logos { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 60px; }
.partner-item { font-size: 2rem; font-weight: 800; color: #cbd5e1; transition: all 0.3s; display: flex; align-items: center; gap: 10px; cursor: pointer; }
.partner-item:hover { color: var(--primary-color); transform: scale(1.05); }

/* Contact & Footer Section */
.contact-footer-wrap { background: var(--primary-color); color: white; padding-top: 100px; position: relative; overflow: hidden; }
.contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 80px; }
.contact-info h2 { color: white; font-size: 2.5rem; margin-bottom: 1rem; }
.contact-info p { color: #94a3b8; margin-bottom: 2.5rem; font-size: 1.1rem; }
.info-card { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); padding: 24px; border-radius: 12px; margin-bottom: 16px; display: flex; align-items: center; gap: 20px; transition: all 0.3s; }
.info-card:hover { background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.2); }
.info-card i { font-size: 1.5rem; color: var(--accent-color); }
.info-card h4 { color: white; margin-bottom: 4px; font-size: 1.1rem; }
.info-card span { color: #94a3b8; font-size: 0.95rem; }

/* Responsive */
@media (max-width: 992px) {
    .hero h1 { font-size: 3rem; }
    .about-grid, .contact-grid { grid-template-columns: 1fr; gap: 40px; }
}
@media (max-width: 768px) {
    .hero { padding: 120px 0 60px; min-height: auto; text-align: center; }
    .hero h1 { font-size: 2.5rem; }
    .hero-btns { justify-content: center; flex-direction: column; }
    .section-title { font-size: 2rem; }
}
</style>
