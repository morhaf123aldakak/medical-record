<template>
  <div class="home-view background-container">
    <div class="container p-5 flex-center vh-100">
      <div class="card p-5 w-75 card-glassmo">
        <form class="form">
          <div class="row flex-center">
            <div class="col-12 form-text card-title">
              <h3>Welcome to .....</h3>
            </div>
            <div class="col-12 my-3 card-text">
              <input
                class="form-control"
                type="text"
                placeholder="email"
                v-model="email"
              />
            </div>
            <div class="col-12 card-text">
              <input
                class="form-control"
                type="password"
                placeholder="password"
                v-model="password"
              />
            </div>
            <div class="col-4 my-3 card-text">
              <button
                type="button"
                class="btn btn-outline-dark"
                style="transition: 0.5s ease-in-out"
                @click="login()"
              >
                Login
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="overlay" id="popup1" style="visibility: hidden; opacity: 0">
      <div class="popup">
        <button type="button" class="close" @click="show_hide()">X</button>
        <div class="content desc p-5 mt-2" v-if="state == 'pending'">
          <h4>Your request still pending</h4>
        </div>
        <div
          class="content desc w-100 flex-center mb-4"
          v-if="state == 'pending'"
        >
          <loading-page></loading-page>
        </div>
        <div class="content desc w-100 my-5" v-if="state == 'active'">
          <h4>Welcome back {{ fname + " " + lname }}</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import LoadingPage from "@/components/LoadingPage.vue";
import axios from "axios";
export default {
  name: "home-view",
  data() {
    return {
      email: "",
      password: "",
      state: "",
      fname: "",
      lname: "",
    };
  },
  components: {
    LoadingPage,
  },
  methods: {
    login() {
      if (this.email == "") {
        window.alert("You should enter email");
        return;
      } else if (this.password == "") {
        window.alert("You should enter password");
        return;
      }
      axios({
        url: "http://127.0.0.1:8000/api/Login",
        method: "post",
        data: {
          email: this.email,
          password: this.password,
        },
      })
        .then((response) => {
          this.state = response.data.user.State;
          window.localStorage.setItem("token", response.data.token);
          this.fname = response.data.user.fname;
          this.lname = response.data.user.lname;
          this.show_hide();
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
  },
};
</script>
