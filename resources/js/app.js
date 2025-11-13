/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// import { createApp } from 'vue'; // Bạn có thể bỏ qua phần Vue nếu không dùng

/**
 * Next, we will create a new Vue application instance. You may skip this
 * step if you do not need Vue present in your project.
 */

// const app = createApp({});
// 
// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);
// 
// app.mount('#app');


/**
 * ======================================================================
 * PHẦN QUAN TRỌNG NHẤT:
 * Dòng này nạp tất cả JavaScript của Bootstrap (cho dropdown, modal, toast...).
 * Code AJAX của bạn cần dòng này để chạy đúng.
 * ======================================================================
 */

import * as bootstrap from 'bootstrap';

// ===== THÊM 2 DÒNG NÀY VÀO CUỐI FILE =====
import.meta.glob(['../images/**']);
window.bootstrap = bootstrap; // <-- Dòng này làm cho 'bootstrap' trở nên toàn cục