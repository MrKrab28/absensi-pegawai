import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    server: {
        host: "0.0.0.0", // biar bisa diakses dari device lain (HP)
        port: 5173, // default port Vite
        strictPort: true, // pakai port fix
        hmr: {
            host: "192.168.1.15", // ganti dengan IP PC kamu (hasil ipconfig)
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
