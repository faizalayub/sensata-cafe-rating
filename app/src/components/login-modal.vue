<template>
    <Prime-Dialog
        v-model:visible="showModal"
        class="surface-0"
        contentClass="px-3 pt-3 border-top-1 border-200"
        position="center"
        :modal="true"
        :maximizable="false"
        :closable="false"
        :draggable="false"
        :header="'Admin Login'">

        <div class="flex flex-column gap-2">
            <label for="admin-username">Username</label>
            <Prime-Input-Text type="text" id="admin-username" v-model="isUsername" />
        </div>

        <div class="flex flex-column gap-2 mt-2">
            <label for="admin-password">Password</label>
            <Prime-Input-Text type="password" id="admin-password" v-model="isPassword" />
        </div>

        <div v-if="emptyform" class="flex flex-column gap-2 mt-2 text-red-600 text-sm">
            <template v-if="(isUsername == null || isUsername == '')">Please enter username</template>
            <template v-else-if="(isPassword == null || isPassword == '')">Please enter password</template>
        </div>
        
        <template #footer>
            <Prime-Button @click="close" label="Cancel" severity="secondary" :loading="isLoading"></Prime-Button>
            <Prime-Button @click="login" label="Login" severity="primary" :loading="isLoading"></Prime-Button>
        </template>
    </Prime-Dialog>
</template>

<script>
export default {
    name: 'LoginModal',
    data: () => ({
        showModal: false,
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
        open: function(){
            this.showModal = true;
        },
        close: function(){
            this.showModal = false;
        },
        login: async function(){
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