<template>
  <div class="secretary-homepage">
    <SecretarySidebar>
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
    </SecretarySidebar>
  </div>
</template>

<script>
import SecretarySidebar from "@/components/SecretaryDashboard/SecretarySidebar.vue";
import { Icon } from "@iconify/vue";
import router from "@/router";
import axios from "axios";
export default {
  name: "secretary-homepage",
  data() {
    return {
      cards: {
        0: {
          name: "Patients",
          icon: "mdi:patient-outline",
          count: 0,
          url: "/Secretary-Patients",
        },
        1: {
          name: "Wards",
          icon: "material-symbols:meeting-room",
          count: 0,
          url: "/Secretary-Rooms",
        },
        2: {
          name: "Admissions",
          icon: "material-symbols:other-admission-outline",
          count: 0,
          url: "/Secretary-Admission-Patient",
        },
      },
    };
  },
  components: {
    SecretarySidebar,
    Icon,
  },
  methods: {
    gotourl(url) {
      router.push(url);
    },
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/numbers_patient_ward_admn")
        .then((response) => {
          this.cards[0].count = response.data[1];
          this.cards[1].count = response.data[2];
          this.cards[2].count = response.data[0];
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
  color: #0d0d7c;
}

.mybtn {
  width: 100%;
  background-color: unset;
  border: none;
}
</style>
