<template>
  <div>
    <router-view></router-view>

    <!-- Use this to show session message -->
    <!-- <Toast :show="alert.show" :message="alert.message"></Toast> -->
  </div>
</template>

<script>

export default {
  name: "app",
  data: () => {
    return {
      alert: {
        show: false,
        message: ""
      }
    };
  },
  mounted() {
    console.log("I am here");
  }
};
</script>
