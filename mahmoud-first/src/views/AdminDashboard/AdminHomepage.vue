<template>
  <div class="admin-homeview">
    <AdminSidebar>
      <div class="row my-3" style="height: fit-content">
        <div
          class="col-md-4 col-12 my-2"
          v-for="(element, index) in cards"
          :key="index"
        >
          <button type="button" class="mybtn" @click="gotourl(element.url)">
            <div class="card text-start">
              <div class="card-body">
                <h5 class="card-title d-flex align-items-center">
                  <Icon :icon="element.icon" class="mx-2" />{{ element.name }}
                </h5>
                <p class="card-text">count: {{ element.count }}</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </AdminSidebar>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";
import AdminSidebar from "@/components/AdminDashboard/AdminSidebar.vue";
import router from "@/router";
import axios from "axios";
export default {
  name: "admin-homeview",
  data() {
    return {
      cards: {
        0: {
          name: "Doctors",
          icon: "fontisto:doctor",
          count: 0,
          url: "/Admin-Doctors",
        },
        1: {
          name: "Secretaries",
          icon: "icon-park-outline:woman",
          count: 0,
          url: "/Admin-Secretaries",
        },
        2: {
          name: "Departments",
          icon: "mingcute:department-fill",
          count: 0,
          url: "/Admin-Departments",
        },
        3: {
          name: "Laboratories",
          icon: "medical-icon:i-laboratory",
          count: 0,
          url: "/Admin-Labs",
        },
        4: {
          name: "Laboratory specialists",
          icon: "game-icons:lab-coat",
          count: 0,
          url: "/Admin-Specialists",
        },
      },
    };
  },
  components: {
    AdminSidebar,
    Icon,
  },
  methods: {
    gotourl(url) {
      router.push(url);
    },
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/numbers")
        .then((response) => {
          this.cards[0].count = response.data[1];
          this.cards[1].count = response.data[2];
          this.cards[2].count = response.data[0];
          this.cards[3].count = response.data[3];
          this.cards[4].count = response.data[4];
          this.show_hide();
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
  color: #e57c23;
}

.mybtn {
  width: 100%;
  background-color: unset;
  border: none;
}
</style>
