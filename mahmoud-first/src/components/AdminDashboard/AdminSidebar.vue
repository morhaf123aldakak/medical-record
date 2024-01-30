<template>
  <div class="admin-sidebar">
    <div class="row">
      <div class="col-3">
        <div class="card bg-dark side-bar">
          <h3 class="sidebar-content d-md-block d-none my-3">
            Admin Dashboard
          </h3>
          <router-link to="/Admin-Home" class="sidebar-content router"
            ><Icon class="mx-2" icon="material-symbols:dashboard" /><span
              class="d-md-block d-none"
              >Dashboard</span
            ></router-link
          >
          <router-link to="/Admin-Doctors" class="sidebar-content router"
            ><Icon class="mx-2" icon="fontisto:doctor" /><span
              class="d-md-block d-none"
              >Doctors</span
            ></router-link
          >
          <router-link to="/Admin-Secretaries" class="sidebar-content router"
            ><Icon class="mx-2" icon="icon-park-outline:woman" /><span
              class="d-md-block d-none"
              >Secretaries</span
            ></router-link
          >
          <router-link to="/Admin-Departments" class="sidebar-content router"
            ><Icon class="mx-2" icon="mingcute:department-fill" /><span
              class="d-md-block d-none"
              >Departments</span
            ></router-link
          >
        </div>
      </div>
      <div class="col-9 d-flex justify-content-center mycontent">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
export default {
  name: "admin-sidebar",
  components: {
    Icon,
  },
};
</script>

<style lang="scss" scoped>
.router {
  font-weight: bold;
  text-decoration: none;
  color: white;
  width: 100%;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  &.router-link-exact-active {
    color: #e57c23;
    background-color: white;
    text-decoration: underline;
  }
  transition: 0.5s ease-in-out;
}
.router:hover:hover {
  color: #e57c23;
  text-decoration: underline;
  transition: 0.5s ease-in-out;
  background-color: white;

  &.router-link-exact-active {
    color: #e57c23;
    text-decoration: underline;
    transition: 0.5s ease-in-out;
  }
}

.mycontent {
  height: 100dvh;
  overflow-y: scroll;
}
</style>
