import { createStore } from "vuex";

export default createStore({
  state: {
    SuccessAlert: false,
  },
  getters: {
    SuccessAlert: (state) => state.SuccessAlert
  },
  mutations: {
    setSuccessAlert(state, payload) {
      state.SuccessAlert = payload;
      console.log(state.SuccessAlert);
    }
  },
  actions: {},
  modules: {},
});
