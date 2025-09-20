import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/home/Home.vue';
import Screenshots from "../components/screenshots/Screenshots.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/screenshots', component: Screenshots }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
