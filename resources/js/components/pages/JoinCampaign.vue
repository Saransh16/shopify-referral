<template>
  <div class="px-48">

    <div class="text-center mt-12">
      <div class="text-3xl font-medium text-gray-700">Join Campaign For Exciting Offers</div>
    </div>    

    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 mt-8 ">
      <form @submit.prevent="createParticipant">
        <div>
          <label class="block text-sm font-medium leading-5 text-gray-700">
            Name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input v-model="participant.name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
          </div>
          <div v-if="name_error">
            <div v-for="error in name_error" v-bind:key="error.id">
              <div class="py-1 text-sm text-red-500">{{ error }}</div>
            </div>
          </div>                    
        </div>            

        <div class="mt-6">
          <label class="block text-sm font-medium leading-5 text-gray-700">
            Email address
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input v-model="participant.email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
          </div>
          <div v-if="email_error">
            <div v-for="error in email_error" v-bind:key="error.id">
              <div class="py-1 text-sm text-red-500">{{ error }}</div>
            </div>
          </div>                    
        </div>

        <div class="mt-6">
          <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition duration-150 ease-in-out">
              Join
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
import campaignService from "../../services/CampaignService";
import participantService from "../../services/ParticipantService";
import Toast from "@/components/partials/Toast.vue";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: 'join-campaign',
  components: {
    Toast,
    Loading
  },      
  mounted()
  {
    console.log(this.$route.params.id);
    this.campaign_id = this.$route.params.id;      
    if(this.campaign_id) return this.fetchCampaign();
    return window.location.href = "/login";
  },

  data() {
    return {
      campaign_id: "",
      participant: {
        name: "",
        email: ""
      },
      email_error: "",
      name_error: "",
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

    fetchCampaign()
    {
      campaignService.get(this.campaign_id)
      .then((response) => {
        console.log(response);
      },
      (error) => {
        console.log(error.response);
      });    
    },

    createParticipant()
    {
      this.email_error = "";
      this.name_error = "";

      this.isLoading = true;
      participantService.joinCampaign(this.participant, this.campaign_id)
      .then((response) => {
        this.isLoading = false;
        console.log(response);
        this.participant = [];
        this.showAutoCloseAlert('Campaign Joined Successfully.');
      },
      (error) => {
        this.isLoading = false;        
        console.log(error.response);
        let message = "";
        if(error.response.status == 422)  message = "Something is wrong in your form.";
        this.email_error = error.response.data.errors.message.email;
        this.name_error = error.response.data.errors.message.name;
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
    }    

  }
}
</script>