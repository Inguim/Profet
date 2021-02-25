import React from "react";
import { BrowserRouter } from "react-router-dom";

import { ToastContainer, toast } from "react-toastify";
import GlobalStyle from './styles/global';
import Header from '../components/Header';

import Routes from "./routes";

const App = () => {
    toast.info(
        "Não recomenda-se a utilização de dispositivos movéis nessa área"
    );

    return (
        <BrowserRouter>
            <GlobalStyle />
            <Header />
            <Routes />
            <ToastContainer autoClose={3000} />
        </BrowserRouter>
    );
};

export default App;
