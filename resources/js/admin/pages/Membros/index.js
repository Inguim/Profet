import React from "react";
import { Container, Lista } from "./styles.js";


const Membros = () => {


    return (
        <Container>
            <Lista>
                <h1>Aluno:</h1>
                <div>
                    <p>Igor Azevedo</p>
                    <p>igor@gmail.com</p>
                    <p>Informática</p>
                    <p>3° Série</p>
                    <div>
                        <button type="button" >Aprovar</button>
                        <button type="button" >Remover</button>
                    </div>
                </div>
            </Lista>
            <Lista>
                <h1>Professor:</h1>
                <div>
                    <p>Lázaro</p>
                    <p>lazaro@gmail.com</p>
                    <p>Professor de Aplicações Web</p>
                    <div>
                        <button type="button" >Aprovar</button>
                        <button type="button" >Remover</button>
                    </div>
                </div>
            </Lista>
        </Container>
    );
};

export default Membros;
