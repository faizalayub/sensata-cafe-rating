<template>
    <transition name="page">
        <component :is="currentPage"></component>
    </transition>
</template>

<script>
export default {
    data: () => ({
        currentPage: null,
    }),
    computed: {
        adminToken: function(){
            return this.$store.getters.adminToken;
        }
    },
    methods: {
        onChangeHash: async function(){
            let output;
            const $page = window.location.hash;

            switch($page){
                case '#admin':
                case '#admin-panel':
                    output = (this.adminToken ? 'Admin-Dashboard' : 'Admin-Login');
                break;
                default:
                    output = 'Rating-Form';
                break;
            }

            this.currentPage = output;
        }
    },
    mounted: function(){
        window.location.hash = '';
        
        window.addEventListener('hashchange', this.onChangeHash);

        this.onChangeHash();
    }
}
</script>

<style lang="scss">
    @import url('./main.scss');

    .page-enter-active,
    .page-leave-active{
        transition: all 350ms cubic-bezier(0, 0, 0.2, 1);
    }

    .page-enter-from{
        opacity: 0;
        margin-left: 100%;
    }

    .page-leave-to{
        position: absolute;
        opacity: 0;
        margin-left: -100%;
    }
</style>