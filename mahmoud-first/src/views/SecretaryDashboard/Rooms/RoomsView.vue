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
import axios from "axios";
export default {
  name: "rooms-view",
  data() {
    return {
      data_array: {},
    };
  },
  components: {
    TableComponent,
  },
  methods: {
    geddata() {
      axios
        .get("http://127.0.0.1:8000/api/ward_index")
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.data_array[i] = {
              id: response.data[i].id,
              number: response.data[i].number,
              state: response.data[i].status,
            };
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.geddata();
  },
};
</script>
