import api from "../../api";

class Usuarios {
  index() {
   return api.get('membros');
  }

  update(id, data) {
    return api.put(`membros/${id}`, data);
  }

  destroy(id, data) {
    return api.delete(`membros/${id}`);
  }
}

export default new Usuarios();
