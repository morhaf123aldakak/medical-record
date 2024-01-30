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
        <div class="col-6" v-if="section == 'Doctor'">
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
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li v-for="element in all_departments" :key="element.id">
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="department = element.name"
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
          <div class="text-start">Inpatirent visit price</div>
          <div>
            <input
              type="text"
              class="form-control"
              v-model="inpatient_visit_price"
            />
          </div>
        </div>
        <div class="col-12" v-if="section != 'Secretary'">
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
        <div class="col-12" v-if="section == 'Doctor'">
          <div class="text-start">Signature</div>
          <div>
            <input type="file" class="form-control" />
          </div>
        </div>
        <div class="col-12">
          <button type="button" class="submit_btn">
            {{ type + " " + section }}
          </button>
        </div>
      </div>
    </AdminSidebar>
  </div>
</template>

<script>
import AdminSidebar from "../AdminDashboard/AdminSidebar.vue";
export default {
  name: "add-editcomponent",
  data() {
    return {
      name: "",
      first_name: "",
      last_name: "",
      date_of_birth: "",
      gender: "",
      phone: "",
      mobile: "",
      email: "",
      address: "",
      role: "",
      department: "",
      visit_price: 0,
      followup_price: 0,
      inpatient_visit_price: 0,
      note: "",
      signature: "",
      all_departments: {
        0: {
          id: 1,
          name: "Teeth",
        },
        1: {
          id: 2,
          name: "Nose",
        },
        2: {
          id: 3,
          name: "Ear",
        },
        3: {
          id: 4,
          name: "Chest",
        },
      },
    };
  },
  components: {
    AdminSidebar,
  },
  props: {
    section: String,
    type: String,
  },
  mounted() {
    this.role = this.section;
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
