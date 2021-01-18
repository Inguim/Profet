import React from "react";
import { Switch, Route } from "react-router-dom";
import Noticias from "./pages/Noticias";
import Membros from "./pages/Membros";

const Routes = () => {
  const route = process.env.MIX_APP_ROUTE;
  return (
    <Switch>
      <Route exact path={`${route}/administrativa/noticias`} component={Noticias} />
      <Route exact path={`${route}/administrativa/membros`} component={Membros} />
    </Switch>
  );
};
export default Routes;
