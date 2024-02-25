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
import axios from "axios";
export default {
  name: "patients-view",
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
        .get("http://127.0.0.1:8000/api/get_all_patient")
        .then((response) => {
          for (var i = 0; i < response.data.length; i++) {
            this.data_array[i] = {
              id: response.data[i].id,
              first_name: response.data[i].first_name,
              last_name: response.data[i].last_name,
              mobile: response.data[i].mobile,
              email: response.data[i].email,
              address: response.data[i].address,
              gender: response.data[i].gender,
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
