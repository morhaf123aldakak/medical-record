<template>
  <div class="patients-view">
    <TableComponent
      :data_array="data_array"
      page_name="Patients"
      add_url="/Secretary-Add-Patient"
      edit_url="/Secretary-Edit-Patient"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "patients-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          first_name: "Ahmad",
          last_name: "Alahmad",
          mobile: "+963933097404",
          email: "test@test.com",
          address: "Damascus",
          gender: "Male",
        },
        1: {
          id: 2,
          first_name: "Mohamad",
          last_name: "Alahmad",
          mobile: "+963933097404",
          email: "test@test.com",
          address: "Damascus",
          gender: "Female",
        },
        2: {
          id: 3,
          first_name: "Tarek",
          last_name: "Alahmad",
          mobile: "+963933097404",
          email: "test@test.com",
          address: "Damascus",
          gender: "Male",
        },
        3: {
          id: 4,
          first_name: "Abd",
          last_name: "Alahmad",
          mobile: "+963933097404",
          email: "test@test.com",
          address: "Damascus",
          gender: "Male",
        },
        4: {
          id: 5,
          first_name: "Mahmoud",
          last_name: "Alahmad",
          mobile: "+963933097404",
          email: "test@test.com",
          address: "Damascus",
          gender: "Male",
        },
      },
    };
  },
  components: {
    TableComponent,
  },
};
</script>
