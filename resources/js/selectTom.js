import TomSelect from "tom-select";

// contoh inisialisasi global
new TomSelect("#pegawai", {
    create: false,
    maxItems: 1,
    sortField: {
        field: "text",
        direction: "asc",
    },
    onChange: function (value) {
        if (value) {
            this.control_input.setAttribute("readonly", "readonly");
        } else {
            this.control_input.removeAttribute("readonly");
        }
    },
});
