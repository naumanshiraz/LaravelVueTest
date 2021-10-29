import Api from "./Api";
import Csrf from "./Csrf";

export default {
    list() {
        return Api.get("/goods");
    },

    async add(form) {
        await Csrf.getCookie();

        return Api.post("/goods/add", form);
    },

    async getOne(id) {
        return Api.get("/goods/edit/" + id);
    },

    async update(id, form) {
        await Csrf.getCookie();

        return Api.post("/goods/update/" + id, form);
    },

    async delete(id) {
        await Csrf.getCookie();

        return Api.delete("/goods/delete/" + id);
    }
};
