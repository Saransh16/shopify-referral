import api from "./api";
import baseService from "./BaseService";

const UserService = {
    list(query_params) {
        let url =
            api.listUsers() +
            "?" +
            new URLSearchParams(query_params).toString();
        return new Promise((res, rej) => {
            axios
                .get(url, {
                    headers: baseService.getAuthHeaders()
                })
                .then(
                    response => {
                        return res(response.data);
                    },
                    error => {
                        return rej(error);
                    }
                );
        });
    }
};

export default UserService;
