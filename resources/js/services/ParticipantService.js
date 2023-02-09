import api from "./api";
import baseService from "./BaseService";

const ParticipantService = {

  create(form_data) {
    return new Promise((res, rej) => {
      axios.post(api.createParticipant(), form_data, {}).then(
        response => {
          return res(response.data);
        },
        error => {
          return rej(error);
        }
      );
    });
  },

  joinCampaign(form_data, id) {

    return new Promise((res, rej) => {
      axios.post(api.joinCampaign(id), form_data, {}).then(
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

export default ParticipantService;
