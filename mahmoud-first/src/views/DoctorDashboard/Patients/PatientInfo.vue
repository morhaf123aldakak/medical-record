<template>
  <div class="patient-info">
    <DoctorSidebar>
      <div class="block w-100 mt-3">
        <div class="row text-start">
          <div class="col-12 text-center my-3">
            <h3><b>Patient Information:</b></h3>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Name:</b></h5>
            </div>
            <div>{{ patient.first_name + " " + patient.last_name }}</div>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Gender:</b></h5>
            </div>
            <div>{{ patient.gender }}</div>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Date of birth:</b></h5>
            </div>
            <div>{{ patient.dateofbirth }}</div>
          </div>
          <div class="col-4 my-3">
            <div>
              <h5><b>Relationship:</b></h5>
            </div>
            <div>{{ patient.relationship_status }}</div>
          </div>
          <div class="col-4 my-3">
            <div>
              <h5><b>Country:</b></h5>
            </div>
            <div>{{ patient.country }}</div>
          </div>
          <div class="col-4 my-3">
            <div>
              <h5><b>City:</b></h5>
            </div>
            <div>{{ patient.city }}</div>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Address:</b></h5>
            </div>
            <div>{{ patient.address }}</div>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Zipcode:</b></h5>
            </div>
            <div>{{ patient.zipcode }}</div>
          </div>
          <div class="col-4">
            <div>
              <h5><b>Mobile:</b></h5>
            </div>
            <div>{{ patient.mobile }}</div>
          </div>
          <div class="col-4 my-3">
            <div>
              <h5><b>Email:</b></h5>
            </div>
            <div>{{ patient.email }}</div>
          </div>
        </div>
        <hr />
        <div class="row text-center">
          <div class="col-12 my-3">
            <h3><b>Chronic diseases:</b></h3>
          </div>
          <div class="col-12">
            <div
              class="table-responsive"
              v-if="Object.keys(patient.old_history).length > 0"
            >
              <table class="table table-light table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Medicines</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="element in patient.old_history" :key="element.id">
                    <th scope="row">{{ element.id }}</th>
                    <td scope="row">
                      {{ element.old_disease }}
                    </td>
                    <td scope="row">
                      {{ element.old_medicines }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div v-else><h5>No chronic diseases</h5></div>
          </div>
        </div>
        <hr />
        <div class="row text-center">
          <div class="col-12 my-3">
            <h3><b>Admission information:</b></h3>
          </div>
          <div class="col-6 my-3">
            <div>
              <h5><b>Admission date:</b></h5>
            </div>
            <div>{{ patient.admission.admission_date }}</div>
          </div>
          <div
            class="col-6 my-3"
            v-if="patient.admission.discharge_date != null"
          >
            <div>
              <h5><b>Discharge date:</b></h5>
            </div>
            <div>{{ patient.admission.discharge_date }}</div>
          </div>
          <div class="col-6 my-3">
            <div>
              <h5><b>Ward no.:</b></h5>
            </div>
            <div>{{ patient.admission.ward_no }}</div>
          </div>
          <div class="col-6 my-3">
            <div>
              <h5><b>Bed no.:</b></h5>
            </div>
            <div>{{ patient.admission.bed_no }}</div>
          </div>
          <div class="col-6 my-3">
            <div>
              <h5><b>Note:</b></h5>
            </div>
            <div>{{ patient.admission.note }}</div>
          </div>
        </div>
        <hr />
        <div class="row text-start">
          <div class="col-12 text-center my-3">
            <h3><b>Doctor's diagnosis</b></h3>
          </div>
          <div class="col-6">
            <div>
              <h5><b>Date:</b></h5>
            </div>
            <div>
              <input type="date" v-model="date" class="form-control" />
            </div>
          </div>
          <div class="col-12 my-3">
            <div>
              <h5><b>Doctor's diagnosis note:</b></h5>
            </div>
            <div>
              <textarea
                rows="10"
                class="form-control w-100"
                v-model="note"
              ></textarea>
            </div>
          </div>
          <div class="col-6 d-flex justify-content-start align-items-center">
            <h5><b>Medical diagnoseles:</b></h5>
          </div>
          <div class="col-6 d-flex justify-content-end align-items-center">
            <button
              class="add_diagnosle"
              @click="$router.push('/Doctor-Add-Diagnosle?id=' + patient.id)"
            >
              Ask for diagnosle
            </button>
          </div>
          <div class="col-12 my-3">
            <div
              class="table-responsive"
              v-if="Object.keys(medical_diagnoseles).length > 0"
            >
              <table
                class="table table-light table-striped table-hover text-center"
              >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor note</th>
                    <th scope="col">Date</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="element in medical_diagnoseles"
                    :key="element.id"
                    style="cursor: pointer"
                  >
                    <th
                      scope="row"
                      @click="
                        lab_note = element.lab_note;
                        show_hide();
                      "
                    >
                      {{ element.id }}
                    </th>
                    <td
                      @click="
                        lab_note = element.lab_note;
                        show_hide();
                      "
                    >
                      {{ element.note }}
                    </td>
                    <td
                      @click="
                        lab_note = element.lab_note;
                        show_hide();
                      "
                    >
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
            <div v-else><h5>No medical diagnoseles</h5></div>
          </div>
          <div class="col-6">
            <div>
              <h5><b>Disease name:</b></h5>
            </div>
            <div>
              <input type="text" v-model="disease" class="form-control" />
            </div>
          </div>
          <div class="col-6">
            <div>
              <h5><b>Feeling sick date:</b></h5>
            </div>
            <div>
              <input
                type="date"
                v-model="feeling_sick_date"
                class="form-control"
              />
            </div>
          </div>
          <div class="col-12 my-3">
            <div>
              <h5><b>Symptoms:</b></h5>
            </div>
            <div>
              <textarea
                rows="10"
                class="form-control w-100"
                v-model="symptoms"
              ></textarea>
            </div>
          </div>
          <div class="col-12 my-3">
            <div>
              <h5><b>Medicines:</b></h5>
            </div>
            <div>
              <textarea
                rows="10"
                class="form-control w-100"
                v-model="medicines"
              ></textarea>
            </div>
          </div>
          <div
            v-if="!patient.admission.discharge_date"
            class="col-12 d-flex justify-content-start align-items-center my-3"
          >
            <div>
              <h5>
                <b>Chronic disease?</b>
              </h5>
            </div>
            <div class="mx-3">
              <input type="checkbox" v-model="chronic_disease" />
            </div>
          </div>
          <div
            v-if="!patient.admission.discharge_date"
            class="col-12 d-flex justify-content-start align-items-center my-3"
          >
            <div>
              <h5>
                <b> Need follow up?</b>
              </h5>
            </div>
            <div class="mx-3">
              <input type="checkbox" v-model="followup" />
            </div>
          </div>
          <div class="col-6" v-if="followup">
            <div>
              <h5><b>Follow up date:</b></h5>
            </div>
            <div>
              <input
                type="date"
                v-model="follow_up_date"
                class="form-control"
              />
            </div>
          </div>
          <div class="col-6" v-if="followup">
            <div>
              <h5><b>Follow up price:</b></h5>
            </div>
            <div>
              <input
                type="text"
                v-model="follow_up_price"
                class="form-control"
              />
            </div>
          </div>
          <div class="col-12" v-if="followup">
            <div>
              <h5><b>Follow up note:</b></h5>
            </div>
            <div>
              <textarea
                rows="10"
                class="form-control w-100"
                v-model="follow_up_note"
              ></textarea>
            </div>
          </div>
          <div class="col-12 my-3" v-if="!patient.admission.discharge_date">
            <button class="w-100 add_diagnosle" @click="update_history()">
              Save
            </button>
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
          <h6>{{ lab_note }}</h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import router from "@/router";
import { Icon } from "@iconify/vue";
import DoctorSidebar from "@/components/DoctorDashboard/DoctorSidebar.vue";
import axios from "axios";
export default {
  name: "patient-info",
  components: {
    DoctorSidebar,
    Icon,
  },
  data() {
    return {
      patient: {
        id: 0,
        patient_id: 0,
        first_name: "",
        last_name: "",
        dateofbirth: "",
        gender: "",
        address: "",
        city: "",
        zipcode: "",
        country: "",
        mobile: "",
        email: "",
        relationship_status: "",
        old_history: {},
        admission: {},
      },
      date: "",
      note: "",
      disease: "",
      symptoms: "",
      feeling_sick_date: "",
      medicines: "",
      doctors_diagnosis_note: "",
      followup: false,
      follow_up_date: "",
      follow_up_price: "",
      follow_up_note: "",
      chronic_disease: false,
      medical_diagnoseles: {},
      lab_note: "",
    };
  },
  methods: {
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      axios
        .get("http://127.0.0.1:8000/api/data_doctor/" + urlParams.get("id"))
        .then((response) => {
          this.patient.id = response.data[0].id;
          this.patient.patient_id = response.data[0].patient.id;
          this.patient.first_name = response.data[0].patient.first_name;
          this.patient.last_name = response.data[0].patient.last_name;
          this.patient.gender = response.data[0].patient.gender;
          this.patient.dateofbirth = response.data[0].patient.dob;
          this.patient.relationship_status =
            response.data[0].patient.Relationship_Status;
          this.patient.country = response.data[0].patient.country;
          this.patient.city = response.data[0].patient.city;
          this.patient.address = response.data[0].patient.address;
          this.patient.zipcode = response.data[0].patient.zipcode;
          this.patient.mobile = response.data[0].patient.mobile;
          this.patient.email = response.data[0].patient.email;
          this.patient.admission.admission_date =
            response.data[0].adms.admission_data;
          this.patient.admission.discharge_date =
            response.data[0].adms.discharge_data;
          this.patient.admission.ward_no = response.data[0].adms.wardd.number;
          this.patient.admission.bed_no = response.data[0].adms.bedd.number;
          this.patient.admission.note = response.data[0].adms.note;
          this.date = response.data[0].date;
          this.note = response.data[0].note;
          if (response.data[0].hestory.length > 0) {
            this.medical_diagnoseles = response.data[0].hestory;
          }
          if (response.data[0].old_hestory.length > 0) {
            this.patient.old_history = response.data[0].old_hestory;
          }
          if (response.data[0].dsess) {
            this.disease = response.data[0].dsess.name;
            this.feeling_sick_date = response.data[0].dsess.Feeling_sick_date;
            this.symptoms = response.data[0].dsess.symp;
            this.medicines = response.data[0].dsess.medicines;
          }
        })
        .catch((error) => {
          console.log(error);
        });
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
    editurl(id) {
      router.push("/Doctor-Edit-Diagnosle?id=" + id);
    },
    update_history() {
      if (this.date == "") {
        alert("Enter date");
        return;
      } else if (this.note == "") {
        alert("Enter doctor note");
        return;
      } else if (this.disease == "") {
        alert("Enter disease name");
        return;
      } else if (this.symptoms == "") {
        alert("Enter symptoms");
        return;
      } else if (this.medicines == "") {
        alert("Enter medicines name");
        return;
      } else if (this.followup) {
        if (this.follow_up_date == "") {
          alert("Enter followup date");
          return;
        } else if (this.follow_up_price == "") {
          alert("Enter followup price");
          return;
        } else if (this.follow_up_note == "") {
          alert("Enter followup note");
          return;
        }
      }
      axios("http://127.0.0.1:8000/api/data/" + this.patient.patient_id, {
        method: "post",
        data: {
          patient_history_id: this.patient.id,
          date: this.date,
          note: this.note,
          name: this.disease,
          symp: this.symptoms,
          Feeling_sick_date: this.feeling_sick_date,
          medicines: this.medicines,
          chronic: this.chronic_disease,
          old_disease: this.disease,
          old_medicines: this.medicines,
          follow: this.followup,
          follow_date: this.follow_up_date,
          follow_note: this.follow_up_note,
          total_price: this.follow_up_price,
        },
      })
        .then((response) => {
          alert("Patient have " + response.data.name);
          router.push("/Doctor-Patients");
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
.add_diagnosle {
  border: none;
  border-radius: 10px;
  background-color: #10b5aa;
  color: white;
  padding: 10px;
}
</style>
