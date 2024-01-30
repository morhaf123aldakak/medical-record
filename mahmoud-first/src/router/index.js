import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
// Admin
import AdminHomeview from "@/views/AdminDashboard/AdminHomepage.vue";
// Admin views
import DoctorsViewVue from "@/views/AdminDashboard/Doctors/DoctorsView.vue";
import SecretariesViewVue from "@/views/AdminDashboard/Secretaries/SecretariesView.vue";
import DepartmentsViewVue from "@/views/AdminDashboard/Departments/DepartmentsView.vue";
// Admin add
import AddDoctorVue from "@/views/AdminDashboard/Doctors/AddDoctor.vue";
import AddSecretaryVue from "@/views/AdminDashboard/Secretaries/AddSecretary.vue";
import AddDepartmentVue from "@/views/AdminDashboard/Departments/AddDepartment.vue";
// Admin edit
import EditDepartmentVue from "@/views/AdminDashboard/Departments/EditDepartment.vue";
import EditDoctorVue from "@/views/AdminDashboard/Doctors/EditDoctor.vue";
import EditSecretaryVue from "@/views/AdminDashboard/Secretaries/EditSecretary.vue";
// Secretary
import SecertaryHomepageVue from "@/views/SecretaryDashboard/SecertaryHomepage.vue";
// Secretary views
import PatientsViewVue from "@/views/SecretaryDashboard/Patients/PatientsView.vue";
import RoomsViewVue from "@/views/SecretaryDashboard/Rooms/RoomsView.vue";
import PatientsAdmissionsVue from "@/views/SecretaryDashboard/Admissions/PatientsAdmissions.vue";
// Secretary add
import AddPatientVue from "@/views/SecretaryDashboard/Patients/AddPatient.vue";
import AddRoomVue from "@/views/SecretaryDashboard/Rooms/AddRoom.vue";
// Secretary edit
import EditPatientVue from "@/views/SecretaryDashboard/Patients/EditPatient.vue";
import EditRoomVue from "@/views/SecretaryDashboard/Rooms/EditRoom.vue";

const routes = [
  // login
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  // Admin
  {
    path: "/Admin-Home",
    name: "AdminHomepage",
    component: AdminHomeview,
  },
  // Admin views
  {
    path: "/Admin-Doctors",
    name: "DoctorsView",
    component: DoctorsViewVue,
  },
  {
    path: "/Admin-Secretaries",
    name: "SecretariesView",
    component: SecretariesViewVue,
  },
  {
    path: "/Admin-Departments",
    name: "DepartmentsView",
    component: DepartmentsViewVue,
  },
  // Admin add
  {
    path: "/Admin-Add-Doctor",
    name: "AddDoctor",
    component: AddDoctorVue,
  },
  {
    path: "/Admin-Add-Secretary",
    name: "AddSecretary",
    component: AddSecretaryVue,
  },

  {
    path: "/Admin-Add-Department",
    name: "AddDepartment",
    component: AddDepartmentVue,
  },
  // Admin Edit
  {
    path: "/Admin-Edit-Department",
    name: "EditDepartment",
    component: EditDepartmentVue,
  },
  {
    path: "/Admin-Edit-Doctor",
    name: "EditDoctor",
    component: EditDoctorVue,
  },
  {
    path: "/Admin-Edit-Secretary",
    name: "EditSecretary",
    component: EditSecretaryVue,
  },
  // Secretary
  {
    path: "/Secretary-Homepage",
    name: "SecretaryHomepage",
    component: SecertaryHomepageVue,
  },
  // Secretary views
  {
    path: "/Secretary-Patients",
    name: "PatientsView",
    component: PatientsViewVue,
  },
  {
    path: "/Secretary-Rooms",
    name: "RoomsView",
    component: RoomsViewVue,
  },
  {
    path: "/Secretary-Admission-Patient",
    name: "PatientAdmissions",
    component: PatientsAdmissionsVue,
  },
  // Secretary add
  {
    path: "/Secretary-Add-Patient",
    name: "AddPatient",
    component: AddPatientVue,
  },
  {
    path: "/Secretary-Add-Room",
    name: "AddRoom",
    component: AddRoomVue,
  },
  // Secretary edit
  {
    path: "/Secretary-Edit-Patient",
    name: "EditPatient",
    component: EditPatientVue,
  },
  {
    path: "/Secretary-Edit-Room",
    name: "EditRoom",
    component: EditRoomVue,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
