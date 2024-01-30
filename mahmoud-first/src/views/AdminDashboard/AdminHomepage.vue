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
                <h4 class="card-title d-flex align-items-center">
                  <Icon :icon="element.icon" class="mx-2" />{{ element.name }}
                </h4>
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
export default {
  name: "admin-homeview",
  data() {
    return {
      cards: {
        0: {
          name: "Doctors",
          icon: "fontisto:doctor",
          count: 5,
          url: "/Admin-Doctors",
        },
        1: {
          name: "Secretaries",
          icon: "icon-park-outline:woman",
          count: 2,
          url: "/Admin-Secretaries",
        },
        2: {
          name: "Departments",
          icon: "mingcute:department-fill",
          count: 10,
          url: "/Admin-Departments",
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
