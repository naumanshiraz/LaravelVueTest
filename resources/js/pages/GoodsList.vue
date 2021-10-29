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
                            <h1 class="text-2xl font-bold text-gray-700">Goods List</h1>

                            <div class="flex flex-col mt-4">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        ID
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Price
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                <tr v-for="good in goods" :key="good._id">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ good._id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ good.name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        ${{ good.price }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                        <router-link :to="{name: 'goods-edit', params: { id: good._id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1">Edit</router-link>
                                                        <button v-if="user.role === 'Admin'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="deleteProduct(good._id)">Delete</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    import Goods from "../apis/Goods";
    import navigationMenu from '../components/InnerMenu.vue'

    export default {
        components: {
            navigationMenu
        },
        data() {
            return {
                goods: [],
                user: [],
            }
        },
        created() {
            if (window.Laravel.user) {
                this.user = window.Laravel.user
            }

            Goods.list()
                .then(response => {
                    this.goods = response.data;
                });
        },
        methods: {
            deleteProduct(id) {
                Goods.delete(id)
                    .then(response => {
                        let i = this.goods.map(data => data.id).indexOf(id);
                        this.goods.splice(i, 1)
                    });
            }
        }
    };
</script>
