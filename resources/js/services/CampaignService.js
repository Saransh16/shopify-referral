import api from "./api";
import baseService from "./BaseService";

const CampaignService = {
    create(form_data) {
        return new Promise((res, rej) => {
            axios.post(api.createCampaign(), form_data, {}).then(
                response => {
                    return res(response.data);
                },
                error => {
                    return rej(error);
                }
            );
        });
    },

    listRaffleAdmin(query_params) {
        let url =
            api.listRaffleAdmin() +
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
    },

    list(query_params = {}) {
        let url =
            api.listRaffle() +
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
    },
    get(id) {
        return new Promise((res, rej) => {
            axios.get(api.getCampaign(id)).then(
                response => {
                    return res(response.data);
                },
                error => {
                    baseService.handleError(error);
                    return rej(error);
                }
            );
        });
    },
    update(id, form_data) {
        return new Promise((res, rej) => {
            axios.put(api.updateRaffle(id), form_data).then(
                response => {
                    return res(response.data);
                },
                error => {
                    baseService.handleError(error);
                    return rej(error);
                }
            );
        });
    },
    makeEntry(raffle_id, form_data) {
        return new Promise((res, rej) => {
            axios.post(api.makeEntry(raffle_id), form_data).then(
                response => {
                    return res(response.data);
                },
                error => {
                    baseService.handleError(error);
                    return rej(error);
                }
            );
        });
    },
    delete(raffle_id) {
        return new Promise((res, rej) => {
            axios.delete(api.deleteRaffle(raffle_id)).then(
                response => {
                    return res(response.data);
                },
                error => {
                    baseService.handleError(error);
                    return rej(error);
                }
            );
        });
    }
};

export default CampaignService;
