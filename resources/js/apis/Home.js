import Api from "./Api";
import Csrf from "./Csrf";

export default {
    async list() {
        return Api.get("/goods-list");
    },
};
