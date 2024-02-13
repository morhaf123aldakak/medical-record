<template>
  <div class="add-specialist">
    <AddEditcomponent section="Specialist" type="Add"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "add-specialist",
  components: {
    AddEditcomponent,
  },
};
</script>
