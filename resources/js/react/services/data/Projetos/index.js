import api from "../../api";

class Projetos {
  index() {
   return api.get('projeto');
  }

  show(id) {
    return api.get(`projeto/${id}`);
  }

  update(id, status) {
    return api.put(`projeto/${id}`, status);
  }

  destroy(id) {
    return api.delete(`projeto/${id}`);
  }
}

export default new Projetos();
