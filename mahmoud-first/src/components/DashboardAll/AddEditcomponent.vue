<template>
  <div class="add-editcomponent">
    <AdminSidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>
            {{ type + " " + section }}
          </h3>
        </div>
        <div class="col-6" v-if="section == 'Department'">
          <div class="text-start">Name</div>
          <div>
            <input type="text" class="form-control" v-model="name" />
          </div>
        </div>
        <div class="col-6" v-if="section != 'Department'">
          <div class="text-start">First name</div>
          <div>
            <input type="text" class="form-control" v-model="first_name" />
          </div>
        </div>
        <div class="col-6" v-if="section != 'Department'">
          <div class="text-start">Last name</div>
          <div>
            <input type="text" class="form-control" v-model="last_name" />
          </div>
        </div>
        <div class="col-6" v-if="section != 'Department'">
          <div class="text-start">Date of birth</div>
          <div>
            <input type="date" class="form-control" v-model="date_of_birth" />
          </div>
        </div>
        <div class="col-6" v-if="section != 'Department'">
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
          <div class="text-start">Phone</div>
          <div>
            <input type="text" class="form-control" v-model="phone" />
          </div>
        </div>
        <div class="col-6" v-if="section != 'Department'">
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
        <div
          :class="section == 'Doctor' ? 'col-6' : 'col-12'"
          v-if="section != 'Department'"
        >
          <div class="text-start">Department</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ department }}
              </button>
              <ul
                class="dropdown-menu dropdown-menu-center"
                aria-labelledby="dropdownMenuButton1"
              >
                <li v-for="element in all_departments" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="
                      department = element.name;
                      department_id = element.id;
                    "
                    :style="{
                      color: department == element.name ? '#e57c23' : 'black',
                    }"
                    >{{ element.name }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6" v-if="section == 'Doctor'">
          <div class="text-start">Visit price</div>
          <div>
            <input type="text" class="form-control" v-model="visit_price" />
          </div>
        </div>
        <div class="col-6" v-if="section == 'Doctor'">
          <div class="text-start">Followup price</div>
          <div>
            <input type="text" class="form-control" v-model="followup_price" />
          </div>
        </div>
        <div class="col-6" v-if="section == 'Doctor'">
          <div class="text-start">Inpatient visit price</div>
          <div>
            <input
              type="text"
              class="form-control"
              v-model="inpatient_visit_price"
            />
          </div>
        </div>
        <div class="col-12" v-if="section != 'Department'">
          <div class="text-start">password</div>
          <div>
            <input type="password" class="form-control" v-model="password" />
          </div>
        </div>
        <div
          class="col-12"
          v-if="section == 'Doctor' || section == 'Department'"
        >
          <div class="text-start">Note</div>
          <div>
            <textarea
              name=""
              class="form-control w-100 note"
              id=""
              rows="10"
              v-model="note"
            ></textarea>
          </div>
        </div>
        <div class="col-12" v-if="section == 'Doctor' && type != 'Edit'">
          <div class="text-start">Signature</div>
          <div>
            <input
              type="file"
              id="note"
              class="form-control"
              @change="changefile"
            />
          </div>
        </div>
        <div class="col-12">
          <button
            type="button"
            class="submit_btn"
            @click="
              if (type == 'Add') {
                add();
              } else {
                edit();
              }
            "
          >
            {{ type + " " + section }}
          </button>
        </div>
      </div>
    </AdminSidebar>
  </div>
</template>

<script>
import axios from "axios";
import AdminSidebar from "../AdminDashboard/AdminSidebar.vue";
import router from "@/router";
export default {
  name: "add-editcomponent",
  data() {
    return {
      id: 0,
      user_id: 0,
      name: "",
      first_name: "",
      last_name: "",
      date_of_birth: "",
      gender: "",
      phone: "",
      mobile: "",
      email: "",
      address: "",
      department: "",
      department_id: 0,
      visit_price: 0,
      followup_price: 0,
      inpatient_visit_price: 0,
      note: "",
      signature: "",
      password: "",
      all_departments: {},
    };
  },
  components: {
    AdminSidebar,
  },
  props: {
    section: String,
    type: String,
  },
  methods: {
    changefile() {
      const input = document.getElementById("note");
      const file = input.files[0];
      this.signature = file;
    },
    add() {
      if (this.section == "Doctor") {
        if (this.first_name == "") {
          alert("Enter first name");
          return;
        } else if (this.last_name == "") {
          alert("Enter last name");
          return;
        } else if (this.date_of_birth == "") {
          alert("Enter date of birth");
          return;
        } else if (this.gender == "") {
          alert("Enter gender");
          return;
        } else if (this.phone == "") {
          alert("Enter phone");
          return;
        } else if (this.mobile == "") {
          alert("Enter mobile");
          return;
        } else if (this.email == "") {
          alert("Enter email");
          return;
        } else if (this.address == "") {
          alert("Enter address");
          return;
        } else if (this.department == "") {
          alert("Enter department");
          return;
        } else if (this.visit_price == 0) {
          alert("Enter visitprice");
          return;
        } else if (this.followup_price == 0) {
          alert("Enter followup price");
          return;
        } else if (this.inpatient_visit_price == "") {
          alert("Enter inpatient visit price");
          return;
        } else if (this.signature == "") {
          alert("Enter signature");
          return;
        } else if (this.password == "") {
          alert("Enter password");
          return;
        } else if (this.note == "") {
          alert("Enter note");
          return;
        }

        const formData = new FormData();
        const imgFile = document.getElementById("note");

        formData.append("signature", imgFile.files[0]);
        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("type", "doctor");
        formData.append("hospital_dep_id", this.department_id);
        formData.append("visit_price", this.visit_price);
        formData.append("followup_price", this.followup_price);
        formData.append("inpatient_visit_price", this.inpatient_visit_price);
        formData.append("note", this.note);
        formData.append("dob", this.date_of_birth);
        axios
          .post("http://127.0.0.1:8000/api/register-User", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            alert(
              response.data[0].first_name +
                " " +
                response.data[0].last_name +
                " has registered successfully"
            );
            router.push("/Admin-Doctors");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Secretary") {
        if (this.first_name == "") {
          alert("Enter first name");
          return;
        } else if (this.last_name == "") {
          alert("Enter last name");
          return;
        } else if (this.date_of_birth == "") {
          alert("Enter date of birth");
          return;
        } else if (this.gender == "") {
          alert("Enter gender");
          return;
        } else if (this.phone == "") {
          alert("Enter phone");
          return;
        } else if (this.mobile == "") {
          alert("Enter mobile");
          return;
        } else if (this.email == "") {
          alert("Enter email");
          return;
        } else if (this.address == "") {
          alert("Enter address");
          return;
        } else if (this.department == "") {
          alert("Enter department");
          return;
        } else if (this.password == "") {
          alert("Enter password");
          return;
        }
        const formData = new FormData();

        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("hospital_dep_id", this.department_id);
        formData.append("dob", this.date_of_birth);
        formData.append("type", "secretary");

        axios
          .post("http://127.0.0.1:8000/api/register-User", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            alert(
              response.data.first_name +
                " " +
                response.data.last_name +
                " has registered successfully"
            );
            router.push("/Admin-Secretaries");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Department") {
        if (this.name == "") {
          alert("Enter name");
          return;
        } else if (this.phone == "") {
          alert("Enter phone");
          return;
        } else if (this.email == "") {
          alert("Enter email");
          return;
        } else if (this.address == "") {
          alert("Enter address");
          return;
        } else if (this.note == "") {
          alert("Enter note");
          return;
        }
        const formData = new FormData();

        formData.append("name", this.name);
        formData.append("email", this.email);
        formData.append("address", this.address);
        formData.append("phone", parseInt(this.phone));
        formData.append("note", this.note);

        axios
          .post("http://127.0.0.1:8000/api/Dept-store", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            alert(response.data.name + " has added successfully");
            router.push("/Admin-Departments");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Specialist") {
        if (this.first_name == "") {
          alert("Enter first name");
          return;
        } else if (this.last_name == "") {
          alert("Enter last name");
          return;
        } else if (this.date_of_birth == "") {
          alert("Enter date of birth");
          return;
        } else if (this.gender == "") {
          alert("Enter gender");
          return;
        } else if (this.phone == "") {
          alert("Enter phone");
          return;
        } else if (this.mobile == "") {
          alert("Enter mobile");
          return;
        } else if (this.email == "") {
          alert("Enter email");
          return;
        } else if (this.address == "") {
          alert("Enter address");
          return;
        } else if (this.department == "") {
          alert("Enter department");
          return;
        } else if (this.password == "") {
          alert("Enter password");
          return;
        }
        const formData = new FormData();

        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("hospital_dep_id", this.department_id);
        formData.append("dob", this.date_of_birth);
        formData.append("type", "specialest");

        axios
          .post("http://127.0.0.1:8000/api/register-User", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            alert(
              response.data.first_name +
                " " +
                response.data.last_name +
                " has registered successfully"
            );
            router.push("/Admin-Specialists");
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    edit() {
      if (this.section == "Doctor") {
        const formData = new FormData();

        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("hospital_dep_id", this.department_id);
        formData.append("visit_price", this.visit_price);
        formData.append("followup_price", this.followup_price);
        formData.append("inpatient_visit_price", this.inpatient_visit_price);
        formData.append("note", this.note);
        formData.append("dob", this.date_of_birth);
        axios
          .post(
            "http://127.0.0.1:8000/api/update-doctor/" + this.user_id,
            formData,
            {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            }
          )
          .then((response) => {
            alert(
              response.data.first_name +
                " " +
                response.data.last_name +
                " has updated successfully"
            );
            router.push("/Admin-Doctors");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Secretary") {
        const formData = new FormData();

        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("hospital_dep_id", this.department_id);
        formData.append("dob", this.date_of_birth);
        axios
          .post(
            "http://127.0.0.1:8000/api/update-secr/" + this.user_id,
            formData,
            {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            }
          )
          .then((response) => {
            alert(
              response.data.first_name +
                " " +
                response.data.last_name +
                " has updated successfully"
            );
            router.push("/Admin-Secretaries");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Department") {
        const formData = new FormData();

        formData.append("name", this.name);
        formData.append("phone", this.phone);
        formData.append("email", this.email);
        formData.append("address", this.address);
        formData.append("note", this.note);
        axios
          .post("http://127.0.0.1:8000/api/update-depa/" + this.id, formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            alert(response.data.name + " has updated successfully");
            router.push("/Admin-Departments");
          })
          .catch((error) => {
            console.log(error);
          });
      }
      if (this.section == "Specialist") {
        const formData = new FormData();

        formData.append("first_name", this.first_name);
        formData.append("last_name", this.last_name);
        formData.append("email", this.email);
        formData.append("password", this.password);
        formData.append("gender", this.gender);
        formData.append("address", this.address);
        formData.append("mobile", parseInt(this.mobile));
        formData.append("phone_num", parseInt(this.phone));
        formData.append("hospital_dep_id", this.department_id);
        formData.append("dob", this.date_of_birth);
        axios
          .post(
            "http://127.0.0.1:8000/api/update-secr/" + this.user_id,
            formData,
            {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            }
          )
          .then((response) => {
            alert(
              response.data.first_name +
                " " +
                response.data.last_name +
                " has updated successfully"
            );
            router.push("/Admin-Specialists");
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/dept-index")
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.all_departments[i] = {
              id: response.data[i].id,
              name: response.data[i].name,
            };
          }
        })
        .catch((error) => {
          console.log(error);
        });
      if (this.type == "Edit") {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if (this.section == "Doctor") {
          axios
            .get(
              "http://127.0.0.1:8000/api/show-one-doctor/" + urlParams.get("id")
            )
            .then((response) => {
              this.id = response.data.id;
              this.followup_price = response.data.followup_price;
              this.inpatient_visit_price = response.data.inpatient_visit_price;
              this.note = response.data.note;
              this.address = response.data.user.address;
              this.date_of_birth = response.data.user.dob;
              this.email = response.data.user.email;
              this.first_name = response.data.user.first_name;
              this.gender = response.data.user.gender;
              this.department_id = response.data.user.hospital_dep_id;
              this.user_id = response.data.user.id;
              this.last_name = response.data.user.last_name;
              this.mobile = response.data.user.mobile;
              this.phone = response.data.user.phone_num;
              this.visit_price = response.data.visit_price;
              this.department = this.find_dep(this.department_id);
            })
            .catch((error) => {
              console.log(error);
            });
        }
        if (this.section == "Secretary") {
          axios
            .get(
              "http://127.0.0.1:8000/api/show-one-secr/" + urlParams.get("id")
            )
            .then((response) => {
              this.user_id = response.data.id;
              this.address = response.data.address;
              this.date_of_birth = response.data.dob;
              this.email = response.data.email;
              this.first_name = response.data.first_name;
              this.gender = response.data.gender;
              this.department_id = response.data.hospital_dep_id;
              this.last_name = response.data.last_name;
              this.mobile = response.data.mobile;
              this.phone = response.data.phone_num;
              this.department = this.find_dep(this.department_id);
            })
            .catch((error) => {
              console.log(error);
            });
        }
        if (this.section == "Department") {
          axios
            .get(
              "http://127.0.0.1:8000/api/show_one_dept/" + urlParams.get("id")
            )
            .then((response) => {
              this.id = response.data.id;
              this.name = response.data.name;
              this.phone = response.data.phone;
              this.email = response.data.email;
              this.address = response.data.address;
              this.note = response.data.note;
            })
            .catch((error) => {
              console.log(error);
            });
        }
        if (this.section == "Specialist") {
          axios
            .get(
              "http://127.0.0.1:8000/api/show_one_specialest/" +
                urlParams.get("id")
            )
            .then((response) => {
              this.user_id = response.data.id;
              this.address = response.data.address;
              this.date_of_birth = response.data.dob;
              this.email = response.data.email;
              this.first_name = response.data.first_name;
              this.gender = response.data.gender;
              this.department_id = response.data.hospital_dep_id;
              this.last_name = response.data.last_name;
              this.mobile = response.data.mobile;
              this.phone = response.data.phone_num;
              this.department = this.find_dep(this.department_id);
            })
            .catch((error) => {
              console.log(error);
            });
        }
      }
    },
    find_dep(dep_id) {
      for (var i = 0; i < Object.keys(this.all_departments).length; i++) {
        if (this.all_departments[i].id == dep_id) {
          return this.all_departments[i].name;
        }
      }
    },
  },
  mounted() {
    this.getdata();
  },
};
</script>

<style>
.submit_btn {
  background-color: #e57c23;
  border: none;
  border-radius: 10px;
  padding: 10px;
  width: 100%;
  color: white;
  margin-top: 20px;
}
</style>
