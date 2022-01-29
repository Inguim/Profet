import api from "../../api";

class Membros {
  search(search, tipo) {
   return api.get(`/search/${search}/${tipo}`);
  }
}

export default new Membros();
