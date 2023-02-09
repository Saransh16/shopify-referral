const BaseService = {
    getToken() {
        return localStorage.getItem("auth_token");
    },

    getAuthHeaders() {
        return {
            Authorization: "Bearer " + localStorage.getItem("auth_token")
        };
    },

    handleError(error) {
        let response = error.response;

        // if (response && response.status) {
        //     switch (response.status) {
        //         case 401:
        //             window.location.href = "/login";
        //             break;
        //         case 404:
        //             window.location.href = "/404";
        //             break;
        //         default:
        //             break;
        //     }
        // }
    }
};

export default BaseService;
