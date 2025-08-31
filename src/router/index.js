import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
    },
    {
      path: '/portfolioList',
      name: 'portfolioList',
      component: () => import('../views/PortfolioView.vue'),
    },
    {
      path: '/portfolioDetail/:id',
      name: 'portfolioDetail',
      props: true,
      component: () => import('../views/PortfolioDetailView.vue'),
    },
  ],
})

export default router
