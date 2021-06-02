import ChuckNorris from './components/ChuckNorris.vue';
import Index from './components/Index.vue';
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Index,
    },
    {
        name: 'chuckNorris',
        path: '/chuckNorris/:name/:path',
        component: ChuckNorris,
    },
];