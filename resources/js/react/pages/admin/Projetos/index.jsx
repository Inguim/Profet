import React from "react";
import { Container, Lista } from "./styles.js";


const Projetos = () => {


    return (
        <Container>
            <Lista>
                <h1>Projetos:</h1>
                <div>
                    <p style={{fontWeight: 'bold'}}>Profet</p>
                    <p>Participantes: Igor Azevedo, Gabriella Mantovani</p>
                    <p>Orientador: Lázaro</p>
                    <p>3° Série</p>
                    <div style={{justifyContent: 'space-between', width: '100%'}}>
                        <button type="button">Visualizar</button>
                        <div>
                            <button type="button">Aprovar</button>
                            <button type="button">Solicitar Alteração</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p style={{fontWeight: 'bold'}}>Projetos 2</p>
                    <p>Participantes: Igor Azevedo</p>
                    <p>Orientador: Ninguem :(</p>
                    <p>3° Série</p>
                    <div style={{justifyContent: 'space-between', width: '100%'}}>
                        <button type="button">Visualizar</button>
                        <div>
                            <button type="button">Aprovar</button>
                            <button type="button">Solicitar Alteração</button>
                        </div>
                    </div>
                </div>
            </Lista>
        </Container>
    );
};

export default Projetos;
