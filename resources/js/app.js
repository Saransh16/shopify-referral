require("./bootstrap");

import Vue from "vue";
import App from "@/App.vue";
import router from "@/router";
import VCalendar from "v-calendar";

import { Datetime } from "vue-datetime";
import "vue-datetime/dist/vue-datetime.css";

Vue.use(VCalendar);

Vue.use(Datetime);

Vue.component("datetime", Datetime);

new Vue({
  el: "#app",
  router,
  template: "<App/>",
  components: {
    App
  }
});
