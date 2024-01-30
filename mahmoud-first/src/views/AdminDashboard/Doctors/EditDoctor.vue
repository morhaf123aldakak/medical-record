<template>
  <div class="edit-doctor">
    <AddEditcomponent section="Doctor" type="Edit"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "edit-doctor",
  components: {
    AddEditcomponent,
  },
};
</script>
