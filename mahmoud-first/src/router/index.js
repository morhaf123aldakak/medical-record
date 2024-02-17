import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
// Admin
import AdminHomeview from "@/views/AdminDashboard/AdminHomepage.vue";
// Admin views
import DoctorsViewVue from "@/views/AdminDashboard/Doctors/DoctorsView.vue";
import SecretariesViewVue from "@/views/AdminDashboard/Secretaries/SecretariesView.vue";
import DepartmentsViewVue from "@/views/AdminDashboard/Departments/DepartmentsView.vue";
import LaboratoriesViewVue from "@/views/AdminDashboard/Laboratories/LaboratoriesView.vue";
import LaboratorySpecialistsVue from "@/views/AdminDashboard/LapratorySpecialists/LaprotarySpecialists.vue";
// Admin add
import AddDoctorVue from "@/views/AdminDashboard/Doctors/AddDoctor.vue";
import AddSecretaryVue from "@/views/AdminDashboard/Secretaries/AddSecretary.vue";
import AddDepartmentVue from "@/views/AdminDashboard/Departments/AddDepartment.vue";
import AddLabrotaryVue from "@/views/AdminDashboard/Laboratories/AddLabrotary.vue";
import AddSpecialistVue from "@/views/AdminDashboard/LapratorySpecialists/AddSpecialist.vue";
// Admin edit
import EditDepartmentVue from "@/views/AdminDashboard/Departments/EditDepartment.vue";
import EditDoctorVue from "@/views/AdminDashboard/Doctors/EditDoctor.vue";
import EditSecretaryVue from "@/views/AdminDashboard/Secretaries/EditSecretary.vue";
import EditLabrotaryVue from "@/views/AdminDashboard/Laboratories/EditLabrotary.vue";
import EditSpecialistVue from "@/views/AdminDashboard/LapratorySpecialists/EditSpecialist.vue";
// Secretary
import SecertaryHomepageVue from "@/views/SecretaryDashboard/SecertaryHomepage.vue";
// Secretary views
import PatientsViewVue from "@/views/SecretaryDashboard/Patients/PatientsView.vue";
import RoomsViewVue from "@/views/SecretaryDashboard/Rooms/RoomsView.vue";
import PatientsAdmissionsVue from "@/views/SecretaryDashboard/Admissions/PatientsAdmissions.vue";
// Secretary add
import AddPatientVue from "@/views/SecretaryDashboard/Patients/AddPatient.vue";
import AddRoomVue from "@/views/SecretaryDashboard/Rooms/AddRoom.vue";
import AddAdmission from "@/views/SecretaryDashboard/Admissions/AddAdmission.vue";
// Secretary edit
import EditPatientVue from "@/views/SecretaryDashboard/Patients/EditPatient.vue";
import EditRoomVue from "@/views/SecretaryDashboard/Rooms/EditRoom.vue";
import EditAdmission from "@/views/SecretaryDashboard/Admissions/EditAdmission.vue";
// Lap Specialist
import SpecialistHomepageVue from "@/views/LabSpecialistDashboard/SpecialistHomepage.vue";
// Lap Specialsts Views
import DiagnoslesViewVue from "@/views/LabSpecialistDashboard/Diagnosles/DiagnoslesView.vue";
// Lap Specialest Edit
import EditDiagnosleVue from "@/views/LabSpecialistDashboard/Diagnosles/EditDiagnosle.vue";
// Doctor
import DoctorHomepageVue from "@/views/DoctorDashboard/DoctorHomepage.vue";
// Doctor Views
import DoctorPatientsVue from "@/views/DoctorDashboard/Patients/DoctorPatients.vue";
// Doctor Patient Info
import PatientInfoVue from "@/views/DoctorDashboard/Patients/PatientInfo.vue";
// Doctor Add Diagnosle
import AddDiagnoseleVue from "@/views/DoctorDashboard/Diagnsoeles/AddDiagnosele.vue";
// Doctor Edit Diagnosle
import EditDiagnoseleVue from "@/views/DoctorDashboard/Diagnsoeles/EditDiagnosele.vue";

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
  {
    path: "/Admin-Labs",
    name: "LaboratoriesView",
    component: LaboratoriesViewVue,
  },
  {
    path: "/Admin-Specialists",
    name: "LaboratorySpecialists",
    component: LaboratorySpecialistsVue,
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
  {
    path: "/Admin-Add-Labrotary",
    name: "AddLaprotary",
    component: AddLabrotaryVue,
  },
  {
    path: "/Admin-Add-Specialist",
    name: "AddSpecialist",
    component: AddSpecialistVue,
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
  {
    path: "/Admin-Edit-Labrotary",
    name: "EditLabrotary",
    component: EditLabrotaryVue,
  },
  {
    path: "/Admin-Edit-Specialist",
    name: "EditSpecialist",
    component: EditSpecialistVue,
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
  {
    path: "/Secretary-Add-Admission",
    name: "SecretaryAddAdmission",
    component: AddAdmission,
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
  {
    path: "/Secretary-Edit-Admission",
    name: "SecretaryEditAdmission",
    component: EditAdmission,
  },
  // Lab Vpecialist
  {
    path: "/Specialist-Homepage",
    name: "SpecialistHomepage",
    component: SpecialistHomepageVue,
  },
  // Lab Specialst Views
  {
    path: "/Specialist-Diagnosles",
    name: "SpecialistDiagnosles",
    component: DiagnoslesViewVue,
  },
  // Lap Specialist Edit
  {
    path: "/Specialist-Edit-Diagnosel",
    name: "EditDiagnosle",
    component: EditDiagnosleVue,
  },
  // Doctor
  {
    path: "/Doctor-Homepage",
    name: "DoctorHomepage",
    component: DoctorHomepageVue,
  },
  // Doctor Views
  {
    path: "/Doctor-Patients",
    name: "DoctorPatients",
    component: DoctorPatientsVue,
  },
  // Doctor Paitint Info
  {
    path: "/Patient-Info",
    name: "PatientInfo",
    component: PatientInfoVue,
  },
  // Doctor Add Diagnosle
  {
    path: "/Doctor-Add-Diagnosle",
    name: "AddDiagnosle",
    component: AddDiagnoseleVue,
  },
  // Doctor Edit Diagnosle
  {
    path: "/Doctor-Edit-Diagnosle",
    name: "EditDiagnosle",
    component: EditDiagnoseleVue,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
