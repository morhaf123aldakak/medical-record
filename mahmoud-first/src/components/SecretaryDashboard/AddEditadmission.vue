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
            {{ "Patient name: " + p_fname + " " + p_lname }}
          </h5>
        </div>
        <div class="col-6 text-center" v-if="type == 'Edit'">
          <h5>
            {{ "Doctor name: " + d_fname + " " + d_lname }}
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
        <div class="col-12" v-if="type == 'Edit'">
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
                      color:
                        element.number == ward_number ? '#e57c23' : 'black',
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
                <li v-for="element in wards[ward_index].beds" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      bed_id = element.id;
                      bed_number = element.number;
                    "
                    :style="{
                      color: element.number == bed_number ? '#e57c23' : 'black',
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
                {{ p_fname + " " + p_lname }}
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
                      p_fname = element.fname;
                      p_lname = element.lname;
                      p_id = element.id;
                    "
                    :style="{
                      color: element.fname == p_fname ? '#e57c23' : 'black',
                    }"
                    >{{
                      element.fname + " " + element.lname + " " + element.mobile
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
                {{ d_fname + " " + d_lname }}
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
                      d_fname = element.fname;
                      d_lname = element.lname;
                      d_id = element.id;
                    "
                    :style="{
                      color: element.fname == d_fname ? '#e57c23' : 'black',
                    }"
                    >{{ element.fname + " " + element.lname }}</a
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
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
          >
            {{ type + " admission" }}
          </button>
        </div>
      </div>
    </SecretarySidebar>
  </div>
</template>

<script>
import SecretarySidebar from "./SecretarySidebar.vue";
export default {
  name: "add-editadmission",
  data() {
    return {
      patient_search: "",
      doctor_search: "",
      p_fname: "",
      p_lname: "",
      p_id: "",
      d_fname: "",
      d_lname: "",
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
      patients: {
        0: {
          id: 1,
          fname: "mohamad",
          lname: "hegazy",
          mobile: "0933097404",
        },
        1: {
          id: 2,
          fname: "Hythm",
          lname: "Hana",
          mobile: "0933097405",
        },
        2: {
          id: 3,
          fname: "Mahmoud",
          lname: "Alamle",
          mobile: "0933097406",
        },
      },
      doctors: {
        0: {
          id: 1,
          fname: "mohamad",
          lname: "hegazy",
        },
        1: {
          id: 2,
          fname: "Hythm",
          lname: "Hana",
        },
        2: {
          id: 3,
          fname: "Mahmoud",
          lname: "Alamle",
        },
      },
      wards: {
        0: {
          id: 1,
          number: 2,
          beds: {
            0: {
              id: 1,
              number: 2,
            },
            1: {
              id: 2,
              number: 4,
            },
            2: {
              id: 3,
              number: 6,
            },
          },
        },
        1: {
          id: 2,
          number: 5,
          beds: {
            0: {
              id: 4,
              number: 7,
            },
            1: {
              id: 5,
              number: 9,
            },
            2: {
              id: 6,
              number: 12,
            },
          },
        },
      },
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
              this.patients[i].fname.toLowerCase() +
              " " +
              this.patients[i].lname.toLowerCase();
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
              this.doctors[i].fname.toLowerCase() +
              " " +
              this.doctors[i].lname.toLowerCase();
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
  },
  components: {
    SecretarySidebar,
  },
  props: {
    type: String,
  },
  mounted() {
    this.searchpatient();
    this.searchdoctor();
  },
};
</script>
