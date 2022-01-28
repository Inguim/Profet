import React from "react";
import { Switch, Route } from "react-router-dom";

import Noticias from "./pages/admin/Noticias";
import Membros from "./pages/admin/Membros";
import Projetos from "./pages/admin/Projetos";
import VisualizarProjeto from "./components/VisualizarProjeto";
import NovoProjeto from "./pages/public/NovoProjeto";

const Routes = () => {
  const route = process.env.MIX_APP_ROUTE;
  return (
    <Switch>
      <Route exact path={`${route}/administrativa/noticias`} component={Noticias} />
      <Route exact path={`${route}/administrativa/membros`} component={Membros} />
      <Route exact path={`${route}/administrativa/projetos`} component={Projetos} />
      <Route exact path={`${route}/projeto/novo`} component={NovoProjeto} />
    </Switch>
  );
};
export default Routes;
