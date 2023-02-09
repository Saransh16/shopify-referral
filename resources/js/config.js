export const ENV = process.env.NODE_ENV;

export const DEAFULT_API_VERSION = "";
export const API_URL_LOCAL = "http://localhost:3000";
// export const API_URL_LOCAL = "http://notre-raffle.test:3000";
export const API_URL_STAGING =
    "https://bubbling-sydney-0utamys1fbed.vapor-farm-b1.com";
export const API_URL_PROD = "https://notreraffle.com";
export const RECAPTCHA_KEY_LOCAL = "6Lf_WgAVAAAAALOZgsJeuBczaxxXUongNCw0fX0j";
export const RECAPTCHA_KEY_STAGING = "";
export const RECAPTCHA_KEY_PROD = "";


export default {
    ENV,
    API_URL_PROD,
    API_URL_LOCAL,
    API_URL_STAGING,
    DEAFULT_API_VERSION,
    RECAPTCHA_KEY_LOCAL,
    RECAPTCHA_KEY_STAGING,
    RECAPTCHA_KEY_PROD
};
