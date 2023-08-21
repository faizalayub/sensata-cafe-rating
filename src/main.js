import { createApp } from 'vue';
import App from './App.vue';
import PrimeVue from 'primevue/config';
import Button from "primevue/button";
import Rating from 'primevue/rating';
import Textarea from 'primevue/textarea';

const app = createApp(App)

app.component('Prime-Button', Button);
app.component('Prime-Rating', Rating);
app.component('Prime-Textarea', Textarea);

app.use(PrimeVue, {
    ripple: true
});
app.mount('#app');
