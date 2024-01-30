<template>
  <div class="add-secretary">
    <AddEditcomponent section="Secretary" type="Add"></AddEditcomponent>
  </div>
</template>

<script>
import AddEditcomponent from "@/components/DashboardAll/AddEditcomponent.vue";
export default {
  name: "add-secretary",
  components: {
    AddEditcomponent,
  },
};
</script>
