import React from "react";
import { BrowserRouter } from "react-router-dom";

import { ToastContainer } from "react-toastify";
import GlobalStyle from './styles/global';
import Header from './components/Header';

import Routes from "./routes";

const App = () => {

    return (
        <BrowserRouter>
            <GlobalStyle />
            {!document.getElementById("projeto-area") && (
                <Header />
            )}
            <Routes />
            <ToastContainer
                autoClose={3000}
                closeOnClick
                rtl={false}
                draggable
            />
        </BrowserRouter>
    );
};

export default App;
