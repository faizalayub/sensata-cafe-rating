import { createApp } from 'vue';
import App from './App.vue';
import PrimeVue from 'primevue/config';
import Button from "primevue/button";
import Rating from 'primevue/rating';
import SelectButton from 'primevue/selectbutton';
import Textarea from 'primevue/textarea';
import InputMask from 'primevue/inputmask';
import Dropdown from 'primevue/dropdown';
import FileUpload from 'primevue/fileupload';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const app = createApp(App)

app.component('Prime-Switch-Button', SelectButton);
app.component('Prime-Button', Button);
app.component('Prime-File-Upload', FileUpload);
app.component('Prime-Dropdown', Dropdown);
app.component('Prime-Rating', Rating);
app.component('Prime-Textarea', Textarea);
app.component('Prime-InputMask', InputMask);

app.use(PrimeVue, {
    ripple: true
});

app.use(VueSweetalert2);

app.mount('#app');
