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
  },
  getters: {
    successAlert: (state) => state.SuccessAlert
  },
  mutations: {
    setSuccessAlert(state, payload) {
      state.SuccessAlert = payload;
      console.log('im commit success alert' + state.SuccessAlert);
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

  },
  modules: {},
});
