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
          <div class="col-6">
            <div>
              <h5><b>Admission date:</b></h5>
            </div>
            <div>{{ patient.admission.admission_date }}</div>
          </div>
          <div class="col-6" v-if="patient.admission.discharge_date != null">
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
          <div class="col-12 mb-3">
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
              <h5><b>Note:</b></h5>
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
              @click="$router.push('/Doctor-Add-Diagnosle')"
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
                      {{ element.doctor_note }}
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
          <div class="col-12 my-3">
            <div>
              <h5><b>Doctor's diagnosis note:</b></h5>
            </div>
            <div>
              <textarea
                rows="10"
                class="form-control w-100"
                v-model="doctors_diagnosis_note"
              ></textarea>
            </div>
          </div>
          <div
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
          <div class="col-12 my-3">
            <button class="w-100 add_diagnosle">Save</button>
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
export default {
  name: "patient-info",
  components: {
    DoctorSidebar,
    Icon,
  },
  data() {
    return {
      patient: {
        id: 1,
        patient_id: 1,
        first_name: "Mohamad",
        last_name: "Ahmad",
        dateofbirth: "2-6-2000",
        gender: "Male",
        address: "Baramkeh",
        city: "Damascus",
        zipcode: "829364628102",
        country: "Syria",
        mobile: "0933097404",
        email: "test@test.com",
        relationship_status: "Single",
        old_history: {
          0: {
            id: 1,
            old_disease: "Sukarry",
            old_medicines: "Ansoline",
          },
          1: {
            id: 2,
            old_disease: "Blood preasure",
            old_medicines: "Doa daghat",
          },
        },
        admission: {
          id: 3,
          bed_no: 3,
          ward_no: 1,
          admission_date: "10-1-2023",
          discharge_date: "15-1-2023",
          note: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus aut quibusdam blanditiis, recusandae voluptatum omnis voluptatem eos, ratione ad in deleniti doloremque tenetur, labore dolorum. Ratione temporibus cupiditate repudiandae pariatur.",
        },
      },
      date: "",
      note: "",
      disease: "",
      symptoms: "",
      feeling_sick_date: "",
      medicines: "",
      doctors_diagnosis_note: "",
      followup: "",
      follow_up_date: "",
      follow_up_price: "",
      follow_up_note: "",
      chronic_disease: "",
      medical_diagnoseles: {
        0: {
          id: 1,
          doctor_note: "Blood hp",
          date: "15-2-2023",
          lab_note: "",
        },
        1: {
          id: 2,
          doctor_note: "Blood preasure",
          date: "17-2-2023",
          lab_note: "Test 7",
        },
      },
      lab_note: "",
    };
  },
  methods: {
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
