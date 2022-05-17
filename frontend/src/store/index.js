import { createStore } from "vuex";

export default createStore({
  state: {
    posts: [],
  },
  getters: {},
  mutations: {
    Post(state, posts) {
      state.posts.push(...posts);
    },
  },
  actions: {
    getPosts() {},
  },
  modules: {},
});
