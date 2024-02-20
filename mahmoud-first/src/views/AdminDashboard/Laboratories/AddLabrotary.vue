<template>
  <div class="add-labrotary">
    <AdminSidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>Add Labrotary</h3>
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
          <button type="button" class="submit_btn">Add Laprotary</button>
        </div>
      </div>
    </AdminSidebar>
  </div>
</template>

<script>
import AdminSidebar from "@/components/AdminDashboard/AdminSidebar.vue";
export default {
  name: "add-labrotary",
  data() {
    return {
      phone: "",
      mobile: "",
      email: "",
      address: "",
      department: "",
      department_id: 0,
      note: "",
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
