<template>
  <div class="table-component">
    <AdminSidebar v-if="page_name != 'Patients' && page_name != 'Wards'">
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-6 text-start">
            {{ page_name }}({{ Object.keys(data_array).length }})
          </div>
          <div class="col-6 text-end">
            <button
              type="button"
              class="add_button"
              @click="gotourl()"
              :style="{
                fontSize: page_name == 'Laprotary Specialists' ? '14px' : '',
              }"
            >
              Add {{ page_name }}
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-11">
            <input
              type="text"
              v-model="searchbar"
              class="form-control"
              :placeholder="'Search for a ' + page_name"
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
                    <th scope="col" v-if="page_name == 'Labrotaries'">
                      Address
                    </th>
                    <th scope="col" v-if="page_name == 'Labrotaries'">
                      Mobile
                    </th>
                    <th scope="col" v-if="page_name == 'Labrotaries'">Phone</th>
                    <th scope="col" v-if="page_name != 'Labrotaries'">Name</th>
                    <th scope="col" v-if="page_name != 'Labrotaries'">Phone</th>
                    <th scope="col" v-if="page_name != 'Labrotaries'">Email</th>
                    <th
                      scope="col"
                      v-if="
                        page_name == 'Doctors' ||
                        page_name == 'Labrotaries' ||
                        page_name == 'Laprotary Specialists'
                      "
                    >
                      Department
                    </th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="element in shown_data" :key="element.id">
                    <th scope="row">{{ element.id }}</th>
                    <td
                      v-if="
                        page_name != 'Departments' && page_name != 'Labrotaries'
                      "
                    >
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td v-else-if="page_name != 'Labrotaries'">
                      {{ element.name }}
                    </td>
                    <td v-if="page_name != 'Labrotaries'">
                      {{ element.phone }}
                    </td>
                    <td v-if="page_name != 'Labrotaries'">
                      {{ element.email }}
                    </td>
                    <td
                      v-if="
                        (page_name == 'Doctors' &&
                          page_name != 'Labrotaries') ||
                        page_name == 'Laprotary Specialists'
                      "
                    >
                      {{ element.department }}
                    </td>
                    <td v-if="page_name == 'Labrotaries'">
                      {{ element.lab_address }}
                    </td>
                    <td v-if="page_name == 'Labrotaries'">
                      {{ element.lab_mobile }}
                    </td>
                    <td v-if="page_name == 'Labrotaries'">
                      {{ element.lab_phone }}
                    </td>
                    <td v-if="page_name == 'Labrotaries'">
                      {{ element.department_name }}
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
    </AdminSidebar>
    <SecretarySidebarVue v-if="page_name == 'Patients' || page_name == 'Wards'">
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-6 text-start">
            {{ page_name }}({{ Object.keys(data_array).length }})
          </div>
          <div class="col-6 text-end">
            <button
              type="button"
              class="add_button"
              @click="gotourl()"
              style="background-color: rgb(74, 226, 146)"
            >
              Add {{ page_name }}
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-11">
            <input
              type="text"
              v-model="searchbar"
              class="form-control"
              :placeholder="'Search for a ' + page_name"
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
                  <tr v-if="page_name == 'Patients'">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Edit</th>
                  </tr>
                  <tr v-else>
                    <th scope="col">#</th>
                    <th scope="col">Number</th>
                    <th scope="col">State</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="element in shown_data" :key="element.id">
                    <th scope="row">{{ element.id }}</th>
                    <td v-if="page_name == 'Patients'">
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td v-if="page_name != 'Patients'">{{ element.number }}</td>
                    <td v-if="page_name != 'Patients'">{{ element.state }}</td>
                    <td v-if="page_name == 'Patients'">{{ element.mobile }}</td>
                    <td v-if="page_name == 'Patients'">{{ element.email }}</td>
                    <td v-if="page_name == 'Patients'">
                      {{ element.address }}
                    </td>
                    <td v-if="page_name == 'Patients'">{{ element.gender }}</td>
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
import AdminSidebar from "../AdminDashboard/AdminSidebar.vue";
import SecretarySidebarVue from "../SecretaryDashboard/SecretarySidebar.vue";
import { Icon } from "@iconify/vue";
export default {
  name: "table-component",
  data() {
    return { shown_data: {}, searchbar: "" };
  },
  components: {
    AdminSidebar,
    Icon,
    SecretarySidebarVue,
  },
  props: {
    page_name: String,
    add_url: String,
    edit_url: String,
    data_array: Object,
  },
  methods: {
    searchdata() {
      this.shown_data = {};
      if (this.searchbar == "") {
        this.shown_data = this.data_array;
      } else {
        if (Object.keys(this.data_array).length > 0)
          if (
            this.page_name != "Departments" &&
            this.page_name != "Wards" &&
            this.page_name != "Labrotaries"
          ) {
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
          } else if (this.page_name == "Departments") {
            if (Object.keys(this.data_array).length > 0) {
              for (i = 0; i < Object.keys(this.data_array).length; i++) {
                let name = this.data_array[i].name.toLowerCase();
                let result = name.search(this.searchbar.toLowerCase());
                if (!result) {
                  this.shown_data[i] = this.data_array[i];
                }
              }
            }
          } else if (this.page_name == "Wards") {
            if (Object.keys(this.data_array).length > 0) {
              for (i = 0; i < Object.keys(this.data_array).length; i++) {
                let number = this.data_array[i].number.toLowerCase();
                let result = number.search(this.searchbar.toLowerCase());
                if (!result) {
                  this.shown_data[i] = this.data_array[i];
                }
              }
            }
          } else {
            if (Object.keys(this.data_array).length > 0) {
              for (i = 0; i < Object.keys(this.data_array).length; i++) {
                let department =
                  this.data_array[i].department_name.toLowerCase();
                let result = department.search(this.searchbar.toLowerCase());
                if (!result) {
                  this.shown_data[i] = this.data_array[i];
                }
              }
            }
          }
      }
    },
    gotourl() {
      router.push(this.add_url);
    },
    editurl(id) {
      router.push(this.edit_url + "?id=" + id);
    },
  },
  mounted() {
    this.searchdata();
  },
};
</script>
