import store from "@/store";
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
      import(/* webpackChunkName: "about" */ "../views/Auth/AuthView.vue"),
  },
  {
    path: "/LoginAdmin",
    name: "LoginAdmin",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Auth/AdminAuthView.vue"),
  },
  {
    path: "/Role",
    name: "Role",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Auth/UserOrAdmin.vue"),
  },
  {
    path: "/profile",
    name: "ProfileView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/ProfileView.vue"),
  },
  {
    path: "/events",
    name: "EventsView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/EventsView.vue"),
  },
  {
    path: "/feed",
    name: "FeedView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/FeedView.vue"),
  },
  {
    path: "/Not404",
    name: "NotFoundView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/NotFound.vue"),
  },
  {
    path: "/admin/dashboard",
    name: "Dashboard",
    component: () =>
      import(
        /* webpackChunkName: "about" */ "../views/Admin/DashboardView.vue"
      ),
  },
  {
    path: "/admin/EventAdmin",
    name: "EventAdmin",
    component: () =>
      import(
        /* webpackChunkName: "about" */ "../views/Admin/EventAdminView.vue"
      ),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from) => {
  //check if user is logged in to connect to pusher
  if(localStorage.getItem('user_id')){
    store.dispatch('ConnectPusher');
  }
  if (
    to.name === "ProfileView" ||
    to.name === "FeedView" ||
    to.name === "EventsView"
  ) {
    if (!localStorage.getItem("Role")) {
      router.push("/Login");
    }
  }
  if (to.name === "Login" || to.name === "Register" || to.name === "Role") {
    if (localStorage.getItem("Role")) {
      router.push("/");
    }
  }
  if (to.name === "Dashboard") {
    if (localStorage.getItem("Role") !== "Admin") {
      router.push("/");
    }
  }
});
export default router;
