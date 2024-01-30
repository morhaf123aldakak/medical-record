<template>
  <div class="edit-department">
    <AddEditcomponent section="Department" type="Edit"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "edit-department",
  components: {
    AddEditcomponent,
  },
};
</script>
