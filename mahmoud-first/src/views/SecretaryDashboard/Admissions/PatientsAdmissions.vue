<template>
  <div class="patients-admissions">
    <SecretarySidebarVue>
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-6 text-start">
            Admissions({{ Object.keys(data_array).length }})
          </div>
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
                    <th scope="col">Ward no.</th>
                    <th scope="col">Bed no.</th>
                    <th scope="col">Admission date</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="element in shown_data" :key="element.id">
                    <th scope="row">{{ element.id }}</th>
                    <td>
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td scope="row">{{ element.doctor_name }}</td>
                    <td>{{ element.ward_no }}</td>
                    <td>{{ element.bed_no }}</td>
                    <td>{{ element.admission_date }}</td>
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
    </SecretarySidebarVue>
  </div>
</template>

<script>
import router from "@/router";
import SecretarySidebarVue from "@/components/SecretaryDashboard/SecretarySidebar.vue";
import { Icon } from "@iconify/vue";
export default {
  name: "patients-admissions",
  data() {
    return {
      shown_data: {},
      searchbar: "",
      data_array: {
        0: {
          id: 1,
          doctor_name: "Ahmad Alahmad",
          first_name: "mode",
          last_name: "mmm",
          ward_no: 4,
          bed_no: 3,
          admission_date: "202-1-1999",
        },
        1: {
          id: 2,
          doctor_name: "Ahmad Alahmad",
          first_name: "mode",
          last_name: "kasem",
          ward_no: 5,
          bed_no: 3,
          admission_date: "202-1-1999",
        },
      },
    };
  },
  components: {
    Icon,
    SecretarySidebarVue,
  },
  methods: {
    searchdata() {
      this.shown_data = {};
      if (this.searchbar == "") {
        this.shown_data = this.data_array;
      } else {
        if (Object.keys(this.data_array).length > 0)
          for (var i = 0; i < Object.keys(this.data_array).length; i++) {
            let name =
              this.data_array[i].first_name.toLowerCase() +
              " " +
              this.data_array[i].last_name.toLowerCase();
            let result = name.search(this.searchbar.toLowerCase());
            if (!result) {
              this.shown_data[i] = this.data_array[i];
            }
            if (result && name[result - 1] == " ") {
              this.shown_data[i] = this.data_array[i];
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
  },
  mounted() {
    this.searchdata();
  },
};
</script>
