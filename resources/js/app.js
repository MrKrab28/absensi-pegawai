import "./jquery";

import "preline";

import "./bootstrap";
// import './bootstrap';
import "../../public/assets/js/sidebarmenu";
import 'flowbite';
import "./sweetalert";

import "./simplebar";
// import '.@tabler/tabler-icons';
// import "./datatable.js"
import DataTable from "datatables.net-dt";
// import 'datatables.net-responsive-dt';

let table = new DataTable("#example", {
    responsive: true,
});
