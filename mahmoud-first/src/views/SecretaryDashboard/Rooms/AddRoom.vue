<template>
  <div class="add-room">
    <AddEditroom type="Add"></AddEditroom>
  </div>
</template>
<script>
import AddEditroom from "@/components/SecretaryDashboard/AddEditroom.vue";
export default {
  name: "add-room",
  components: {
    AddEditroom,
  },
};
</script>
