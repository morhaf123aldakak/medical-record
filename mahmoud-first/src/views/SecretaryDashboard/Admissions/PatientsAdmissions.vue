<template>
  <div class="patients-admissions">
    <SecretarySidebarVue>
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-6 text-start">Admissions({{ a_num }})</div>
          <div class="col-6 text-end">
            <button
              type="button"
              class="add_button"
              @click="gotourl()"
              style="background-color: rgb(74, 226, 146)"
            >
              Add Admissions
            </button>
          </div>
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
              :style="{ color: data_type != null ? '#0d0d7c' : 'white' }"
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
              :style="{ color: data_type == null ? '#0d0d7c' : 'white' }"
            >
              Discharged
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
                    <th scope="col" v-if="data_type != null">Ward no.</th>
                    <th scope="col" v-if="data_type != null">Bed no.</th>
                    <th scope="col">
                      {{ data_type == null ? "Discharge" : "Admission" }} date
                    </th>
                    <th scope="col" v-if="data_type == null">Total cost</th>
                    <th scope="col" v-if="data_type != null">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="element in shown_data" :key="element.id">
                    <th scope="row">{{ element.id }}</th>
                    <td>
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td scope="row">{{ element.doctor_name }}</td>
                    <td v-if="data_type != null">{{ element.ward_no }}</td>
                    <td v-if="data_type != null">{{ element.bed_no }}</td>
                    <td v-if="data_type != null">
                      {{ element.admission_date }}
                    </td>
                    <td v-if="data_type == null">
                      {{ element.discharge_date }}
                    </td>
                    <td v-if="data_type == null">
                      {{ element.total_cost }}
                    </td>
                    <td v-if="data_type != null">
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
    </SecretarySidebarVue>
  </div>
</template>

<script>
import router from "@/router";
import SecretarySidebarVue from "@/components/SecretaryDashboard/SecretarySidebar.vue";
import { Icon } from "@iconify/vue";
import axios from "axios";
export default {
  name: "patients-admissions",
  data() {
    return {
      shown_data: {},
      a_num: 0,
      searchbar: "",
      data_type: "active",
      data_array: {},
    };
  },
  components: {
    Icon,
    SecretarySidebarVue,
  },
  methods: {
    searchdata() {
      if (this.data_type != null) {
        this.a_num = 0;
      }
      this.shown_data = {};
      if (this.searchbar == "") {
        if (Object.keys(this.data_array).length > 0)
          for (var i = 0; i < Object.keys(this.data_array).length; i++) {
            if (
              this.data_type != null &&
              this.data_array[i].discharge_date == null
            ) {
              this.shown_data[i] = this.data_array[i];
              this.a_num++;
            } else if (
              this.data_type == null &&
              this.data_array[i].discharge_date != null
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
                this.data_array[i].discharge_date == null
              ) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].discharge_date != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
            if (result && name[result - 1] == " ") {
              if (
                this.data_type != null &&
                this.data_array[i].discharge_date == null
              ) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].discharge_date != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
          }
      }
    },
    gotourl() {
      router.push("/Secretary-Add-Admission");
    },
    editurl(id) {
      router.push("/Secretary-Edit-Admission?id=" + id);
    },
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/get_admissions")
        .then((response) => {
          if (response.data.length > 0) {
            for (var i = 0; i < response.data.length; i++) {
              this.data_array[i] = {
                id: response.data[i].patient_admn_id,
                doctor_name:
                  response.data[i].doctor.user.first_name +
                  " " +
                  response.data[i].doctor.user.last_name,
                first_name: response.data[i].patient.first_name,
                last_name: response.data[i].patient.last_name,
                ward_no: response.data[i].adms.wardd.number,
                bed_no: response.data[i].adms.bedd.number,
                admission_date: response.data[i].adms.admission_data,
                discharge_date: response.data[i].adms.discharge_data,
                total_cost: response.data[i].adms.total_cost,
              };
            }
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

<style>
.searchdata {
  background-color: rgb(74, 226, 146);
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: none;
  padding: 10px;
}
</style>
