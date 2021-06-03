<template>
  <div>
    <button class="btn btn-primary" @click="followUser()" v-text="btnText">Follow</button>
  </div>
</template>

<script>
export default {
  props: ['userId','follows'],

  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      status: this.follows,
    };
  },
  methods: {
    followUser() {
      axios.post("/follow/" + this.userId)
      .then((response) => {
          this.status = !this.status
        console.log(
          "🚀🌈 ~ file: FollowButton.vue ~ line 18 ~ axios.post ~ response.data",
          response.data
        );
      })
      .catch(error =>{
          if(error.response.status == 401){
              window.location = '/login/';
          }
      })
    },
  },
  computed:{
      btnText(){
          return (this.status)? 'Unfollow': 'Follow';
      }
  }
};
</script>
