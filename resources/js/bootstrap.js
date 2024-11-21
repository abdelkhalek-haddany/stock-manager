import Pusher from "pusher-js";
window.Pusher = Pusher;

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY, // Use the correct environment variable name
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER, // Match the Laravel convention
    forceTLS: true,
});

window.Echo.channel("stock-updates").listen("StockUpdated", (e) => {
    alert(e.product.name + " stock is below minimum!");
});
