<template>
  <div class="rooms-view">
    <TableComponent
      :data_array="data_array"
      page_name="Wards"
      add_url="/Secretary-Add-Room"
      edit_url="/Secretary-Edit-Room"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
export default {
  name: "rooms-view",
  data() {
    return {
      data_array: {
        0: {
          id: 1,
          number: "101",
          state: "available",
        },
        1: {
          id: 2,
          number: "201",
          state: "available",
        },
        2: {
          id: 3,
          number: "301",
          state: "not available",
        },
        3: {
          id: 4,
          number: "401",
          state: "available",
        },
        4: {
          id: 5,
          number: "501",
          state: "available",
        },
      },
    };
  },
  components: {
    TableComponent,
  },
};
</script>
