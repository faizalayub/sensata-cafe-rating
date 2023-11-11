<template>
    <div class="max-w-25rem w-screen p-3">
        <div class="w-full h-full p-3 flex flex-column align-items-center justify-content-center gap-2 surface-0 border-1 border-round-xl border-300 shadow-3">

            <h3 class="w-full text-center mt-0">Admin Login</h3>

            <div class="flex flex-column gap-2 w-full">
                <label for="admin-email">Email</label>
                <Prime-Input-Text type="text" id="admin-email" v-model="isEmail" />
            </div>

            <div class="flex flex-column gap-2 w-full">
                <label for="admin-password">Password</label>
                <Prime-Input-Text type="password" id="admin-password" v-model="isPassword" />
            </div>

            <div v-if="emptyform" class="flex flex-column gap-2 w-full text-red-600 text-sm">
                <template v-if="(isEmail == null || isEmail == '')">Please enter email</template>
                <template v-else-if="(isPassword == null || isPassword == '')">Please enter password</template>
            </div>

            <div class="flex align-items-center justify-content-center gap-2 w-full mt-3">
                <Prime-Button @click="goBack" label="Cancel" severity="secondary" :loading="isLoading"></Prime-Button>
                <Prime-Button @click="doLogin" label="Login" severity="primary" :loading="isLoading"></Prime-Button>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminLogin',
    data: () => ({
        isLoading: false,
        isEmail: null,
        isPassword: null
    }),
    computed: {
        emptyform: function(){
            if(this.isEmail == null || this.isEmail == ''){
                return true;
            }

            if(this.isPassword == null || this.isPassword == ''){
                return true;
            }

            return false;
        }
    },
    methods: {
        goBack: function(){
            window.location.hash = '#evaluate';
        },
        doLogin: async function(){
            const swalconfig = {
                showCancelButton: false,
                confirmButtonText: 'Close',
                confirmButtonClass: 'surface-600'
            };
            
            try {
                if(!this.emptyform){
                    this.isLoading = true;

                    const { data: response = {} } = await axios.post(`${ this.$api }/api/login`, {
                        email: this.isEmail,
                        password: this.isPassword
                    });

                    this.isLoading = false;
                    
                    this.$store.commit('doAdminLogin', response.token);

                    this.$swal({
                        title: 'Success',
                        text: 'You have successfully logged in',
                        icon: 'success',
                        ...swalconfig
                    });

                    window.location.hash = '#admin-panel';
                }
            }catch(e){
                this.$swal({
                    title: 'Invalid credentials',
                    text: 'Sorry, you have entered invalid credentials, please try again',
                    icon: 'error',
                    ...swalconfig
                });

                this.isLoading = false;
            }
        }
    },
    mounted: function(){

    }
}
</script>