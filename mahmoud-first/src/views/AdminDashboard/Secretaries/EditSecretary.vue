<template>
  <div class="edit-secretary">
    <AddEditcomponent section="Secretary" type="Edit"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "edit-secretary",
  components: {
    AddEditcomponent,
  },
};
</script>
