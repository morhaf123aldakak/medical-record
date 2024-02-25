<template>
  <div class="laprotary-specialists">
    <TableComponent
      :data_array="data_array"
      page_name="Laprotary Specialists"
      add_url="/Admin-Add-Specialist"
      edit_url="/Admin-Edit-Specialist"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
import axios from "axios";
export default {
  name: "laprotary-specialists",
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
        .get("http://127.0.0.1:8000/api/get_all_specialest")
        .then((response) => {
          console.log(response);
          var data = response.data;
          for (var i = 0; i < data.length; i++) {
            this.data_array[i] = {
              id: data[i].id,
              first_name: data[i].first_name,
              phone: data[i].phone_num,
              last_name: data[i].last_name,
              email: data[i].email,
              department: data[i].spla.name,
            };
          }
        });
    },
  },
  mounted() {
    this.getdata();
  },
};
</script>
