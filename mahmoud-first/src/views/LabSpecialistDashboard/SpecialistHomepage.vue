<template>
  <div class="specialist-homepage">
    <SepcialistSidebar>
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
    </SepcialistSidebar>
  </div>
</template>

<script>
import SepcialistSidebar from "@/components/LapSpecialistDashboard/SpecialistSidebar.vue";
import { Icon } from "@iconify/vue";
import router from "@/router";
import axios from "axios";
export default {
  name: "specialist-homepage",
  data() {
    return {
      cards: {
        0: {
          name: "Diagnosles",
          icon: "streamline:checkup-medical-report-clipboard",
          count: 0,
          url: "/Specialist-Diagnosles",
        },
      },
    };
  },
  components: {
    SepcialistSidebar,
    Icon,
  },
  methods: {
    gotourl(url) {
      router.push(url);
    },
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/number_diagnols")
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
  color: #0d0d7c;
}

.mybtn {
  width: 100%;
  background-color: unset;
  border: none;
}
</style>
