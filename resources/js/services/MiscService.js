import api from "./api";
import baseService from "./BaseService";

const MiscService = {

  getStates() {
    return new Promise((res, rej) => {
      axios.get(api.getStates(), {
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

export default MiscService;
