<template>
  <div class="specialestdiagnosles-view">
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
            <textarea
              class="form-control w-100"
              rows="10"
              v-model="lab_note"
            ></textarea>
          </div>
        </div>
        <div class="col-12" v-if="!cost">
          <button type="button" class="save" @click="edit_data()">
            Save Diagnosle
          </button>
        </div>
      </div>
    </SpecialistSidebar>
  </div>
</template>

<script>
import SpecialistSidebar from "@/components/LapSpecialistDashboard/SpecialistSidebar.vue";
import axios from "axios";
import router from "@/router";
export default {
  name: "specialestdiagnosles-view",
  data() {
    return {
      cost: "",
      id: 0,
      lab_note: "",
      date: "",
    };
  },
  components: {
    SpecialistSidebar,
  },
  methods: {
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      this.id = urlParams.get("id");
      axios
        .get("http://127.0.0.1:8000/api/get_diagnoss/" + this.id)
        .then((response) => {
          if (response.data.diag_price) {
            this.cost = response.data.diag_price;
            this.lab_note = response.data.lap_note;
          }
          this.date.response.data.date;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    edit_data() {
      if (this.cost == "") {
        alert("Enter coast");
        return;
      } else if (this.lab_note == "") {
        alert("Enter lab note");
        return;
      }
      axios("http://127.0.0.1:8000/api/ubdet_test/" + this.id, {
        method: "post",
        data: {
          lap_note: this.lab_note,
          diag_price: this.cost,
        },
      })
        .then((response) => {
          alert(
            "Data updated sucessfully price is: " + response.data.diag_price
          );
          router.push("/Specialist-Diagnosles");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.getdata();
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
