<template>
    <div class="h-full w-48 px-4 border-r bg-white mt-4">
        <div class="h-3/4 flex flex-col text-gray-500">
            <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                <router-link to="/dashboard" class="hover:text-black transition duration-200 ease-linear">Dashboard</router-link>
            </h3>
            <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                <router-link to="/goods-list" class="hover:text-black transition duration-200 ease-linear">Goods List</router-link>
            </h3>
            <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                <router-link to="/goods-add" class="hover:text-black transition duration-200 ease-linear">Add New Goods</router-link>
            </h3>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                isLoggedIn: false,
            }
        },
        created() {

        },
        methods: {

        },
        mounted() {
            //
        }
    }
</script>
