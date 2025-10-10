import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/home/Home.vue';
import Apply from "../components/apply/Apply.vue";
import NotFound from "../components/NotFound.vue";
import Player from "../components/player/Player.vue";
import Leaderboard from "../components/leaderboard/Leaderboard.vue";
import Blog from "../components/blog/Blog.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/apply', component: Apply },
    { path: '/:pathMatch(.*)*', component: NotFound },
    { path: '/player/:name', component: Player},
    { path: '/leaderboard', component: Leaderboard},
    { path: '/blog', component: Blog}
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
