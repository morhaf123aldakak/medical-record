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
import axios from "axios";
export default {
  name: "labrotaries-view",
  data() {
    return {
      data_array: {},
    };
  },
  components: {
    TableComponent,
  },
  methods: {
    getdata() {
      axios
        .get("http://127.0.0.1:8000/api/index_lab")
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.data_array[i] = {
              id: response.data[i].id,
              lab_address: response.data[i].lap_address,
              lab_phone: response.data[i].lap_phone,
              lab_mobile: response.data[i].lap_mobile,
              lab_email: response.data[i].lap_email,
              department_name: response.data[i].lap.name,
            };
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.getdata();
  },
};
</script>
