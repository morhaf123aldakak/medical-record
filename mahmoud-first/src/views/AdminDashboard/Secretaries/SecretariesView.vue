<template>
  <div class="secretaries-view">
    <TableComponent
      :data_array="data_array"
      page_name="Secretaries"
      add_url="/Admin-Add-Secretary"
      edit_url="/Admin-Edit-Secretary"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "secretaries-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          first_name: "Soso",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        1: {
          id: 2,
          first_name: "Momo",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        2: {
          id: 3,
          first_name: "Koko",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        3: {
          id: 4,
          first_name: "Dodo",
          last_name: "Alahmad",
          phone: "+963933097404",
          email: "test@test.com",
          department: "Eye",
        },
        4: {
          id: 5,
          first_name: "Jojo",
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
