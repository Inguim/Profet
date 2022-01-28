import api from "../../api";

class Projetos {
  index() {
   return api.get('projeto');
  }

  show(id) {
    return api.get(`projeto/${id}`);
  }

  store(data) {
    return api.post(`projeto`, data);
  }

  destroy(id) {
    return api.delete(`projeto/${id}`);
  }
}

export default new Projetos();
