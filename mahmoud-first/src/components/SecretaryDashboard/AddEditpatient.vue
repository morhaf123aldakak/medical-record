<template>
  <div class="add-editpatient">
    <SecretarySidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>
            {{ type + " patient" }}
          </h3>
        </div>
        <div class="col-6">
          <div class="text-start">First name</div>
          <div>
            <input type="text" class="form-control" v-model="first_name" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Last name</div>
          <div>
            <input type="text" class="form-control" v-model="last_name" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Date of birth</div>
          <div>
            <input type="date" class="form-control" v-model="date_of_birth" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Gender</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ gender }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="gender = 'Male'"
                    :style="{ color: gender == 'Male' ? '#e57c23' : 'black' }"
                    >Male</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="gender = 'Female'"
                    :style="{ color: gender == 'Female' ? '#e57c23' : 'black' }"
                    >Female</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Mobile</div>
          <div>
            <input type="text" class="form-control" v-model="mobile" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Email</div>
          <div>
            <input type="text" class="form-control" v-model="email" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Address</div>
          <div>
            <input type="text" class="form-control" v-model="address" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">City</div>
          <div>
            <input type="text" class="form-control" v-model="city" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Country</div>
          <div>
            <input type="text" class="form-control" v-model="country" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Zipcode</div>
          <div>
            <input type="text" class="form-control" v-model="zipcode" />
          </div>
        </div>
        <div class="col-12">
          <div class="text-start">Relationship status</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ relation_state }}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="relation_state = 'Single'"
                    :style="{
                      color: relation_state == 'Single' ? '#e57c23' : 'black',
                    }"
                    >Single</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="relation_state = 'Married'"
                    :style="{
                      color: relation_state == 'Married' ? '#e57c23' : 'black',
                    }"
                    >Married</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="relation_state = 'Divorced'"
                    :style="{
                      color: relation_state == 'Divorced' ? '#e57c23' : 'black',
                    }"
                    >Divorced</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 my-3">
          <h3>{{ type }} old history</h3>
        </div>
        <div class="col-5">
          <div class="text-start">Disease name</div>
          <div>
            <input type="text" class="form-control" v-model="disease_name" />
          </div>
        </div>
        <div class="col-5">
          <div class="text-start">Medicines</div>
          <div>
            <input type="text" class="form-control" v-model="medicines" />
          </div>
        </div>
        <div class="col-2">
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
            @click="addoldhistory()"
          >
            +
          </button>
        </div>
        <div class="col-12">
          {{ err_messgae }}
        </div>
        <div class="col-12">
          <div class="table-responsive mt-3">
            <table class="table table-light table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Disease</th>
                  <th scope="col">Medicines</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(element, index) in old_history" :key="element.id">
                  <th scope="row">{{ element.id }}</th>
                  <td>
                    {{ element.old_disease }}
                  </td>
                  <td>{{ element.old_medicines }}</td>
                  <td>
                    <button
                      type="button"
                      class="delete"
                      @click="deleteoldhistory(index)"
                    >
                      <Icon icon="material-symbols:delete" class="icon" />
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
            @click="type == 'Add' ? add_patient() : edit_patient()"
          >
            {{ type + " patient" }}
          </button>
        </div>
      </div>
    </SecretarySidebar>
  </div>
</template>
<script>
import SecretarySidebar from "@/components/SecretaryDashboard/SecretarySidebar.vue";
import router from "@/router";
import axios from "axios";
import { Icon } from "@iconify/vue";
export default {
  name: "add-editpatient",
  data() {
    return {
      first_name: "",
      last_name: "",
      date_of_birth: "",
      gender: "",
      address: "",
      mobile: "",
      email: "",
      city: "",
      zipcode: "",
      country: "",
      relation_state: "",
      disease_name: "",
      medicines: "",
      err_messgae: "",
      id: 0,
      old_history: [],
    };
  },
  components: {
    SecretarySidebar,
    Icon,
  },
  props: {
    type: String,
  },
  methods: {
    addoldhistory() {
      this.err_messgae = "";
      if (this.disease_name == "") {
        this.err_messgae = "You should enter disease name";
        return;
      }
      if (this.medicines == "") {
        this.err_messgae = "You should enter medicins";
        return;
      }
      if (this.old_history.length > 0) {
        for (var i = 0; i < this.old_history.length; i++) {
          if (this.old_history[i].old_disease == this.disease_name) {
            this.err_messgae = "This disease has been inserted";
            return;
          }
        }
      }
      if (this.type == "Add") {
        this.id++;
        this.old_history.push({
          id: this.id,
          old_disease: this.disease_name,
          old_medicines: this.medicines,
        });
      } else {
        axios("http://127.0.0.1:8000/api/add_Patient_Old_History", {
          method: "post",
          data: {
            patient_id: this.id,
            old_medicines: this.medicines,
            old_disease: this.disease_name,
          },
        })
          .then((response) => {
            alert(response.data.old_disease + " has been added sucsessfully");
            window.location.reload();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    deleteoldhistory(index) {
      if (this.type == "Add") {
        var i = index;
        if (Object.keys(this.old_history).length == 1) {
          this.old_history.splice(i, 1);
          this.id--;
          return;
        }
        for (i; i < Object.keys(this.old_history).length - 1; i++) {
          this.old_history[i] = this.old_history[i + 1];
          this.old_history[i].id = i + 1;
        }
        this.old_history.splice(i, 1);
        this.id--;
      } else {
        axios
          .get(
            "http://127.0.0.1:8000/api/delete_old/" + this.old_history[index].id
          )
          .then((response) => {
            alert(response.data);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    add_patient() {
      if (this.first_name == "") {
        alert("Enter first name");
        return;
      } else if (this.last_name == "") {
        alert("Enter last name");
        return;
      } else if (this.email == "") {
        alert("Enter email");
        return;
      } else if (this.city == "") {
        alert("Enter city");
        return;
      } else if (this.address == "") {
        alert("Enter address");
        return;
      } else if (this.date_of_birth == "") {
        alert("Enter date of birth");
        return;
      } else if (this.gender == "") {
        alert("Enter gender");
        return;
      } else if (this.mobile == "") {
        alert("Enter mobile");
        return;
      } else if (this.zipcode == "") {
        alert("Enter zipcode");
        return;
      } else if (this.country == "") {
        alert("Enter country");
        return;
      } else if (this.relation_state == "") {
        alert("Enter relationship state");
        return;
      }
      const formdata = new FormData();
      formdata.append("first_name", this.first_name);
      formdata.append("last_name", this.last_name);
      formdata.append("email", this.email);
      formdata.append("city", this.city);
      formdata.append("dob", this.date_of_birth);
      formdata.append("gender", this.gender);
      formdata.append("address", this.address);
      formdata.append("mobile", parseInt(this.mobile));
      formdata.append("zipcode", this.zipcode);
      formdata.append("country", this.country);
      formdata.append("Relationship_Status", this.relation_state);
      if (this.old_history.length > 0) {
        formdata.append("old", JSON.stringify(this.old_history));
      }
      axios
        .post("http://127.0.0.1:8000/api/add_patient", formdata)
        .then((response) => {
          alert(
            response.data[0].first_name +
              " " +
              response.data[0].last_name +
              " has been added sucsessfully"
          );
          router.push("/Secretary-Patients");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    edit_patient() {
      const formdata = new FormData();
      formdata.append("first_name", this.first_name);
      formdata.append("last_name", this.last_name);
      formdata.append("email", this.email);
      formdata.append("city", this.city);
      formdata.append("dob", this.date_of_birth);
      formdata.append("gender", this.gender);
      formdata.append("address", this.address);
      formdata.append("mobile", parseInt(this.mobile));
      formdata.append("zipcode", this.zipcode);
      formdata.append("country", this.country);
      formdata.append("Relationship_Status", this.relation_state);

      axios
        .post("http://127.0.0.1:8000/api/update_patient/" + this.id, formdata)
        .then((response) => {
          alert(
            response.data.first_name +
              " " +
              response.data.last_name +
              " has been updated sucsessfully"
          );
          router.push("/Secretary-Patients");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      axios
        .get(
          "http://127.0.0.1:8000/api/show_one_patient/" + urlParams.get("id")
        )
        .then((response) => {
          this.first_name = response.data.first_name;
          this.last_name = response.data.last_name;
          this.relation_state = response.data.Relationship_Status;
          this.address = response.data.address;
          this.city = response.data.city;
          this.country = response.data.country;
          this.date_of_birth = response.data.dob;
          this.email = response.data.email;
          this.gender = response.data.gender;
          this.id = response.data.id;
          this.mobile = response.data.mobile;
          this.zipcode = response.data.zipcode;
          if (response.data.old) {
            this.old_history = response.data.old;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    if (this.type == "Edit") {
      this.getdata();
    }
  },
};
</script>
