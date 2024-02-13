<template>
  <div class="labrotaries-view">
    <TableComponent
      :data_array="data_array"
      page_name="Labrotaries"
      add_url="/Admin-Add-Labrotary"
      edit_url="/Admin-Edit-Labrotary"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "labrotaries-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          lab_address: "Floor 1",
          lab_phone: "0112228888",
          lab_mobile: "0933097404",
          lab_email: "test@test.com",
          department_name: "Teeth",
        },
        1: {
          id: 2,
          lab_address: "Floor 2",
          lab_phone: "0112228888",
          lab_mobile: "0933097404",
          lab_email: "test@test.com",
          department_name: "Eye",
        },
        2: {
          id: 3,
          lab_address: "Floor 3",
          lab_phone: "0112228888",
          lab_mobile: "0933097404",
          lab_email: "test@test.com",
          department_name: "Chest",
        },
        3: {
          id: 4,
          lab_address: "Floor 4",
          lab_phone: "0112228888",
          lab_mobile: "0933097404",
          lab_email: "test@test.com",
          department_name: "Heart",
        },
        4: {
          id: 5,
          lab_address: "Floor 5",
          lab_phone: "0112228888",
          lab_mobile: "0933097404",
          lab_email: "test@test.com",
          department_name: "Nerve",
        },
      },
    };
  },
  components: {
    TableComponent,
  },
};
</script>
