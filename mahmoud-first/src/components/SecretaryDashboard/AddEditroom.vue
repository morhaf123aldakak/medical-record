<template>
  <div class="add-editroom">
    <SecretarySidebar>
      <div
        class="row my-4 p-4"
        style="height: fit-content; background-color: rgb(215, 215, 215)"
      >
        <div class="col-12 text-center">
          <h3>
            {{ type + " ward" }}
          </h3>
        </div>
        <div class="col-6">
          <div class="text-start">Number</div>
          <div>
            <input type="text" class="form-control" v-model="number" />
          </div>
        </div>
        <div class="col-6">
          <div class="text-start">Status</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ status }}
              </button>
              <ul
                class="dropdown-menu dropdown-menu-center"
                aria-labelledby="dropdownMenuButton1"
              >
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="status = 'available'"
                    :style="{
                      color: status == 'available' ? '#e57c23' : 'black',
                    }"
                    >available</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="status = 'unavailable'"
                    :style="{
                      color: status == 'unavailable' ? '#e57c23' : 'black',
                    }"
                    >unavailable</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 my-3">
          <h3>{{ type }} bed</h3>
        </div>
        <div class="col-5">
          <div class="text-start">Bed number</div>
          <div>
            <input type="text" class="form-control" v-model="bed_number" />
          </div>
        </div>
        <div class="col-5">
          <div class="text-start">Bed status</div>
          <div>
            <div class="dropdown">
              <button
                class="dropdown-toggle w-100 form-control"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ bed_status }}
              </button>
              <ul
                class="dropdown-menu dropdown-menu-center"
                aria-labelledby="dropdownMenuButton1"
              >
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="bed_status = 'available'"
                    :style="{
                      color: bed_status == 'available' ? '#e57c23' : 'black',
                    }"
                    >available</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    @click="bed_status = 'unavailable'"
                    :style="{
                      color: bed_status == 'unavailable' ? '#e57c23' : 'black',
                    }"
                    >unavailable</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-2">
          <button
            type="button"
            class="submit_btn"
            style="background-color: rgb(74, 226, 146)"
            @click="addbed()"
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
                  <th scope="col">Bed number</th>
                  <th scope="col">Status</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(element, index) in beds" :key="element.id">
                  <th scope="row">{{ element.id }}</th>
                  <td>
                    {{ element.number }}
                  </td>
                  <td>{{ element.status }}</td>
                  <td>
                    <button
                      type="button"
                      class="delete"
                      @click="deletebed(index)"
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
            @click="type == 'Add' ? addward() : editward()"
          >
            {{ type + " ward" }}
          </button>
        </div>
      </div>
    </SecretarySidebar>
  </div>
</template>

<script>
import axios from "axios";
import SecretarySidebar from "./SecretarySidebar.vue";
import { Icon } from "@iconify/vue";
import router from "@/router";
export default {
  name: "add-editroom",
  data() {
    return {
      number: "",
      status: "",
      bed_number: "",
      bed_status: "",
      beds: [],
      err_messgae: "",
      id: 0,
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
    addbed() {
      this.err_messgae = "";
      if (this.bed_number == 0) {
        this.err_messgae = "You should enter number";
        return;
      }
      if (this.bed_status == "") {
        this.err_messgae = "You should fill the status";
        return;
      }
      if (this.beds.length > 0) {
        for (var i = 0; i < this.beds.length; i++) {
          if (this.beds[i].number == this.bed_number) {
            this.err_messgae = "This number is already taken";
            return;
          }
        }
      }
      if (this.type == "Add") {
        this.id++;
        this.beds.push({
          id: this.id,
          number: this.bed_number,
          status: this.bed_status,
        });
      } else {
        axios("http://127.0.0.1:8000/api/add_bed", {
          method: "post",
          data: {
            ward_id: this.id,
            status: this.bed_status,
            number: this.bed_number,
          },
        })
          .then((response) => {
            alert(response.data.number + " has been addded sucsessfully");
            window.location.reload();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    deletebed(index) {
      if (this.type == "Add") {
        var i = index;
        if (Object.keys(this.beds).length == 1) {
          this.beds.splice(i, 1);
          this.id--;
          return;
        }
        for (i; i < Object.keys(this.beds).length - 1; i++) {
          this.beds[i] = this.beds[i + 1];
          this.beds[i].id = i + 1;
        }
        this.beds.splice(i, 1);
        this.id--;
      } else {
        axios
          .get("http://127.0.0.1:8000/api/delete_bed/" + this.beds[index].id)
          .then((response) => {
            alert(response.data);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    addward() {
      if (this.number == "") {
        alert("Enter ward number");
        return;
      } else if (this.status == "") {
        alert("Enter status");
        return;
      } else if (this.beds.length <= 0) {
        alert("Enter at least 1 bed");
        return;
      }
      axios("http://127.0.0.1:8000/api/ward_store", {
        method: "post",
        data: {
          number: this.number,
          status: this.status,
          bed: this.beds,
        },
      })
        .then((response) => {
          alert(response.data.number + " has been added sucsessfully");
          router.push("/Secretary-Rooms");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editward() {
      axios("http://127.0.0.1:8000/api/update_ward/" + this.id, {
        method: "post",
        data: { ward_number: this.number, ward_status: this.status },
      })
        .then((response) => {
          alert(response.data.number + " has been updated sucsessfully");
          router.push("/Secretary-Rooms");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getdata() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      axios
        .get("http://127.0.0.1:8000/api/show_one_ward/" + urlParams.get("id"))
        .then((response) => {
          this.id = response.data.id;
          this.number = response.data.number;
          this.status = response.data.status;
          if (response.data.bed) {
            this.beds = response.data.bed;
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
