<template>
  <div class="departments-view">
    <TableComponent
      :data_array="data_array"
      page_name="Departments"
      add_url="/Admin-Add-Department"
      edit_url="/Admin-Edit-Department"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "departments-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          name: "Eye",
          phone: "+963933097404",
          email: "test@test.com",
        },
        1: {
          id: 2,
          name: "Teeth",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        2: {
          id: 3,
          name: "Kidnees",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        3: {
          id: 4,
          name: "Laungs",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        4: {
          id: 5,
          name: "Ear",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
      },
    };
  },
  components: {
    TableComponent,
  },
};
</script>
