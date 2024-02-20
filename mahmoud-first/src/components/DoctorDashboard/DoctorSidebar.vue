<template>
  <div class="doctor-sidebar">
    <div class="row">
      <div class="col-3">
        <div class="card side-bar" style="background-color: #10b5aa">
          <h4 class="sidebar-content d-md-block d-none my-3">
            Doctor Dashboard
          </h4>
          <router-link to="/Doctor-Homepage" class="sidebar-content router"
            ><Icon class="mx-2" icon="material-symbols:dashboard" /><span
              class="d-md-block d-none"
              >Dashboard</span
            ></router-link
          >
          <router-link to="/Doctor-Patients" class="sidebar-content router"
            ><Icon class="mx-2" icon="mdi:patient" /><span
              class="d-md-block d-none"
              >Patients</span
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
  name: "doctor-sidebar",
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
    color: #10b5aa;
    background-color: white;
    text-decoration: underline;
  }
  transition: 0.5s ease-in-out;
}
.router:hover:hover {
  color: #10b5aa;
  text-decoration: underline;
  transition: 0.5s ease-in-out;
  background-color: white;

  &.router-link-exact-active {
    color: #10b5aa;
    text-decoration: underline;
    transition: 0.5s ease-in-out;
  }
}

.mycontent {
  height: 100dvh;
  overflow-y: scroll;
}
</style>
