<template>
  <div class="add-editadmission">
    <SpecialistSidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>Edit Diagnosle</h3>
        </div>
        <div class="col-12">
          <div class="text-start">Diagnosle price</div>
          <div>
            <input type="text" class="form-control" v-model="cost" />
          </div>
        </div>
        <div class="col-12">
          <div class="text-start">Notes</div>
          <div>
            <textarea class="form-control w-100" rows="10"></textarea>
          </div>
        </div>
        <div class="col-12">
          <button type="button" class="save">Save Diagnosle</button>
        </div>
      </div>
    </SpecialistSidebar>
  </div>
</template>

<script>
import SpecialistSidebar from "@/components/LapSpecialistDashboard/SpecialistSidebar.vue";
export default {
  name: "add-editadmission",
  data() {
    return {
      cost: "",
    };
  },
  components: {
    SpecialistSidebar,
  },
};
</script>

<style>
.save {
  background-color: #0d0d7c;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 10px;
  margin-top: 20px;
  width: 100%;
}
</style>
