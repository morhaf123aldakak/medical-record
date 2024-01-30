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
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
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
    };
  },
  components: {
    SecretarySidebar,
  },
  props: {
    type: String,
  },
};
</script>
