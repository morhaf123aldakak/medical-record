<template>
  <div class="doctor-homepage">
    <DoctorSidebar>
      <div class="row my-3" style="height: fit-content">
        <div
          class="col-md-4 col-12 my-2"
          v-for="(element, index) in cards"
          :key="index"
        >
          <button type="button" class="mybtn" @click="gotourl(element.url)">
            <div class="card text-start">
              <div class="card-body">
                <h4 class="card-title d-flex align-items-center">
                  <Icon :icon="element.icon" class="mx-2" />{{ element.name }}
                </h4>
                <p class="card-text">count: {{ element.count }}</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </DoctorSidebar>
  </div>
</template>

<script>
import DoctorSidebar from "@/components/DoctorDashboard/DoctorSidebar.vue";
import router from "@/router";
import { Icon } from "@iconify/vue";
import axios from "axios";
export default {
  name: "doctor-homepage",
  data() {
    return {
      cards: {
        0: {
          name: "Patients",
          icon: "mdi:patient",
          count: 0,
          url: "/Doctor-Patients",
        },
      },
    };
  },
  components: {
    Icon,
    DoctorSidebar,
  },
  methods: {
    gotourl(url) {
      router.push(url);
    },
    getdata() {
      const Token = window.localStorage.getItem("token");
      axios("http://127.0.0.1:8000/api/nember_patient", {
        method: "get",
        headers: { Authorization: `Bearer ${Token}` },
      })
        .then((response) => {
          this.cards[0].count = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.getdata();
  },
};
</script>

<style lang="scss" scoped>
.card {
  transition: 0.5s ease-in-out;
  pointer-events: all;
}
.card:hover {
  color: #10b5aa;
}

.mybtn {
  width: 100%;
  background-color: unset;
  border: none;
}
</style>
