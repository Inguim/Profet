import api from "../../api";

class Solicitacao {
  index() {
   return api.get('solicitacao');
  }

  store(data) {
    return api.post('solicitacao', data);
  }

  show(id) {
    return api.get(`solicitacao/${id}`);
  }

  update(id, data) {
    return api.put(`solicitacao/${id}`, data);
  }

  destroy(id, data) {
    return api.delete(`solicitacao/${id}`, data);
  }
}

export default new Solicitacao();
