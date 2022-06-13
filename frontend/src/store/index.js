import { computed, ref } from "vue";
import Pusher from "pusher-js";
import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    SuccessAlert: false,
    user: {
      id: "",
      FirstName: "",
      LastName: "",
      Email: "",
      Password: "",
      PhoneNumber: "",
      City: "",
      ProfilePic: "",
    },
    id: localStorage.getItem("user_id"),
    Connected: false,
    notifications:  [],
    notificationDb: [],
    newNotification: false,
  },
  getters: {
    successAlert: (state) => state.SuccessAlert,
    notificationDb (state) { return state.notifications }
  },
  mutations: {
    setSuccessAlert(state, payload) {
      state.SuccessAlert = payload;
      // console.log("im commit success alert" + state.SuccessAlert);
    },
    setnotifications(state, payload) {
      state.notifications.push(payload);
    },
    setnotificationDb(state, payload) {
      state.notificationDb.push(payload);
    },
    showDotNotification(state, payload) {
      state.newNotification = payload;
    },
  },
  actions: {
    getuser() {
      axios
        .get(
          `http://localhost/fil-rouge-find-pet/UserController/getUser?id=` +
            state.id
        )
        .then((res) => {
          state.user = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    ConnectPusher({ commit }) {
      Pusher.logToConsole = true;
      let pusher = new Pusher("a69b81e700aaa217eaf4", {
        cluster: "eu",
      });
      let resultO = ref([]);
      let Anwser = computed(() => {
        return resultO.value;
      });

      const id = localStorage.getItem("user_id");
      let channel = pusher.subscribe("my-channel-" + id);

      channel.bind("my-event", function (data) {
        let result1 = JSON.stringify(data);
        let result = JSON.parse(result1);
        resultO.value = result;
        commit("setnotifications", result);
        if (data !== null) {
          commit("showDotNotification", true);
        }
      });
    },
    getNotifications({ commit, state }) {
      axios
        .get(
          "http://localhost/fil-rouge-find-pet/NotificationController/getNotification?user_id=" +
            state.id
        )
        .then((response) => {
          // console.log(response.data);
          commit("setnotificationDb", response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  modules: {},
});
