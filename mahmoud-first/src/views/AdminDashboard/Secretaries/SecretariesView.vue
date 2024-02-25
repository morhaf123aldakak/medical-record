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
import axios from "axios";
export default {
  name: "secretaries-view",
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
        .get("http://127.0.0.1:8000/api/get-all-secr")
        .then((response) => {
          var data = response.data;
          for (var i = 0; i < data.length; i++) {
            this.data_array[i] = {
              id: data[i].id,
              first_name: data[i].first_name,
              phone: data[i].phone_num,
              last_name: data[i].last_name,
              email: data[i].email,
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
