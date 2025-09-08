import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

window.toast = function (
    message,
    type = "default",
    action = null,
    duration = 3500
) {
    let bgColor, iconHTML;

    switch (type) {
        case "success":
            bgColor = "linear-gradient(to right, #28a745, #71dd8a)";
            if (action === "add") {
                iconHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>`;
            } else if (action === "delete") {
                iconHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>`;
            } else {
                iconHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>`;
            }
            break;

        case "error":
            bgColor = "linear-gradient(to right, #dc3545, #ff7f7f)";
            iconHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>`;
            break;

        case "info":
            bgColor = "linear-gradient(to right, #17a2b8, #6ad0e5)";
            iconHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z"/>
                        </svg>`;
            break;

        default:
            bgColor = "linear-gradient(to right, #333, #555)";
            iconHTML = "";
    }

    Toastify({
        node: (() => {
            const span = document.createElement("span");
            span.innerHTML = iconHTML + message;
            return span;
        })(),
        duration: duration,
        // close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: { background: bgColor },
        offset: { x: 20, y: 20 },
        className: "toastify-toast",
    }).showToast();
};
