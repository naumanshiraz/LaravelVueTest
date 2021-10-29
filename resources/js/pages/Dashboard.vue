<template>
    <div class="home col-8 mx-auto py-5 mt-5">
        <div class="flex-1 flex flex-col overflow-hidden">
            <div class="flex">
                <nav class="flex w-72">
                    <div class="w-full flex mx-auto px-6 py-8">
                        <navigationMenu></navigationMenu>
                    </div>
                </nav>
                <main class="flex flex-col w-full bg-white overflow-x-hidden overflow-y-auto mb-14">
                    <div class="flex w-full mx-auto px-6 py-8">
                        <div class="flex flex-col w-full h-full text-gray-900 text-xl pt-4">
                            <h1 class="text-2xl font-bold text-gray-700">Dashboard</h1>

                            <div class="w-full h-60 mt-3" v-if="user">
                                <h3>Hello, {{ user.name }}</h3>
                                <span>{{ user.email }}</span>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    import User from "../apis/User";
    import navigationMenu from '../components/InnerMenu.vue'

    export default {
        components: {
            navigationMenu
        },
        data() {
            return {
                user: null
            };
        },
        mounted() {
            User.auth().then(response => {
                this.user = response.data;
            });
        },
        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        }
    };
</script>
