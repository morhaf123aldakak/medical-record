<template>
  <div class="add-editadmission">
    <SecretarySidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>
            {{ type + " admission" }}
          </h3>
        </div>
        <div class="col-6 text-center" v-if="type == 'Edit'">
          <h5>
            {{ "Patient name: " + p_first_name + " " + p_last_name }}
          </h5>
        </div>
        <div class="col-6 text-center" v-if="type == 'Edit'">
          <h5>
            {{ "Doctor name: " + d_first_name + " " + d_last_name }}
          </h5>
        </div>
        <div class="col-6 text-center my-4" v-if="type == 'Edit'">
          <h5>
            {{ "Bed number: " + bed_number }}
          </h5>
        </div>
        <div class="col-6 text-center my-4" v-if="type == 'Edit'">
          <h5>
            {{ "Ward number: " + ward_number }}
          </h5>
        </div>
        <div class="col-6" v-if="type == 'Edit'">
          <div class="text-start">Discharge date</div>
          <div>
            <input type="date" class="form-control" v-model="discharge_date" />
          </div>
        </div>
        <div class="col-6" v-if="type == 'Edit'">
          <div class="text-start">Total cost</div>
          <div>
            <input type="number" class="form-control" v-model="totalcost" />
          </div>
        </div>
        <div class="col-6" v-if="type == 'Add'">
          <div class="text-start">Wards</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ ward_number }}
              </button>
              <ul
                class="dropdown-menu drop-scroller"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="(element, index) in wards" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      ward_id = element.id;
                      ward_index = index;
                      ward_number = element.number;
                      ward_index = parseInt(ward_index);

                      console.log(ward_index);
                    "
                    :style="{
                      color: element.id == ward_id ? '#e57c23' : 'black',
                    }"
                    >{{ element.number }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6" v-if="ward_index !== 'notused' && type == 'Add'">
          <div class="text-start">Beds</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ bed_number }}
              </button>
              <ul
                class="dropdown-menu drop-scroller"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="element in wards[ward_index].bed" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      bed_id = element.id;
                      bed_number = element.number;
                    "
                    :style="{
                      color: element.id == bed_id ? '#e57c23' : 'black',
                    }"
                    >{{ element.number }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6" v-else-if="type == 'Add'">
          <div class="text-start">Beds</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ bed_number }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item disabled" href="#">Choose a ward</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6" v-if="type == 'Add'">
          <div class="text-start">Search for patient</div>
          <div>
            <input
              type="text"
              class="form-control"
              v-model="patient_search"
              @keypress="searchpatient()"
            />
          </div>
        </div>
        <div class="col-6" v-if="type == 'Add'">
          <div class="text-start">Search for doctor</div>
          <div>
            <input
              type="text"
              class="form-control"
              v-model="doctor_search"
              @keypress="searchdoctor()"
            />
          </div>
        </div>
        <div class="col-6" v-if="type == 'Add'">
          <div class="text-start">Patients</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ p_first_name + " " + p_last_name }}
              </button>
              <ul
                class="dropdown-menu drop-scroller"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="element in p_shown_data" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      p_first_name = element.first_name;
                      p_last_name = element.last_name;
                      p_id = element.id;
                    "
                    :style="{
                      color: element.id == p_id ? '#e57c23' : 'black',
                    }"
                    >{{
                      element.first_name +
                      " " +
                      element.last_name +
                      ", mobile: " +
                      element.mobile
                    }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6" v-if="type == 'Add'">
          <div class="text-start">Doctors</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ d_first_name + " " + d_last_name }}
              </button>
              <ul
                class="dropdown-menu drop-scroller"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="element in d_shown_data" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      d_first_name = element.first_name;
                      d_last_name = element.last_name;
                      d_id = element.id;
                    "
                    :style="{
                      color:
                        element.first_name == d_first_name
                          ? '#e57c23'
                          : 'black',
                    }"
                    >{{
                      element.first_name +
                      " " +
                      element.last_name +
                      ", department: " +
                      element.dep.name
                    }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12" v-if="type == 'Add'">
          <div class="text-start">Admission date</div>
          <div>
            <input type="date" class="form-control" v-model="admission_date" />
          </div>
        </div>
        <div class="col-12">
          <div class="text-start">Notes</div>
          <div>
            <textarea
              class="form-control"
              rows="10"
              v-model="notes"
              style="width: 100%"
            ></textarea>
          </div>
        </div>
        <div class="col-12">
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
            @click="type == 'Add' ? add_addmission() : edit_addmission()"
          >
            {{ type + " admission" }}
          </button>
        </div>
      </div>
    </SecretarySidebar>
  </div>
</template>

<script>
import axios from "axios";
import SecretarySidebar from "./SecretarySidebar.vue";
import router from "@/router";
export default {
  name: "add-editadmission",
  data() {
    return {
      patient_search: "",
      doctor_search: "",
      p_first_name: "",
      p_last_name: "",
      p_id: "",
      d_first_name: "",
      d_last_name: "",
      d_id: "",
      admission_date: "",
      discharge_date: "",
      totalcost: 0,
      notes: "",
      p_shown_data: [],
      d_shown_data: [],
      ward_id: 0,
      ward_number: 0,
      ward_index: "notused",
      bed_id: 0,
      bed_number: 0,
      patients: {},
      doctors: {},
      wards: {},
      id: 0,
    };
  },
  methods: {
    searchpatient() {
      this.p_shown_data = {};
      if (this.patient_search == "") {
        this.p_shown_data = this.patients;
      } else {
        if (Object.keys(this.patients).length > 0)
          for (var i = 0; i < Object.keys(this.patients).length; i++) {
            let name =
              this.patients[i].first_name.toLowerCase() +
              " " +
              this.patients[i].last_name.toLowerCase();
            let result = name.search(this.patient_search.toLowerCase());
            if (!result) {
              this.p_shown_data[i] = this.patients[i];
            }
            if (result && name[result - 1] == " ") {
              this.p_shown_data[i] = this.patients[i];
            }
          }
      }
    },
    searchdoctor() {
      this.d_shown_data = {};
      if (this.doctor_search == "") {
        this.d_shown_data = this.doctors;
      } else {
        if (Object.keys(this.doctors).length > 0)
          for (var i = 0; i < Object.keys(this.doctors).length; i++) {
            let name =
              this.doctors[i].first_name.toLowerCase() +
              " " +
              this.doctors[i].last_name.toLowerCase();
            let result = name.search(this.doctor_search.toLowerCase());
            if (!result) {
              this.d_shown_data[i] = this.doctors[i];
            }
            if (result && name[result - 1] == " ") {
              this.d_shown_data[i] = this.doctors[i];
            }
          }
      }
    },
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      this.id = urlParams.get("id");
      axios
        .get("http://127.0.0.1:8000/api/bed_index")
        .then((response) => {
          this.wards = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
      axios
        .get("http://127.0.0.1:8000/api/get_all_patient")
        .then((response) => {
          this.patients = response.data;
          this.searchpatient();
        })
        .catch((error) => {
          console.log(error);
        });
      axios
        .get("http://127.0.0.1:8000/api/get-all-doctor")
        .then((response) => {
          var index = 0;
          var data = response.data;
          for (var i = 0; i < data.length; i++) {
            if (data[i].type == "doctor") {
              this.doctors[index] = {
                id: data[i].doctor.id,
                first_name: data[i].first_name,
                last_name: data[i].last_name,
                dep: data[i].dep,
              };
              index++;
            }
          }
          this.searchdoctor();
        })
        .catch((error) => {
          console.log(error);
        });
      if (this.type == "Edit") {
        axios
          .get("http://127.0.0.1:8000/api/show_one_admission/" + this.id)
          .then((response) => {
            console.log(response);
            this.p_first_name = response.data[0].patient.first_name;
            this.p_last_name = response.data[0].patient.last_name;
            this.d_first_name = response.data[0].doctor.user.first_name;
            this.d_last_name = response.data[0].doctor.user.last_name;
            this.bed_number = response.data[0].adms.bedd.number;
            this.ward_number = response.data[0].adms.wardd.number;
            this.notes = response.data[0].adms.note;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    add_addmission() {
      if (this.ward_id == 0) {
        alert("Choose ward");
        return;
      } else if (this.bed_id == 0) {
        alert("Choose bed");
        return;
      } else if (this.p_id == "") {
        alert("Choose patient");
        return;
      } else if (this.d_id == "") {
        alert("Choose doctor");
        return;
      } else if (this.admission_date == "") {
        alert("Enter admission date");
        return;
      } else if (this.notes == "") {
        alert("Enter notes");
        return;
      }
      axios("http://127.0.0.1:8000/api/add_admission", {
        method: "post",
        data: {
          admission_data: this.admission_date,
          bed_id: this.bed_id,
          ward_id: this.ward_id,
          note: this.notes,
          patient_id: this.p_id,
          doctor_id: this.d_id,
        },
      })
        .then((response) => {
          alert(
            "Admission has been addded sucsessfully at: " +
              response.data[0].admission_data
          );
          router.push("/Secretary-Admission-Patient");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    edit_addmission() {
      if (this.discharge_date == "") {
        alert("Enter discharge date");
        return;
      } else if (this.totalcost == 0) {
        alert("Enter total cost");
        return;
      } else if (this.notes == "") {
        alert("Enter notes");
        return;
      }
      axios("http://127.0.0.1:8000/api/update_admission/" + this.id, {
        method: "post",
        data: {
          note: this.notes,
          total_cost: this.totalcost,
          discharge_data: this.discharge_date,
        },
      })
        .then((response) => {
          alert(
            "Patient has discharged sucsessfully at: " +
              response.data.discharge_data
          );
          router.push("/Secretary-Admission-Patient");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  components: {
    SecretarySidebar,
  },
  props: {
    type: String,
  },
  mounted() {
    this.getdata();
  },
};
</script>
