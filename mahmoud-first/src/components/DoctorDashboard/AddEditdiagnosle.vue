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
        <div class="col-6">
          <div>
            <h5>Date:</h5>
          </div>
          <div>
            <input type="date" class="form-control" v-model="date" />
          </div>
        </div>
        <div class="col-6">
          <div>
            <h5>lab:</h5>
          </div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ lab_address }}
              </button>
              <ul
                class="dropdown-menu dropdown-menu-center"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="element in labs" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      lab_address = element.address;
                      lab_id = element.id;
                    "
                    :style="{
                      color: lab_id == element.id ? '#e57c23' : 'black',
                    }"
                    >{{ element.address }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
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
          <button
            class="add_diagnosle w-100"
            @click="page_type == 'Add' ? store_diag() : edit_diag()"
          >
            {{ page_type + " Diagnosele" }}
          </button>
        </div>
      </div>
    </DoctorSidebar>
  </div>
</template>

<script>
import axios from "axios";
import DoctorSidebar from "./DoctorSidebar.vue";
import router from "@/router";
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
      labs: {},
      lab_id: "",
      lab_address: "",
      history_id: 0,
      id: 0,
    };
  },
  methods: {
    searchlab(id) {
      for (var i = 0; i < Object.keys(this.labs).length; i++) {
        if (this.labs[i].id == id) {
          return this.labs[i].address;
        }
      }
    },
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if (this.page_type == "Add") {
        this.history_id = urlParams.get("id");
      } else {
        this.id = urlParams.get("id");
      }
      axios
        .get("http://127.0.0.1:8000/api/index_lab")
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.labs[i] = {
              id: response.data[i].id,
              address: response.data[i].lap_address,
            };
          }
        })
        .catch((error) => {
          console.log(error);
        });
      axios
        .get("http://127.0.0.1:8000/api/get_diagnoss/" + this.id)
        .then((response) => {
          this.doctor_notes = response.data.note;
          this.date = response.data.date;
          this.lab_id = response.data.hospital_diag_id;
          this.history_id = response.data.patient_history_id;
          this.lab_address = this.searchlab(this.lab_id);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    store_diag() {
      if (this.date == "") {
        alert("Enter date");
        return;
      } else if (this.doctor_notes == "") {
        alert("Enter notes");
        return;
      } else if (this.lab_id == "") {
        alert("Choose lab");
        return;
      }
      axios("http://127.0.0.1:8000/api/store_test", {
        method: "post",
        data: {
          date: this.date,
          note: this.doctor_notes,
          hospital_diag_id: this.lab_id,
          patient_history_id: this.history_id,
        },
      })
        .then((response) => {
          alert("Request has been added at : " + response.data.date);
          router.push("/Patient-Info?id=" + this.history_id);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    edit_diag() {
      axios("http://127.0.0.1:8000/api/ubdet_diagnosle/" + this.id, {
        method: "post",
        data: {
          date: this.date,
          note: this.doctor_notes,
          hospital_diag_id: this.lab_id,
        },
      })
        .then((response) => {
          alert("Request has been updated at: " + response.data.date);
          router.push("/Patient-Info?id=" + this.history_id);
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
