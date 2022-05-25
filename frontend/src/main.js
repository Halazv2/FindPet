import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./index.css";
import "flowbite";
import AOS from "aos";
import "aos/dist/aos.css";
AOS.init();

import "firebase/firestore";
import "firebase/storage";
import "firebase/auth";




// import { getFirestore } from "firebase/firestore";
import { initializeApp } from "@firebase/app";

const firebaseConfig = {
  apiKey: "AIzaSyAUh4KsKgmG0zzA_eRjh7bzj5gt6r7aXkE",
  authDomain: "findpet-61c40.firebaseapp.com",
  projectId: "findpet-61c40",
  storageBucket: "findpet-61c40.appspot.com",
  messagingSenderId: "1095345984177",
  appId: "1:1095345984177:web:12e77ca64cbaa685d08890",
  measurementId: "G-48XKLBX8N6",
};

initializeApp(firebaseConfig);
createApp(App).use(store).use(router).mount("#app");
