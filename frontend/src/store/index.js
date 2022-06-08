import { computed, ref } from "vue";
import Pusher from "pusher-js";
import { createStore } from "vuex";

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
    answers: ref([]),
  },
  getters: {
    successAlert: (state) => state.SuccessAlert
  },
  mutations: {
    setSuccessAlert(state, payload) {
      state.SuccessAlert = payload;
      console.log('im commit success alert' + state.SuccessAlert);
    },
    setAnswers(state, payload) {
      state.answers.push(payload);
    }
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
    ConnectPusher({commit}) {
      Pusher.logToConsole = true;
      var pusher = new Pusher("a69b81e700aaa217eaf4", {
        cluster: "eu",
      });
      let resultO = ref([]);
      let Anwser = computed(() => {
        return resultO.value;
      });

      const id = localStorage.getItem("user_id");
      let channel = pusher.subscribe("my-channel-" + id);

      channel.bind("my-event", function (data) {
        var result1 = JSON.stringify(data);
        var result = JSON.parse(result1);
        resultO.value = result;
        commit("setAnswers", result);
      });
    },

  },
  modules: {},
});
