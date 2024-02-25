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
import axios from "axios";
export default {
  name: "departments-view",
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
        .get("http://127.0.0.1:8000/api/dept-index")
        .then((response) => {
          var data = response.data;
          for (var i = 0; i < data.length; i++) {
            this.data_array[i] = {
              id: data[i].id,
              name: data[i].name,
              phone: data[i].phone,
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
