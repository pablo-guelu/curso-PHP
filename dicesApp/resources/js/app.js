require('./bootstrap');

import { createApp } from 'vue';
import DicesComponent from './components/DicesComponent';

createApp({
    components: {
        DicesComponent,
    }

}).mount('#app');