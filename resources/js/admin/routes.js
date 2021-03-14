import React from "react";
import { Switch, Route } from "react-router-dom";

import Noticias from "./pages/Noticias";
import Membros from "./pages/Membros";
import Projetos from "./pages/Projetos";
import VisualizarProjeto from "./pages/VisualizarProjeto";
import NovoProjeto from "./pages/NovoProjeto";

const Routes = () => {
  const route = process.env.MIX_APP_ROUTE;
  return (
    <Switch>
      <Route exact path={`${route}/administrativa/noticias`} component={Noticias} />
      <Route exact path={`${route}/administrativa/membros`} component={Membros} />
      <Route exact path={`${route}/administrativa/projetos`} component={Projetos} />
      <Route exact path={`${route}/administrativa/projetos/:id`} component={VisualizarProjeto} />
      <Route exact path={`${route}/projeto/novo`} component={NovoProjeto} />
    </Switch>
  );
};
export default Routes;
