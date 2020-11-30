import React from "react";
import { BrowserRouter } from "react-router-dom";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.min.css";

import Routes from "./routes";

const App = () => {
  return (
    <BrowserRouter>
      <Routes />
      <ToastContainer autoClose={2000} />
    </BrowserRouter>
  );
};

export default App;
