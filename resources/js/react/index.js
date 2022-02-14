import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

if (document.getElementById("admin-area")) {
  ReactDOM.render(<App />, document.getElementById("admin-area"));
} else if (document.getElementById("projeto-area")) {
  ReactDOM.render(<App />, document.getElementById("projeto-area"));
} else if (document.getElementById("categoria-react-area")) {
  ReactDOM.render(<App />, document.getElementById("categoria-react-area"));
}
