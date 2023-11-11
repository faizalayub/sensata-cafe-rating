<template>
    <div class="max-w-25rem w-screen p-3">
        <div class="w-full h-full p-3 flex flex-column align-items-center justify-content-center gap-2 surface-0 border-1 border-round-xl border-300 shadow-3">

            <h3 class="w-full text-center mt-0">Admin Login</h3>

            <div class="flex flex-column gap-2 w-full">
                <label for="admin-username">Username</label>
                <Prime-Input-Text type="text" id="admin-username" v-model="isUsername" />
            </div>

            <div class="flex flex-column gap-2 w-full">
                <label for="admin-password">Password</label>
                <Prime-Input-Text type="password" id="admin-password" v-model="isPassword" />
            </div>

            <div v-if="emptyform" class="flex flex-column gap-2 w-full text-red-600 text-sm">
                <template v-if="(isUsername == null || isUsername == '')">Please enter username</template>
                <template v-else-if="(isPassword == null || isPassword == '')">Please enter password</template>
            </div>

            <div class="flex align-items-center justify-content-center gap-2 w-full">
                <Prime-Button @click="goBack" label="Cancel" severity="secondary" :loading="isLoading"></Prime-Button>
                <Prime-Button @click="doLogin" label="Login" severity="primary" :loading="isLoading"></Prime-Button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminLogin',
    data: () => ({
        isLoading: false,
        isUsername: null,
        isPassword: null
    }),
    computed: {
        emptyform: function(){
            if(this.isUsername == null || this.isUsername == ''){
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
            try {
                if(!this.emptyform){
                    console.clear();
                    console.log('yay');
                }
            } catch (e) {
                console.error(e);
            }
        }
    }
}
</script>