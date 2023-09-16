import { createRouter, createWebHistory } from "vue-router";

import Home from "@/Url/pages/index.vue";
import AddUrl from "@/Url/pages/add.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "Home",
      component: () => Home,
    },
    {
      path: "/add",
      name: "add-url",
      component: () => AddUrl,
    },
  ],
});

export default router;