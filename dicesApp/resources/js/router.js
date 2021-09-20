import { createRouter, createWebHistory } from 'vue-router';

import DashboardComponent from './components/DashboardComponent';
import LoginComponent from './components/LoginComponent';
import RegisterComponent from './components/RegisterComponent';

const routeInfos = [
    {
        path: '/',
        name: 'dashboard',
        component: DashboardComponent,
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent,
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterComponent,
    }
]

const router = createRouter ({
    history: createWebHistory(),
    routes: routeInfos,
});

export default router;