<template>
    <navigationMenu></navigationMenu>
    <div class="container mx-auto mt-5">
        <router-view></router-view>
    </div>
</template>

<script>
    import navigationMenu from './Menu.vue'
    export default {
        components: {
            navigationMenu
        }
    }
</script>

<style scoped>

</style>
