import { createStore } from "vuex";

export default createStore({
  state: {
    SuccessAlert: false,
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
  actions: {},
  modules: {},
});
