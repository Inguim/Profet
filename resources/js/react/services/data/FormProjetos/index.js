import api from "../../api";

class FormProjetos {
  index() {
   return api.get('projetos');
  }

  store(data) {
    return api.post(`projetos`, data);
  }

  destroy(id, data) {
    return api.delete(`projetos/${id}`);
  }
}

export default new FormProjetos();
