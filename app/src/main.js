import { createApp } from 'vue';
import App from './App.vue';
import PrimeVue from 'primevue/config';
import Button from "primevue/button";
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import Rating from 'primevue/rating';
import SelectButton from 'primevue/selectbutton';
import Textarea from 'primevue/textarea';
import InputMask from 'primevue/inputmask';
import Dropdown from 'primevue/dropdown';
import FileUpload from 'primevue/fileupload';
import VueSweetalert2 from 'vue-sweetalert2';
import DaylightIcon from './components/day-light-icon.vue';
import RatingForm from './components/rating-form.vue';
import LoginModal from './components/login-modal.vue';
import 'sweetalert2/dist/sweetalert2.min.css';

const app = createApp(App)

app.component('Prime-Switch-Button', SelectButton);
app.component('Prime-Button', Button);
app.component('Prime-Dialog', Dialog);
app.component('Prime-File-Upload', FileUpload);
app.component('Prime-Dropdown', Dropdown);
app.component('Prime-Rating', Rating);
app.component('Prime-Textarea', Textarea);
app.component('Prime-Input-Text', InputText);
app.component('Prime-InputMask', InputMask);
app.component('Login-Modal', LoginModal);
app.component('Day-Icon', DaylightIcon);
app.component('Rating-Form', RatingForm);

app.use(PrimeVue, {
    ripple: true
});

app.use({
    install: (e) => {
        e.config.globalProperties.$api = 'http://localhost:41062/www/public';
    }
});

app.use(VueSweetalert2);

app.mount('#app');
