import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

if (document.getElementById("admin-area")) {
  ReactDOM.render(<App />, document.getElementById("admin-area"));
}
