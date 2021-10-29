<template>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-white">Logo Image</span>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <router-link to="/" class="text-white px-3 py-2 rounded-md text-sm font-medium">Home</router-link>
                            <router-link to="/about" class="text-white px-3 py-2 rounded-md text-sm font-medium">About Us</router-link>
                            <router-link to="/login" v-if="!isLoggedIn" class="text-white px-3 py-2 rounded-md text-sm font-medium">Login</router-link>
                            <router-link to="/register" v-if="!isLoggedIn" class="text-white px-3 py-2 rounded-md text-sm font-medium">Register</router-link>
                            <router-link to="/dashboard" v-if="isLoggedIn" class="text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</router-link>
                            <a style="cursor: pointer;" v-if="isLoggedIn" @click="logout" class="text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>
            </div>
        </div>
    </nav>
</template>
<script>
    import User from "../apis/User";

    export default {
        data() {
            return {
                isLoggedIn: false,
            }
        },
        created() {
            if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        },
        methods: {
            logout(e) {
                User.logout()
                    .then((response) => {
                       if(response.data.message) {
                           window.location.href = "/"
                       }
                    })
            }
        },
        mounted() {
            //
        }
    }
</script>
