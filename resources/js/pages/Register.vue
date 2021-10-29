<template>
    <div class="home col-5 mx-auto py-5 mt-5">
        <h1 class="text-2xl font-bold text-gray-700">Register</h1>

        <div class="w-full max-w-xs mt-4">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="form.name" id="name" type="text" placeholder="Full Name">
                    <span class="text-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                    </span>
                </div>

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

                <div class="mb-4">
                    <div class="inline-block relative w-64">
                        <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" v-model="form.role" id="role">
                            <option>Select Any</option>
                            <option value="User">User</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" @click.prevent="register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Register
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
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                },
                errors: []
            };
        },
        methods: {
            register() {
                User.register(this.form)
                    .then(() => {
                        this.$router.push({name: "Login"});
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
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
