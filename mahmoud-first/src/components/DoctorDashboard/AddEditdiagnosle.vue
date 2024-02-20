<template>
  <div class="add-editdiagnosle">
    <DoctorSidebar>
      <div
        class="row my-4 p-4 text-start"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h2>
            {{ page_type + " Diagnosle" }}
          </h2>
        </div>
        <div class="col-12">
          <h5>Date:</h5>
        </div>
        <div class="col-12">
          <input type="date" class="form-control" v-model="date" />
        </div>
        <div class="col-12 mt-3">
          <h5>Notes:</h5>
        </div>
        <div class="col-12">
          <textarea
            rows="10"
            class="w-100 form-control"
            v-model="doctor_notes"
          ></textarea>
        </div>
        <div class="col-12 my-3">
          <button class="add_diagnosle w-100">
            {{ page_type + " Diagnosele" }}
          </button>
        </div>
      </div>
    </DoctorSidebar>
  </div>
</template>

<script>
import DoctorSidebar from "./DoctorSidebar.vue";
export default {
  name: "add-editdiagnosle",
  props: {
    page_type: String,
  },
  components: {
    DoctorSidebar,
  },
  data() {
    return {
      date: "",
      doctor_notes: "",
    };
  },
};
</script>
