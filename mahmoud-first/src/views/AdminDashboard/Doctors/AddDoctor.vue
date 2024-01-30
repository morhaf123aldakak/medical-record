<template>
  <div class="add-doctor">
    <AddEditcomponent section="Doctor" type="Add"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "add-doctor",
  components: {
    AddEditcomponent,
  },
};
</script>
