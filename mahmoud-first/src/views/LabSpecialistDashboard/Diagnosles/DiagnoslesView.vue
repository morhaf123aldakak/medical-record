<template>
  <div class="diagnosles-admissions">
    <SpecialistSidebar>
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-12 text-start">Diagnosles({{ d_num }})</div>
        </div>
        <div class="row">
          <div class="col-6">
            <button
              type="button"
              class="searchdata"
              @click="
                data_type = 'active';
                searchdata();
              "
              style="border-radius: 10px 0 0 10px"
              :style="{
                color: data_type != null ? 'rgb(74, 226, 146)' : 'white',
              }"
            >
              Active
            </button>
          </div>
          <div class="col-6">
            <button
              type="button"
              class="searchdata"
              @click="
                data_type = null;
                searchdata();
              "
              style="border-radius: 0 10px 10px 0"
              :style="{
                color: data_type == null ? 'rgb(74, 226, 146)' : 'white',
              }"
            >
              Done
            </button>
          </div>
          <div class="col-11">
            <input
              type="text"
              v-model="searchbar"
              class="form-control"
              :placeholder="'Search for a patient'"
            />
          </div>
          <div class="col-1">
            <button type="button" class="btn btn-dark" @click="searchdata()">
              <Icon icon="material-symbols:search" class="icon" />
            </button>
          </div>
        </div>
        <div class="row my-3">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-light table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Doctor name</th>
                    <th scope="col">date</th>
                    <th scope="col" v-if="data_type == null">Price</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="element in shown_data"
                    :key="element.id"
                    @click="doctor_note = element.doctor_note"
                    style="cursor: pointer"
                  >
                    <th scope="row" @click="show_hide()">{{ element.id }}</th>
                    <td @click="show_hide()">
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td scope="row" @click="show_hide()">
                      {{ element.doctor_name }}
                    </td>
                    <td>
                      {{ element.date }}
                    </td>
                    <td v-if="data_type == null" @click="show_hide()">
                      {{ element.diagnosistest_price }}
                    </td>
                    <td>
                      <button
                        type="button"
                        class="edit"
                        @click="editurl(element.id)"
                      >
                        <Icon icon="fe:edit" class="icon" />
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </SpecialistSidebar>
    <div class="overlay" id="popup1" style="visibility: hidden; opacity: 0">
      <div class="popup">
        <button type="button" class="close" @click="show_hide()">X</button>
        <div class="content desc p-5 mt-2">
          <h5>Doctor notes:</h5>
          <h6>{{ doctor_note }}</h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import router from "@/router";
import SpecialistSidebar from "@/components/LapSpecialistDashboard/SpecialistSidebar.vue";
import { Icon } from "@iconify/vue";
import axios from "axios";
export default {
  name: "diagnosles-admissions",
  data() {
    return {
      shown_data: {},
      searchbar: "",
      data_type: "active",
      d_num: 0,
      doctor_note: "",
      data_array: {},
    };
  },
  components: {
    Icon,
    SpecialistSidebar,
  },
  methods: {
    searchdata() {
      this.shown_data = {};
      if (this.data_type != null) {
        this.d_num = 0;
      }
      if (this.searchbar == "") {
        if (Object.keys(this.data_array).length > 0)
          for (var i = 0; i < Object.keys(this.data_array).length; i++) {
            if (
              this.data_type != null &&
              this.data_array[i].diagnosistest_price == null
            ) {
              this.shown_data[i] = this.data_array[i];
              this.d_num++;
            } else if (
              this.data_type == null &&
              this.data_array[i].diagnosistest_price != null
            ) {
              this.shown_data[i] = this.data_array[i];
            }
          }
      } else {
        if (Object.keys(this.data_array).length > 0)
          for (i = 0; i < Object.keys(this.data_array).length; i++) {
            let name =
              this.data_array[i].first_name.toLowerCase() +
              " " +
              this.data_array[i].last_name.toLowerCase();
            let result = name.search(this.searchbar.toLowerCase());
            if (!result) {
              if (
                this.data_type != null &&
                this.data_array[i].diagnosistest_price == null
              ) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].diagnosistest_price != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
            if (result && name[result - 1] == " ") {
              if (
                this.data_type != null &&
                this.data_array[i].diagnosistest_price == null
              ) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].diagnosistest_price != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
          }
      }
    },
    editurl(id) {
      router.push("/Specialist-Edit-Diagnosel?id=" + id);
    },
    show_hide() {
      const element2 = document.getElementById("popup1");
      if (element2.style.visibility == "visible") {
        element2.style.visibility = "hidden";
        element2.style.opacity = 0;
      } else {
        element2.style.visibility = "visible";
        element2.style.opacity = 1;
      }
    },
    getdata() {
      const Token = window.localStorage.getItem("token");
      axios("http://127.0.0.1:8000/api/show_test", {
        method: "get",
        headers: { Authorization: `Bearer ${Token}` },
      })
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.data_array[i] = {
              id: response.data[i].id,
              doctor_name:
                response.data[i].doctor.user.first_name +
                " " +
                response.data[i].doctor.user.last_name,
              first_name: response.data[i].patient.first_name,
              last_name: response.data[i].patient.last_name,
              date: response.data[i].date,
              diagnosistest_price: response.data[i].diag_price,
              doctor_note: response.data[i].note,
            };
          }
          this.searchdata();
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

<style scoped>
.searchdata {
  background-color: #0d0d7c;
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: none;
  padding: 10px;
}
</style>
