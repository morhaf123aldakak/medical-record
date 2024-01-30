<template>
  <div class="doctors-view">
    <TableComponent
      :data_array="data_array"
      page_name="Doctors"
      add_url="/Admin-Add-Doctor"
      edit_url="/Admin-Edit-Doctor"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "doctors-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          first_name: "Ahmad",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        1: {
          id: 2,
          first_name: "Mohamad",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        2: {
          id: 3,
          first_name: "Tarek",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        3: {
          id: 4,
          first_name: "Abd",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        4: {
          id: 5,
          first_name: "Mahmoud",
          last_name: "Alahmad",
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
