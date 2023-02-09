<template>
  <div>
    <div class="flex justify-between">
      <div class="text-3xl text-gray-800">Campaigns</div>
      <button @click="createCampaign" class="bg-gray-600 text-white text-sm px-2 rounded-lg hover:bg-gray-500">Create Campaign</button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {

    createCampaign()
    {
      this.$router.push('campaigns/create')

    },

    sendParticipateLink()
    {
      

    }
  }
}
</script>