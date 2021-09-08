require('./bootstrap');
import { createApp } from 'vue';
import ShopComponent from './components/ShopComponent';
import StoresComponent from './components/StoresComponent';
import LoginComponent from './components/LoginComponent';
import RegisterComponent from './components/RegisterComponent';

createApp({
    components: {
        ShopComponent,
        StoresComponent,
        LoginComponent,
        RegisterComponent,
    }

}).mount('#app');