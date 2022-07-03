import "./bootstrap";
import Vue from "vue";
// import "";
// wrapper;
// import NotificationDropdown from "./components/NotificationDropdown.vue";
import NotifikasiDropdown from "./components/NotificationDropdown.vue";
// Vue.component(
//     "NotifikasiDropdown",
//     require("./components/NotificationDropdown.vue")
// );

new Vue({
    el: "#app2",

    components: {
        NotifikasiDropdown,
    },
});
