<template>
  <div>
    <div class="vld-parent">
      <loading :active.sync="isLoading" :is-full-page="fullPage" :color="color"></loading>
    </div>        
    
    <div class="max-w-7xl md:flex md:items-center md:justify-between">
      <div class="flex-1 min-w-0">
        <h1 class="text-2xl font-semibold text-gray-900">{{ pageTitle }}</h1>
      </div>
    </div>

    <div class="mt-10 max-w-7xl">
      <form @submit.prevent="handleFormSubmit()">
        <div>
          <div>
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">Campaign Details</h3>
              <p class="mt-1 text-sm leading-5 text-gray-500">Add campaign details here.</p>
            </div>
            <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
              <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium leading-5 text-gray-700">Title</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input
                    id="title"
                    v-model="campaign.title"
                    required
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                  />
                </div>
              </div>

              <div class="sm:col-span-6">
                <label
                  for="description"
                  class="block text-sm font-medium leading-5 text-gray-700"
                >Description</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <textarea
                    id="description"
                    rows="3"
                    v-model="campaign.description"     
                    required
                    class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                  ></textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">Write a few sentences about the campaign.</p>
              </div>

              <div class="sm:col-span-6">
                <label for="title" class="block text-sm font-medium leading-5 text-gray-700">Domain</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input
                    id="title"
                    v-model="campaign.domain"
                    required
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                  />
                </div>
              </div>              

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700">Start Date</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <datetime
                    input-class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    type="datetime"
                    v-model="campaign.start_date"
                    :minute-step="15"
                    use12-hour
                    value-zone="UTC"
                    zone="UTC"
                    title="Choose notify date &amp; time"
                  ></datetime>
                </div>
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700">End Date</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <datetime
                    input-class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    type="datetime"
                    v-model="campaign.end_date"
                    :minute-step="15"
                    use12-hour
                    value-zone="UTC"
                    zone="UTC"
                    title="Choose notify date &amp; time"
                  ></datetime>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-8 border-t border-gray-200 pt-8">
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">Rules</h3>
              <p class="mt-1 text-sm leading-5 text-gray-500">
                Add rules for this campaign.
              </p>
            </div>
            <div
              class="relative border border-gray-200 p-6 mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6"
            >           
              <div class="sm:col-span-6">
                <!-- <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Benifit
                </label> -->
                <div class="relative top-2">
                  <select v-model="campaign.rules.benifit" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2  rounded  focus:outline-none focus:shadow-outline">
                    <option value="">Select Benifit</option>
                    <option>Coupon</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>                     
              </div>        

              <div class="text-gray-700 sm:col-span-6 mt-4">
                For Referre
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Type
                </label>
                <div class="relative">
                  <select v-model="campaign.rules.referee.type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2  rounded  focus:outline-none focus:shadow-outline mt-1">
                    <option value="">Select Type</option>
                    <option>Fixed</option>
                    <option>Percentage</option>                    
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>                     
              </div>                

              <div class="sm:col-span-3">
                <label
                  for="item_title"
                  class="block text-sm font-medium leading-5 text-gray-700"
                >Value</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input    
                    type="number"                
                    step=".01"
                    required
                    v-model="campaign.rules.referee.value"
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                  />
                </div>
              </div>         

              <div class="text-gray-700 sm:col-span-6 mt-4">
                For Referral
              </div>

              <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700 tracking-wider">
                  Type
                </label>
                <div class="relative">
                  <select v-model="campaign.rules.referral.type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2  rounded  focus:outline-none focus:shadow-outline mt-1">
                    <option value="">Select Type</option>
                    <option>Fixed</option>
                    <option>Percentage</option>                    
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>                     
              </div>                

              <div class="sm:col-span-3">
                <label
                  for="item_title"
                  class="block text-sm font-medium leading-5 text-gray-700"
                >Value</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input                    
                    required
                    step=".01"
                    type="number"
                    v-model="campaign.rules.referral.value"
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                  />
                </div>
              </div>                    
            </div>            
          </div>          
        </div>
        <div class="border-t border-gray-200 pt-5 mt-12">
          <div class="flex justify-end">
            <span class="inline-flex rounded-md shadow-sm">
              <button
                type="button"
                @click="goToListingPage()"
                class="font-mono leading-tighter px-6 py-2 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
              >Cancel</button>
            </span>
            <span class="ml-3 inline-flex rounded-md shadow-sm">
              <button
                type="submit"
                class="inline-flex font-mono leading-tighter px-6 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition ease-in-out duration-150"
              >Save</button>
            </span>
          </div>
        </div>
      </form>
    </div>    
    <Toast
      :show="alert.show"
      :message="alert.message"
      :position="'top'"
      @toast-close="alert.show = false"
    ></Toast>    
  </div>
</template>

<script>
import campaignService from "@/services/CampaignService.js";
import Toast from "@/components/partials/Toast.vue";
import {Loading} from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: "CreateCampaign",
  components: {
    Toast,
    Loading
  },
  data: () => {
    return {
      alert: {
        show: false,
        message: "",
        position: "top"
      },
      campaign: {
        title: "",
        description: "",
        domain: "",
        start_date: "",
        end_date: "",
        rules: {
          referee : {},
          referral: {}
        }
      },
      editMode: false,
      pageTitle: "Create Campaign",
      isLoading: false,
      fullPage: true,
      color: '#347deb',      
    };
  },

  mounted() 
  {
    console.log(this.$route.params.id);
  },

  methods: {

    showAutoCloseAlert(message, time = 2000) {
      this.alert.message = message;
      this.alert.show = true;
      let that = this;
      setTimeout(function() {
        that.alert.show = false;
      }, time);
    },

    fetchCampaign(id) {
      let that = this;
      campaignService
        .get(id)
        .then(
          res => {
            console.log(res);
            that.campaign = res.campaign;
          },
          error => {
            console.log("error", error);
            alert("Unable to fetch campaign.");
          }
        )
        .finally(() => {});
    },

    goToListingPage() {
      this.$router.push({ name: "admin-campaigns" });
    },

    createCampaign() {
      this.isLoading = true;
      campaignService
        .create(this.campaign)
        .then(
          res => {
            console.log(res);
            this.isLoading = false;            
            this.showAutoCloseAlert(
              "Campaign created. Redirecting to index page..."
            );
            setTimeout(this.goToListingPage, 1000);
          },
          error => {
            console.log("error", error.response);
            this.showAutoCloseAlert("Unable to update campaign!");
          }
        )
        .finally(() => {});
    },

    updateCampaign() {
      campaignService
        .update(this.campaign.id, this.campaign)
        .then(
          res => {
            console.log(res);
            this.showAutoCloseAlert(
              "Campaign updated. Redirecting to index page..."
            );
            setTimeout(this.goToListingPage, 1000);
          },
          error => {
            console.log("error", error);
            this.showAutoCloseAlert("Unable to create campaign!");
          }
        )
        .finally(() => {});
    },

    handleFormSubmit() {

      if(this.campaign.rules.referee.type == "Percentage" && this.campaign.rules.referee.value > 100)
      {
        return this.showAutoCloseAlert("Percentage value for Referee cannot be greater than 100.");
      }

      if(this.campaign.rules.referral.type == "Percentage" && this.campaign.rules.referral.value > 100)
      {
        return this.showAutoCloseAlert("Percentage value for Referral cannot be greater than 100.");
      }      

      if (this.editMode) this.updateCampaign();

      else this.createCampaign();      
    },

  }
};
</script>
