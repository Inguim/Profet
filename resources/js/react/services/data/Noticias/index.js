import api from "../../api";

class Noticias {
  index() {
   return api.get('noticias');
  }

  store(data) {
    return api.post('noticias', data);
  }

  show(id) {
    return api.get(`noticias/${id}`);
  }

  update(id, data) {
    return api.put(`noticias/${id}`, data);
  }

  destroy(id, data) {
    return api.delete(`noticias/${id}`, data);
  }
}

export default new Noticias();
