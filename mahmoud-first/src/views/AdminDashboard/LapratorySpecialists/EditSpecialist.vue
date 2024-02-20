<template>
  <div class="edit-specialist">
    <AddEditcomponent section="Specialist" type="Edit"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "edit-specialist",
  components: {
    AddEditcomponent,
  },
};
</script>
