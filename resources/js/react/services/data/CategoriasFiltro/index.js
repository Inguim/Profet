import api from "../../api";

class CategoriasFiltro {
  index(slug) {
    return api.get(`categoria/filter/${slug}`);
   }

  show(slug, paginate, section) {
   return api.get(`categoria/filter/${slug}/${section}/${paginate}`);
  }
}

export default new CategoriasFiltro();
