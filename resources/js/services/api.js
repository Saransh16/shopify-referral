import config from "@/config";

const Base = {
    
    apiUrl: (version = config.DEAFULT_API_VERSION) => {
        let baseUrl = "";
        switch (config.ENV) {
            case "staging":
                baseUrl = config.API_URL_STAGING;
                break;
            case "production":
                baseUrl = config.API_URL_PROD;
                break;
            default:
                baseUrl = config.API_URL_LOCAL;
                break;
        }

        baseUrl += "/api/" + version;

        return baseUrl.replace(/\/$/, "");
    }
};

const API = {

    register: () => {
        return `${Base.apiUrl()}/register`;
    },
    login: () => {
        return `${Base.apiUrl()}/login`;
    },
    logout: () => {
        return `${Base.apiUrl()}/logout`;
    },
    getStates: id => {
        return `${Base.apiUrl()}/states`;
    },
    createCampaign: () => {
        return `${Base.apiUrl()}/campaigns/`;
    },
    createParticipant: () => {
        return `${Base.apiUrl()}/participants/`;
    },
    getCampaign: (id) => {
        return `${Base.apiUrl()}/campaigns/${id}`
    },
    joinCampaign: (id) => {
        return `${Base.apiUrl()}/participants/campaign/${id}`
    }
};

export default API;
