<template>
  <div class="min-h-screen bg-gray-50 flex flex-wrap justify-center py-10 sm:px-6 lg:px-32">
    <div class="vld-parent">
      <loading :active.sync="isLoading" :is-full-page="fullPage" :color="color"></loading>
    </div>    
    <div class="bg-white py-2 px-4 shadow sm:rounded-lg sm:px-6">
      <div class="text-center">
        <div class="text-gray-800 text-4xl font-semibold font-sans tracking-wide">
          Create a New Account.
        </div>
        <div class="text-gray-400 hover:text-gray-600 cursor-pointer" @click="navigateToLogin()">
          Already have an account? Login Here.
        </div>
      </div>
      <form @submit.prevent="register">
        <div>
          <div class="mt-4 border-t border-gray-200 pt-8">
            <div>
              <h3 class="text-lg leading-6 font-semibold text-gray-900">
                Personal Info
              </h3>
            </div>
            <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  First Name
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input required v-model="user.first_name" placeholder="Enter your first name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="first_name_error">
                  <div v-for="error in first_name_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                          
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Last Name
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input required v-model="user.last_name" placeholder="Enter your last name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="last_name_error">
                  <div v-for="error in last_name_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                               
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Email 
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input type="email" required v-model="user.email" placeholder="abc@example.com" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="email_error">
                  <div v-for="error in email_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                               
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Phone Number
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input type="number" maxlength="10" required v-model="user.phone_number" placeholder="Enter your phone number" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="phone_number_error">
                  <div v-for="error in phone_number_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                               
              </div>              

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Password
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input type="password" minlength="8" required v-model="user.password" placeholder="Password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="password_error">
                  <div v-for="error in password_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                               
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Confirm Password
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input type="password" minlength="8" required v-model="user.confirm_password" placeholder="Password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="confirm_password_error">
                  <div class="py-1 text-sm text-red-500">{{ confirm_password_error }}</div>
                </div>                               
              </div>     
                       

              <div class="mt-4 border-t border-gray-200 sm:col-span-6">
              </div>

              <div>
                <h3 class="text-lg leading-6 font-semibold text-gray-900">
                  Company Info
                </h3>
              </div>              

              <div class="sm:col-span-6">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Company Name
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input v-model="company.name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="company.name_error">
                  <div v-for="error in company.name_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                                       
              </div>              

              <div class="sm:col-span-6">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Street address
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input v-model="company.address" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="company.address_error">
                  <div v-for="error in company.address_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                       
              </div>

              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  City
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input v-model="company.city" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="company.city_error">
                  <div v-for="error in company.city_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                       
              </div>

              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  State 
                </label>
                <div class="relative">
                  <select v-model="company.state" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2  rounded  focus:outline-none focus:shadow-outline">
                    <option value="">Select State</option>
                    <option v-for="state in states" :value="state" v-bind:key="state.id">{{state}}</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
                <div v-if="company.state_error">
                  <div v-for="error in company.state_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                       
              </div>

              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  ZIP / Postal
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input type="number" v-model="company.zip" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="company.zip_error">
                  <div v-for="error in company.zip_error" v-bind:key="error.id">
                    <div class="py-1 text-sm text-red-500">{{ error }}</div>
                  </div>
                </div>                       
              </div>

              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Country
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input :disabled="disabled" v-model="company.country" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>   
              </div>              
            </div>
          </div>
        </div>
        <div class="mt-4 pt-4">
          <span class="block w-full rounded-md shadow-sm mb-4">
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition duration-150 ease-in-out">
              Register
            </button>
          </span>
        </div>
      </form>
    </div>

    <Toast
      :show="alert.show"
      :message="alert.message"
      :position="alert.position"
    ></Toast>    

  </div>
</template>


<script>
import miscService from '../../services/MiscService';
import authService from '../../services/AuthService';
import Toast from "@/components/partials/Toast.vue";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: 'Register',
  components: {
    Toast,
    Loading
  },  
  mounted()
  {
    this.getStates();
  },
  data() {
    return {
      disabled: true,
      user: {
        first_name: '',
        last_name: '',
        email: '',
        phone_number: '',
        password: '',          
        confirm_password: '',
      },
      first_name_error: '',
      last_name_error: '',
      email_error: '',
      password_error: '',
      confirm_password_error: '',
      phone_number_error: '',
      states: [],
      company: {
        name: '',
        address: '',
        city: '',
        state: '',
        zip: '',
        country: 'United States',
        name_error: '',
        address_error: '',
        city_error: '',
        state_error: '',
        zip_error: '',
      },
      isLoading: false,
      fullPage: true,
      color: '#347deb',
      alert: {
        show: false,
        message: "",
        position: "top"
      }        
    };
  },
  methods:{

    getStates()
    {
      miscService.getStates()
      .then((response) => {
        this.states = response.data;
      });
    },

    register()
    {
      if(this.user.password == this.user.confirm_password)
      {
        this.confirm_password_error = '';
        this.isLoading = true;
        authService.register(this.user, this.company)
        .then((response) => {
          console.log('register',response);
          this.isLoading = false;
          this.showAutoCloseAlert('Check your inbox and verify your email to proceed.', 5000);
          this.user = [];
          this.company = [];
        })
        .catch((error) => {
          console.log(error);
          this.isLoading = false;
          let errors = error.response.data.errors.message;
          this.first_name_error = errors.first_name;
          this.last_name_error = errors.last_name;
          this.email_error = errors.email
          this.password_error = errors.password;
          this.phone_number_error = errors.phone_number,
          this.company.name_error = errors.company;
          this.company.address_error = errors.address;
          this.company.city_error = errors.city;
          this.company.state_error = errors.state;
          this.company.zip_error = errors.zip;
        });         
      } 
      else
      {
        this.confirm_password_error = 'Passwords do not match.';
      }
    },

    navigateToLogin()
    {
      this.$router.push('/login');
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


