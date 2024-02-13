<template>
  <div class="doctor-patients">
    <DoctorSidebar>
      <div class="d-block w-100">
        <div class="row my-3 add">
          <div class="col-12 text-start">Patients ({{ d_num }})</div>
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
                color: data_type != null ? '#004cb5' : 'white',
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
                color: data_type == null ? '#004cb5' : 'white',
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
                    <th scope="col">Ward no.</th>
                    <th scope="col">Bed no.</th>
                    <th scope="col" v-if="data_type == null">Date</th>
                    <th scope="col">More info</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="element in shown_data"
                    :key="element.id"
                    @click="doctor_note = element.note"
                    style="cursor: pointer"
                  >
                    <th scope="row" @click="show_hide()">{{ element.id }}</th>
                    <td @click="show_hide()">
                      {{ element.first_name + " " + element.last_name }}
                    </td>
                    <td scope="row" @click="show_hide()">
                      {{ element.ward_no }}
                    </td>
                    <td>
                      {{ element.bed_no }}
                    </td>
                    <td v-if="data_type == null" @click="show_hide()">
                      {{ element.date }}
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
    </DoctorSidebar>
    <div
      class="overlay"
      id="popup1"
      style="visibility: hidden; opacity: 0"
      @click="show_hide()"
    >
      <div class="popup">
        <button type="button" class="close">X</button>
        <div class="content desc p-5 mt-2">
          <h5>Notes:</h5>
          <h6>{{ doctor_note }}</h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DoctorSidebar from "@/components/DoctorDashboard/DoctorSidebar.vue";
import { Icon } from "@iconify/vue";
import router from "@/router";
export default {
  name: "doctor-patients",
  components: {
    Icon,
    DoctorSidebar,
  },
  data() {
    return {
      shown_data: {},
      searchbar: "",
      data_type: "active",
      d_num: 0,
      doctor_note: "",
      data_array: {
        0: {
          id: 1,
          ward_no: 3,
          patient_id: 1,
          first_name: "mode",
          last_name: "mmm",
          bed_no: 2,
          date: "20-2-2023",
          note: "Test 1",
        },
        1: {
          id: 2,
          ward_no: 3,
          patient_id: 2,
          first_name: "mode",
          last_name: "kasem",
          bed_no: 2,
          date: "20-2-2023",
          note: "Test 2",
        },
        2: {
          id: 3,
          ward_no: 3,
          patient_id: 3,
          first_name: "Mohamad",
          last_name: "samer",
          bed_no: 2,
          date: null,
          note: null,
        },
        3: {
          id: 4,
          ward_no: 3,
          patient_id: 4,
          first_name: "Ali",
          last_name: "abd",
          bed_no: 2,
          date: null,
          note: null,
        },
      },
    };
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
            if (this.data_type != null && this.data_array[i].date == null) {
              this.shown_data[i] = this.data_array[i];
              this.d_num++;
            } else if (
              this.data_type == null &&
              this.data_array[i].date != null
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
              if (this.data_type != null && this.data_array[i].date == null) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].date != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
            if (result && name[result - 1] == " ") {
              if (this.data_type != null && this.data_array[i].date == null) {
                this.shown_data[i] = this.data_array[i];
              } else if (
                this.data_type == null &&
                this.data_array[i].date != null
              ) {
                this.shown_data[i] = this.data_array[i];
              }
            }
          }
      }
    },
    editurl(id) {
      router.push("/Patient-Info?id=" + id);
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
  },
  mounted() {
    this.searchdata();
  },
};
</script>

<style scoped>
.searchdata {
  background-color: #10b5aa;
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: none;
  padding: 10px;
}
</style>
