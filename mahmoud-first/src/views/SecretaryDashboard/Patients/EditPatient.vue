<template>
  <div class="edit-patient">
    <AddEditpatientVue type="Edit"></AddEditpatientVue>
  </div>
</template>
<script>
import AddEditpatientVue from "@/components/SecretaryDashboard/AddEditpatient.vue";
export default {
  name: "edit-patient",
  components: {
    AddEditpatientVue,
  },
};
</script>
