import api from "./api";
import baseService from "./BaseService";

const AuthService = {
    register(user,company) {
        return new Promise((res, rej) => {
            axios.post(api.register(), 
                {
                    first_name: user.first_name,
                    last_name: user.last_name,
                    email: user.email,
                    password: user.password,
                    phone_number: user.phone_number,
                    company_name: company.name,
                    street_address: company.address,
                    city: company.city,
                    state: company.state,
                    country: company.country,
                    zip: company.zip,
                },            
                {})
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

    login(form_data) {
        return new Promise((res, rej) => {
            axios.post(api.login(),
            {
                email: form_data.email,
                password: form_data.password
            }, 
            {}).then(
                response => {
                    return res(response.data);
                },
                error => {
                    return rej(error);
                }
            );
        });
    },


    logout() {
        return new Promise((res, rej) => {
            axios.post(api.logout(), {}, {}).then(
                response => {
                    return res(response.data);
                },
                error => {
                    return rej(error);
                }
            );
        });
    },
};

export default AuthService;
