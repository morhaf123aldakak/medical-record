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
                    <td>
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
          <div class="col-12 my-3" v-if="followup">
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
        </div>
      </div>
    </DoctorSidebar>
  </div>
</template>

<script>
import DoctorSidebar from "@/components/DoctorDashboard/DoctorSidebar.vue";
export default {
  name: "patient-info",
  components: {
    DoctorSidebar,
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
    };
  },
};
</script>
