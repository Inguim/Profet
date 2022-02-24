import api from "../../api";

class Contribuidores {
  index() {
   return api.get('contribuidores');
  }
}

export default new Contribuidores();
