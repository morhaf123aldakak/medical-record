<template>
  <div class="edit-labrotary">
    <AdminSidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>Edit Labrotary</h3>
        </div>
        <div class="col-6">
          <div class="text-start">Address</div>
          <div>
            <input type="text" class="form-control" v-model="address" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Phone</div>
          <div>
            <input type="text" class="form-control" v-model="phone" />
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
            <input type="email" class="form-control" v-model="email" />
          </div>
        </div>
        <div class="col-12">
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
        <div class="col-12">
          <div class="text-start">Note</div>
          <div>
            <textarea
              name=""
              class="form-control w-100"
              id=""
              rows="10"
              v-model="note"
            ></textarea>
          </div>
        </div>
        <div class="col-12">
          <button type="button" class="submit_btn" @click="edit()">
            Edit Laprotary
          </button>
        </div>
      </div>
    </AdminSidebar>
  </div>
</template>

<script>
import AdminSidebar from "@/components/AdminDashboard/AdminSidebar.vue";
import axios from "axios";
import router from "@/router";
export default {
  name: "edit-labrotary",
  data() {
    return {
      id: 0,
      phone: "",
      mobile: "",
      email: "",
      address: "",
      department: "",
      department_id: 0,
      note: "",
      all_departments: {},
    };
  },
  components: {
    AdminSidebar,
  },
  methods: {
    edit() {
      const formData = new FormData();

      formData.append("lap_mobile", parseInt(this.mobile));
      formData.append("lap_email", this.email);
      formData.append("lap_address", this.address);
      formData.append("lap_phone", parseInt(this.phone));
      formData.append("note", this.note);
      formData.append("hospital_dep_id", this.department_id);

      axios
        .post(
          "http://127.0.0.1:8000/api/update_diagnosl/" + this.id,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((response) => {
          alert(response.data.lap_address + " has updated successfully");
          router.push("/Admin-Labs");
        })
        .catch((error) => {
          console.log(error);
        });
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
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      axios
        .get("http://127.0.0.1:8000/api/show_one_lap/" + urlParams.get("id"))
        .then((response) => {
          this.id = response.data.id;
          this.address = response.data.lap_address;
          this.phone = response.data.lap_phone;
          this.department_id = response.data.hospital_dep_id;
          this.email = response.data.lap_email;
          this.mobile = response.data.lap_mobile;
          this.note = response.data.note;
          this.department = this.find_dep(this.department_id);
        })
        .catch((error) => {
          console.log(error);
        });
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
