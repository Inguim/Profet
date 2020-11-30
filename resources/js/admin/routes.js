import React from "react";
import { Switch, Route } from "react-router-dom";
import Noticias from "./pages/Noticias";

const Routes = () => {
  const route = process.env.MIX_APP_ROUTE;
  return (
    <Switch>
      <Route path={`${route}/noticias`} component={Noticias} />
    </Switch>
  );
};
export default Routes;
