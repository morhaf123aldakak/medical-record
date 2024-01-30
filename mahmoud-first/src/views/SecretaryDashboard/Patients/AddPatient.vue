<template>
  <div class="add-patient">
    <AddEditpatientVue type="Add"></AddEditpatientVue>
  </div>
</template>
<script>
import AddEditpatientVue from "@/components/SecretaryDashboard/AddEditpatient.vue";
export default {
  name: "add-patient",
  components: {
    AddEditpatientVue,
  },
};
</script>
