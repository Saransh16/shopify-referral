<template>
  <div>
    <div class="vld-parent">
      <loading :active.sync="isLoading" :is-full-page="fullPage" :color="color"></loading>
    </div>        
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-8 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-4 text-center text-4xl leading-9 font-extrabold text-gray-900">
          Login to your account
        </h2>
        <p class="mt-2 text-center text-md leading-2 text-gray-400 max-w">
          Welcome back!
        </p>
      </div>

      <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form @submit.prevent="login">
            <div>
              <label class="block text-sm font-medium leading-5 text-gray-700">
                Email address
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <input type="email" v-model="user.email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
              </div>
              <div v-if="email_error">
                <div v-for="error in email_error" v-bind:key="error.id">
                  <div class="py-1 text-sm text-red-500">{{ error }}</div>
                </div>
              </div>              
            </div>

            <div class="mt-6">
              <label class="block text-sm font-medium leading-5 text-gray-700">
                Password
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <input type="password" v-model="user.password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
              </div>
              <div v-if="password_error">
                <div v-for="error in password_error" v-bind:key="error.id">
                  <div class="py-1 text-sm text-red-500">{{ error }}</div>
                </div>
              </div>              
            </div>

            <div class="mt-6 flex items-center justify-end">
              <div class="text-sm leading-5">
                <a href="#" class="font-medium text-gray-600 hover:text-gray-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                  Forgot your password?
                </a>
              </div>
            </div>

            <div class="mt-6">
              <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition duration-150 ease-in-out">
                  Login
                </button>
              </span>
            </div>
          </form>

          <div class="mt-6">
            <div class="relative">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 bg-white text-gray-500">
                  Don't have an account yet?
                </span>
              </div>
            </div>

            <div class="mt-2 text-center text-gray-500 text-sm tracking-wide">
              <a href="/register" class="hover:text-gray-700 cursor-pointer">
                Signup now for free
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Toast
      :show="alert.show"
      :message="alert.message"
      :position="alert.position"
    ></Toast>    
  </div>
</template>

<script>
import authService from '../../services/AuthService';
import Toast from "@/components/partials/Toast.vue";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {

  name:'login',
  components: {
    Toast,
    Loading
  },  

  data() {
    return {
      user: {
        'email': '',
        'password': ''
      },
      email_error: '',
      password_error: '',
      alert: {
        show: false,
        message: "",
        position: "top"
      },
      isLoading: false,
      fullPage: true,
      color: '#347deb',      
    }
  },

  methods: {

    login()
    {
      this.password_error = '';
      this.isLoading = true;
      authService.login(this.user)
      .then((response) => {
        this.isLoading = false;
        console.log("login success response",response.data);
        window.auth_user = response.data;
        this.$router.push('/admin/dashboard');
      },
      (error) => {
        console.log("login error response");
        this.isLoading = false;
        let message = "";
        if (error.response.status == 400) {
          message = error.response.data.message
              ? error.response.data.message
              : "Invalid credentials.";
        } else {
          message = "Unable to login.";
          console.log(error.response.data.errors.message.password);
          this.email_error = error.response.data.errors.message.email;
          this.password_error = error.response.data.errors.message.password;
        }
        this.showAutoCloseAlert(message);        
      });
    },

    showAutoCloseAlert(message, time = 2000) {
      this.alert.message = message;
      this.alert.show = true;
      let that = this;
      setTimeout(function() {
          that.alert.show = false;
      }, time);
    },    
  }
}
</script>