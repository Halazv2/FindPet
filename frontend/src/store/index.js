import { createStore } from "vuex";

export default createStore({
  state: {
    posts: [],
  },
  getters: {},
  mutations: {
    // Post(state, posts) {
    //   state.posts.push(...posts);
    // },
    
  },
  actions: {
    logout(){
      localStorage.removeItem('user_id');
    },
    
  },
  modules: {},
});
