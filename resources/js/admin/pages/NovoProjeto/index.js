import React, { useEffect, useState, useCallback } from "react";
import { Container, Search, Button, Results } from "./styles.js";

import { SiVerizon } from 'react-icons/si';
import { BiSearchAlt } from 'react-icons/bi';

import FormProjeto from "../../../components/FormProjeto/index.js";

import api from "../../../services/api";
import { toast } from "react-toastify";


const NovoProjeto = () => {
    const [ search, setSearch ] = useState('');
    const [ resultados, setResultados] = useState([]);
    const [ participantes, setParticipantes ] = useState([]);
    const [ tipo, setTipo ] = useState("aluno");

    async function searchMembro(search) {
        const response = await api.get(`/search/${search}/${tipo}`);

        // if(response.data.data.length === 1 && (resultados.length === 0 || resultados.indexOf(response.data.data[0]) === -1)) {
        //     setResultados([...resultados, response.data.data[0]]);
        // }

        if(response.data.data.length === 1 && resultados.length === 0) {
            setResultados([response.data.data[0]]);
        } else if (response.data.data.length != 0 && resultados.length >= 1) {
            if(! resultados.find(item => item.id === response.data.data[0].id))
                setResultados([...resultados, response.data.data[0]]);
        }

    };


    function saveMembro(membro, select) {
        var aux = document.getElementById(select).value;

        if(aux) {
            if(participantes.length === 0) {
                setParticipantes([
                    ...participantes,
                    { membro, relacao: aux }
                ]);
                toast.info(`Membro e sua relaçâo selecionadas para o projeto!`);
            } else {
                if(! participantes.find(element => element.membro.id === membro.id)) {
                    setParticipantes([
                        ...participantes,
                        { membro, relacao: aux }
                    ]);
                    toast.info(`Membro e sua relaçâo selecionadas para o projeto!`);
                } else {
                    toast.warning('Você ja selecionou esse membro');
                }
            }
        } else {
            toast.warning('Selecione uma atuação para este membro');
        }
    }

    function deleteParticipante(id) {
        setParticipantes(participantes.filter(item => item.membro.id !== id));
        toast.info('Membro retirado.');
    }

    function updateTipo(value) {
        setTipo(value);
        setResultados([]);
    }
    useEffect(() => {
        const aux = search;
        if(aux.length > 3) {
            searchMembro(search);
        }
    }, [search]);


    return (
        <Container>
            <Search>
                <h1>Pesquisar participantes:</h1>
                <section>
                    <label htmlFor="tipo">Pesquisar por:</label>
                    <select id="tipo" onChange={() => updateTipo(document.getElementById('tipo').value)}>
                        <option value="aluno">Aluno</option>
                        <option value="professor">Professor</option>
                    </select>
                </section>
                <label htmlFor="nome">Nome:</label>
                <div>
                    <input type="search" value={search} onChange={e => setSearch(e.target.value)} />
                    <Button type="button" onClick={() => searchMembro(search)}>
                        <BiSearchAlt color="white" />
                    </Button>
                </div>
                <Results>
                    <h1>Usuários encontrados:</h1>
                    {resultados.map((item) => (
                        <li key={item.id}>
                            <button type="button" onClick={() => saveMembro(item, `${item.name + item.id}`)}>
                                <SiVerizon color="#59C15D" />
                            </button>
                            {item.name}

                                {tipo === "professor" ?
                                    <select id={`${item.name + item.id}`}>
                                        <option value=''>Selecionar atuação</option>
                                        <option value='orientador'>Orientador</option>
                                        <option value='coordenador'>Coordenador</option>
                                        <option value='coorientador'>Coorientador</option>
                                    </select>
                                :
                                <select id={`${item.name + item.id}`}>
                                    <option value=''>Selecionar atuação</option>
                                    <option value='bolsista'>Bolsista</option>
                                    <option value='voluntario'>Voluntário</option>
                                </select>
                                }


                        </li>
                    ))}
                </Results>
            </Search>
            <FormProjeto participantes={participantes} deleteParticipante={deleteParticipante} />
        </Container>
    );
};

export default NovoProjeto;
