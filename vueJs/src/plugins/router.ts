import { createRouter, createWebHistory } from "vue-router";

import Home from "@/Url/pages/index.vue";
import About from "@/Url/pages/about.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "Home",
      component: () => Home,
    },
    {
        path: "/about",
        name: "About",
        component: () => About,
      },
  ],
});

export default router;