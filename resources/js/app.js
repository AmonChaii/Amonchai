/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// **** การแก้ไขสำหรับ Vue 3 ****
import { createApp } from 'vue'; // 1. นำเข้าฟังก์ชัน createApp

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// 2. สร้างอินสแตนซ์ของแอปพลิเคชัน Vue 3
const app = createApp({});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// 3. ลงทะเบียน Component (ใช้ app.component แทน Vue.component)
app.component(
    'example-component',
    require('./components/ExampleComponent.vue').default
);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => app.component(key.split('/').pop().split('.')[0], files(key).default))


// 4. เชื่อมแอปพลิเคชันเข้ากับ DOM
app.mount('#app');