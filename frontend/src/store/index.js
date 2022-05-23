import { createStore } from "vuex";

export default createStore({
  state: {
    posts: [],
    user: {
      
    }
  },
  getters: {},
  mutations: {
  },
  actions: {
    logout(){
      localStorage.removeItem('user_id');
    },
    
  },
  modules: {},
});
