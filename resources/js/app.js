import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import MonitorComponent from './components/Monitor.vue';
import HomeComponent from './components/Home.vue';

// Define las rutas de la aplicación
const routes = [
    {
        path: '/visualizar',
        component: MonitorComponent
    },
    {
        path: '/',
        component: HomeComponent,
    }
];

// Crea una instancia de Vue Router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Crea la instancia de la aplicación Vue
const app = createApp({});
app.use(router);
app.mount('#app');
