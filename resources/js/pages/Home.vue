<template>
    <main class="flex flex-col w-full bg-white overflow-x-hidden overflow-y-auto mb-14">
        <div class="flex w-full mx-auto py-8">
            <h1 class="text-2xl font-bold text-gray-700">Goods</h1>
        </div>

        <div class="flex flex-wrap overflow-hidden md:-mx-2 lg:-mx-2 xl:-mx-2">
            <div class="w-full overflow-hidden md:my-2 md:px-2 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 "  v-for="good in goods">
                <div class="rounded-md border-solid border-2 px-2 py-2">
                    <h3 class="text-xl font-semibold"> {{ good.name }}</h3>
                    <p class="text-gray-400 py-2"> {{ good.description }}</p>
                    <p class="text-blue-400"> ${{ good.price }}</p>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import Home from "../apis/Home";

    export default {
        name: "App",
        data: function() {
            return {
                goods: []
            }
        },
        mounted: function() {
            this.loadGoods();
        },
        methods: {
            loadGoods: function() {
                Home.list()
                .then((response) => {
                    this.goods = response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
