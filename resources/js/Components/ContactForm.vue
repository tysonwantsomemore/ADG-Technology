<template>
    <div class="contact-form">
        <h3>Gửi yêu cầu tư vấn</h3>
        
        <div v-if="status === 'success'" class="alert alert-success">
            Cảm ơn bạn! Chúng tôi đã nhận được thông tin và sẽ liên hệ lại sớm nhất.
        </div>
        
        <div v-if="status === 'error'" class="alert alert-error">
            Đã có lỗi xảy ra. Vui lòng kiểm tra lại thông tin.
        </div>

        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label class="form-label">Họ và Tên</label>
                <input type="text" v-model="form.name" class="form-control" placeholder="Nhập tên của bạn" required>
                <span class="error-text" v-if="errors.name">{{ errors.name[0] }}</span>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" v-model="form.email" class="form-control" placeholder="Nhập email của bạn" required>
                <span class="error-text" v-if="errors.email">{{ errors.email[0] }}</span>
            </div>
            <div class="form-group">
                <label class="form-label">Số điện thoại</label>
                <input type="tel" v-model="form.phone" class="form-control" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label class="form-label">Ghi chú thêm</label>
                <textarea v-model="form.message" class="form-control" placeholder="Mô tả chi tiết yêu cầu của doanh nghiệp..." required></textarea>
                <span class="error-text" v-if="errors.message">{{ errors.message[0] }}</span>
            </div>
            <button type="submit" class="btn btn-primary" :disabled="loading" style="width: 100%;">
                <span v-if="loading">Đang gửi...</span>
                <span v-else>Gửi yêu cầu <i class="fa-solid fa-paper-plane"></i></span>
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import axios from 'axios';

const form = reactive({
    name: '',
    email: '',
    phone: '',
    message: ''
});

const errors = ref({});
const status = ref('');
const loading = ref(false);

const submitForm = async () => {
    loading.value = true;
    errors.value = {};
    status.value = '';
    
    try {
        const response = await axios.post('/api/contact', form);
        status.value = 'success';
        
        // Reset form
        form.name = '';
        form.email = '';
        form.phone = '';
        form.message = '';
    } catch (error) {
        status.value = 'error';
        if (error.response && error.response.data && error.response.data.errors) {
            errors.value = error.response.data.errors;
        }
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.contact-form {
    background: white; border-radius: 16px; padding: 40px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    color: var(--text-dark, #334155);
}
.contact-form h3 { margin-bottom: 24px; font-size: 1.5rem; color: var(--primary-color, #0f172a); }
.form-group { margin-bottom: 20px; }
.form-label { display: block; font-weight: 500; margin-bottom: 8px; font-size: 0.9rem; }
.form-control {
    width: 100%; padding: 14px 16px; border: 1px solid var(--border-color, #e2e8f0); border-radius: 8px;
    font-family: inherit; font-size: 1rem; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
    background: var(--bg-light, #f8fafc);
}
.form-control:focus { 
    outline: none; border-color: var(--accent-color, #3b82f6); background: white; 
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1); 
}
textarea.form-control { resize: vertical; min-height: 120px; }

.btn-primary {
    background: linear-gradient(135deg, var(--accent-color, #3b82f6), #2563eb);
    color: white;
    border: none;
    padding: 14px 32px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
    display: inline-flex;
    justify-content: center;
    gap: 8px;
}
.btn-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}
.btn-primary:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.error-text {
    color: #ef4444;
    font-size: 0.8rem;
    margin-top: 4px;
    display: block;
}

.alert {
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 0.95rem;
}
.alert-success {
    background-color: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}
.alert-error {
    background-color: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}
</style>
