import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
  {
    path: "/support",
    name: "support",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/SupportView.vue"),
  },
  {
    path: "/contactus",
    name: "contactus",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/ContactusView.vue"),
  },
  {
    path: "/Login",
    name: "Login",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AuthView.vue"),
  },
  {
    path: "/profile",
    name: "ProfileView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/ProfileView.vue"),
  },
  {
    path: "/Events",
    name: "EventsView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/EventsView.vue"),
  },
  {
    path: "/Feed",
    name: "FeedView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/FeedView.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from) => {
  //if user is not logged in and tries to access profile page
  if (to.name === "ProfileView" || to.name === "EventsView" || to.name === "FeedView" && !localStorage.getItem("user_id")
  ) {
    router.push("/Login");
  }
  //if user is logged in and tries to access login page
  if (to.name === "Login" && localStorage.getItem("user_id")) {
    //push to whatever page they were trying to access before
    // router.push(from.fullPath);
  }
});
export default router;
