<template>
  <div class="add-department">
    <AddEditcomponent section="Department" type="Add"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "add-department",
  components: {
    AddEditcomponent,
  },
};
</script>
