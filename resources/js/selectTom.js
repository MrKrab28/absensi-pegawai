import TomSelect from "tom-select";
// import "tom-select/dist/css/tom-select.css";

// otomatis cari semua select yang punya data-tom="true"
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("select[data-tom='true']").forEach((el) => {
        new TomSelect(el, {
            create: false,
            maxItems: el.hasAttribute("multiple") ? null : 1,
            sortField: {
                field: "text",
                direction: "asc",
            },
            placeholder: el.getAttribute("placeholder") || "Pilih...",
            onChange: function (value) {
                if (!el.hasAttribute("multiple")) {
                    if (value) {
                        this.control_input.setAttribute("readonly", "readonly");
                    } else {
                        this.control_input.removeAttribute("readonly");
                    }
                }
            },
        });
    });
});
