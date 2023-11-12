<template>
    <div class="w-screen h-screen px-3 grid">

        <div class="col-12 md:col-4 lg:col-3">
            <div class="w-full px-2 flex flex-column align-items-center justify-content-center surface-0 border-1 border-round border-300">
                <h4 class="py-3 w-full text-center m-0 border-bottom-1 border-300 mb-2">Admin Panel</h4>

                <Prime-Menu
                    :model="sidebar"
                    class="w-full border-none">

                    <template #item="{ item }">
                        <div
                            v-html="item.label"
                            @click="onChangeTab(item)"
                            :data-id="item.id"
                            :class="['p-3 cursor-pointer border-3xl text-center border-round-3xl', {
                                'bg-primary': (item.id == current)
                            }]">
                        </div>
                    </template>
                </Prime-Menu>
            </div>
        </div>

        <div class="col-12 md:col-8 lg:col-9">
            <div class="w-full p-3 flex flex-column align-items-center justify-content-center gap-2 surface-0 border-1 border-round border-300">
                dasboard
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminDashboard',
    data: () => ({
        current: 'commentcontroll',
        sidebar: [
            { id: 'commentcontroll', label: 'Comment Control' },
            { id: 'logout', label: 'Logout' }
        ]
    }),
    computed: {
        
    },
    methods: {
        doLogout: async function(){
            // const swalconfig = {
            //     showCancelButton: false,
            //     confirmButtonText: 'Close',
            //     confirmButtonClass: 'surface-600'
            // };

            await axios.post(`${ this.$api }/api/logout`);
                    
            // this.$store.commit('doAdminLogin', null);

            // this.$swal({
            //     title: 'Success',
            //     text: 'You have successfully logged out',
            //     icon: 'success',
            //     ...swalconfig
            // });

            // window.location.hash = '';
        },
        onChangeTab: function({ id }){
            this.current = id;

            if(id == 'logout'){
                this.doLogout();
            }
        }
    },
    mounted: function(){

    }
}
</script>