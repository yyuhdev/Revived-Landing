import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/home/Home.vue';
import Apply from "../components/apply/Apply.vue";
import About from "../components/about/About.vue";
import NotFound from "../components/NotFound.vue";
import Player from "../components/player/Player.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/apply', component: Apply },
    { path: '/about', component: About },
    { path: '/:pathMatch(.*)*', component: NotFound },
    { path: '/player/:name', component: Player},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
