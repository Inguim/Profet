import React, { useEffect, useState, useCallback } from "react";
import { Container, Search, Button, Results } from "./styles.js";

import { SiVerizon } from 'react-icons/si';
import { BiSearchAlt } from 'react-icons/bi';

import api from "../../../services/api";
import { toast } from "react-toastify";

const NovoProjeto = () => {
    const [ nome, setNome ] = useState('');
    const [ resultados, setResultados] = useState([]);
    const list = [];

    async function searchOrientador(nome) {
        setResultados([]);
        const response = await api.get(`/professor/:${nome}`);
        setResultados(response.data.data);
    };

    function saveDocente(docente, select) {
        var aux = document.getElementById(select).value;
        if(aux) {
            list.push({
                docente,
                relacao: aux
            });
            setResultados(resultados.filter(resultado => resultado.id !== docente.id));
            toast.success(`Docente e sua relaçâo selecionadas para o projeto!`);
        } else {
            toast.warning('Selecione uma atuação para este docente');
        }
    }

    useEffect(() => {
        const aux = nome;
        if(aux.length > 3) {
            searchOrientador(nome);
        }
    }, [nome]);

    return (
        <Container>
            <Search>
                <h1>Pesquisar orientadores:</h1>
                <label htmlFor="nome">Nome:</label>
                <div>
                    <input type="text" value={nome} onChange={e => setNome(e.target.value)} />
                    <Button type="button" onClick={() => searchOrientador(nome)}>
                        <BiSearchAlt color="white" />
                    </Button>
                </div>
                <Results>
                    <h1>Docentes encontrados:</h1>
                    {resultados.map(item => (
                        <li key={item.id}>
                            <button type="button" onClick={() => saveDocente(item, `${item.name + item.id}`)}>
                                <SiVerizon color="#59C15D" />
                            </button>
                            {item.name}
                            <select id={`${item.name + item.id}`}>
                                <option value=''>Selecionar atuação</option>
                                <option value='orientador'>Orientador</option>
                                <option value='coordenador'>Coordenador</option>
                                <option value='coorientador'>Coorientador</option>
                            </select>
                        </li>
                    ))}
                </Results>
            </Search>

        </Container>
    );
};

export default NovoProjeto;
