<template>
  <div>
    <div class="flex justify-between">
      <div class="text-3xl text-gray-800">Participants</div>
      <button @click="createParticipant" class="bg-gray-600 text-white text-sm px-2 rounded-lg hover:bg-gray-500">Create Participant</button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {

    createParticipant()
    {
      this.$router.push('participants/create')

    }
  }
}
</script>