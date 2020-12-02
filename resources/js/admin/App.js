import React from "react";
import { BrowserRouter } from "react-router-dom";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.min.css";

import Routes from "./routes";

const App = () => {
    toast.info(
        "Não recomenda-se a utilização de dispositivos movéis nessa área"
    );

    return (
        <BrowserRouter>
            <Routes />
            <ToastContainer autoClose={3000} />
        </BrowserRouter>
    );
};

export default App;
