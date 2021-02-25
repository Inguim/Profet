import React, { useEffect, useState } from "react";
import { Container, ListaAluno, ListaProfessor } from "./styles.js";

import api from "../../../services/api";
// import { toast } from "react-toastify";

const Membros = () => {
    const [professor, setProfessor] = useState([]);
    const [aluno, setAluno] = useState([]);

    async function loadUsers() {
        const response = await api.get('membros');

        const { alunos, professores } = response.data.data;

        console.log(response.data.data.professores)
        setProfessor(professores);
        setAluno(alunos);
    }

    useEffect(() => {
        loadUsers();
    }, [])


    return (
        <Container>
            <ListaAluno>
                <h1>Aluno:</h1>
                {
                    aluno.map(item => (
                        <div key={item.id}>
                            <p>{item.user.name}</p>
                            <p>{item.curso.curso}</p>
                            <p>{item.serie.serie}° Série</p>
                            <div>
                                <button type="button" >Aprovar</button>
                                <button type="button" >Remover</button>
                            </div>
                        </div>
                    ))
                }
            </ListaAluno>
            <ListaProfessor>
                <h1>Professor:</h1>
                {
                    professor.map(item => (
                        <section key={item.id}>
                            <div style={{ marginBottom: '5px' }} className="prof-header">
                                <p><span style={{ color: 'black', fontWeight: 'bold' }}>{item.user.name}:</span> {item.user.email}</p>
                                <div>
                                    <button type="button" >Aprovar</button>
                                    <button type="button" >Remover</button>
                                </div>
                            </div>
                            <p style={{ color: 'black', marginBottom: '0px' }}>Categorias:</p>
                            <div  className="categorias">
                                {
                                    item.categorias.map(cat => (
                                        <p key={cat.id}>{cat.nome}</p>
                                    ))
                                }
                            </div>
                        </section>
                    ))
                }
            </ListaProfessor>
        </Container>
    );
};

export default Membros;
