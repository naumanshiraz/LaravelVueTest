<template>
    <div class="home col-5 mx-auto py-5 mt-5">
        <h1 class="text-2xl font-bold text-gray-700">Login</h1>

        <div class="w-full max-w-xs mt-4">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.email" id="email" type="text" placeholder="Email">
                    <span class="text-danger" v-if="errors.email">
                        {{ errors.email[0] }}
                    </span>
                </div>

                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.password" id="password" type="password" placeholder="Password">
                    <span class="text-danger" v-if="errors.password">
                        {{ errors.password[0] }}
                    </span>
                </div>

                <button type="submit" @click.prevent="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Login
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import User from "../apis/User";
    export default {
        data() {
            return {
                form: {
                    email: "",
                    password: ""
                },
                errors: []
            };
        },
        methods: {
            login() {
                User.login(this.form)
                    .then((response) => {
                        this.$root.$emit("login", true);
                        this.$router.push({ name: "Dashboard" });
                    })
                    .catch(error => {
                        /*if (error.status === 422) {
                            this.errors = error.data.errors;
                        }*/
                    });
            }
        },
        beforeRouteEnter(to, from, next) {
            if (window.Laravel.isLoggedin) {
                return next('dashboard');
            }
            next();
        }
    };
</script>
