<template>
  <div class="flex justify-center relative">
    <main
      class="
        container
        flex
        justify-center
        gap-6
        m-4
        flex-row
        sm:flex-col
        md:flex-col
        lg:flex-row
        xl:flex-row
      "
    >
      <!-- The button to open modal add post -->
      <div class="w-full">
        <div class="flex justify-between">
          <div>
            <label
              for="my-modal-3"
              class="btn border-none bg-primary-btn hover:bg-secondary-brn mb-6"
              >Add Post</label
            >
            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
            <AddPost class="modal modal-bottom sm:modal-middle" @getPosts="getPosts" />
          </div>

          <div>
            <select
              class="
                px-4
                py-3
                w-[150px]
                rounded-md
                btn
                bg-primary-btn
                hover:bg-secondary-brn
                mb-6
                border-none
                text-sm
              "
            >
              <option value="All">All Post</option>
              <option value="for-rent">For Adoption</option>
              <option value="for-sale">To Adopt</option>
            </select>
          </div>
        </div>
        <!-- posts -->
        <FeedPost v-for="post in posts" :key="post.id" :post="post" @getPosts="getPosts" />
      </div>
      <aside class="hidden md:block w-1/2 lg:sticky">
        <feed-side-comp />
      </aside>
    </main>
  </div>
</template>

<script>
import FeedSideComp from "./FeedSideComp.vue";
import AddPost from "./AddPost.vue";
import { Icon } from "@iconify/vue";
import FeedPost from "./FeedPost.vue";
export default {
  name: "FeedComp",
  components: {
    FeedSideComp,
    AddPost,
    Icon,
    FeedPost,
  },
  data() {
    return {
      posts: [],
      menu: false,
    };
  },
  methods: {
    getPosts() {
      fetch("http://localhost/fil-rouge-find-pet/FeedController/getFeed", {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          console.log(reponse);
          this.posts = reponse.reverse();
          // this.commit("Post", reponse.reverse());
        });
    },
  },
  // computed: {
  //   posts() {
  //     return this.$store.state.posts;
  //   },
  // },
  mounted() {
    // this.$store.dispatch("getPosts");
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
</style>