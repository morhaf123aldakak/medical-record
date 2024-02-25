<template>
  <div class="doctors-view">
    <TableComponent
      :data_array="data_array"
      page_name="Doctors"
      add_url="/Admin-Add-Doctor"
      edit_url="/Admin-Edit-Doctor"
    ></TableComponent>
  </div>
</template>

<script>
import TableComponent from "@/components/DashboardAll/TableComponent.vue";
import axios from "axios";
export default {
  name: "doctors-view",
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
      var index = 0;
      axios
        .get("http://127.0.0.1:8000/api/get-all-doctor")
        .then((response) => {
          var data = response.data;
          for (var i = 0; i < data.length; i++) {
            if (data[i].type == "doctor") {
              this.data_array[index] = {
                id: data[i].doctor.id,
                first_name: data[i].first_name,
                phone: data[i].phone_num,
                last_name: data[i].last_name,
                email: data[i].email,
                department: data[i].dep.name,
              };
              index++;
            }
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
