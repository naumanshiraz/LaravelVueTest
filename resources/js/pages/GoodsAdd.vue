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
                            <h1 class="text-2xl font-bold text-gray-700">Add New Goods</h1>

                            <div class="w-full max-w-xl mt-4">
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="addGood">
                                    <div class="mb-4">
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Add Good Title" v-model="form.name">
                                    </div>
                                    <div class="mb-6">
                                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Add Description" v-model="form.description"></textarea>
                                    </div>
                                    <div class="mb-6">
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="Add Price" v-model="form.price">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
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
    import Goods from "../apis/Goods";

    export default {
        components: {
            navigationMenu
        },
        data() {
            return {
                form: {
                    name: "",
                    description: "",
                    price: "",
                },
                errors: []
            }
        },
        mounted() {

        },
        methods: {
            addGood() {
                Goods.add(this.form)
                    .then((response) => {
                        this.$router.push({ name: 'GoodsList' });
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        },
        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        }
    };
</script>
