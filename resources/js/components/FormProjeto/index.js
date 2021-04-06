import React, { useEffect, useState } from 'react';
import { useHistory } from 'react-router-dom';
import {
    Form,
    Participantes,
    ProjetoDados,
    CampoGrupo,
    Button,
    ErrorMessage
} from './styles';

import { IoMdClose } from 'react-icons/io';

import api from '../../services/api';
import { useForm } from 'react-hook-form';
import { toast } from 'react-toastify';


const FormProjeto = (props) => {
    const { register, handleSubmit, errors } = useForm();
    const [ estadosProj, setEstadoProj ] = useState([]);
    const [ users, setUsers ] = useState([]);
    const [ categoriaProj, setCategoriasProj ] = useState([]);
    const history = useHistory();

    const inputFormat = {
        border: '2px solid red',
        backgroundColor: 'rgb(255, 204, 204)'
    }

    async function handleLoadForm() {
        const response = await api.get('projetos');

        const { estados, categorias } = response.data.data;

        setEstadoProj(estados);
        setCategoriasProj(categorias);
    }

    const onSubmit = async (data) => {
        data.users = [];
        users.map(item => {
            data.users.push({ user_id: item.membro.id, relacao: item.relacao});
        });
        if(data.estado_id !== "3") {

            const response = await api.post('projetos', data);

            if(! response.data.data.erro) {
                toast.success('Projeto inserido com sucesso!');
                window.location.href="/home";
            } else {
                toast.error(response.data.data.msg);
            }
        } else {
            toast.warning('Seu projeto precisa de membros para ser cadastrado');
        }

    }

    useEffect(() =>{
        handleLoadForm();
    }, []);

    useEffect(() =>{
        setUsers(props.participantes);
    }, [props.participantes]);

    return (
        <Form method='POST' onSubmit={handleSubmit(onSubmit)} action="/home">
            <Participantes>
                <h1>Participantes:</h1>
                {users.map((item) => (
                    <li key={item.membro.id}>
                        <button type="button" onClick={() => props.deleteParticipante(item.membro.id)}>
                            <IoMdClose color="#c15959" />
                        </button>
                        <div>
                            <p>Nome: <span>{item.membro.name}</span></p>
                            <p>Atuação: <span>{item.relacao}</span></p>
                        </div>
                    </li>
                ))}
            </Participantes>
            <ProjetoDados>
                <CampoGrupo>
                    <label>
                        Nome do projeto:
                        <input
                            placeholder="Tamanho máximo de 100 caracteres"
                            name="nome"
                            ref={register({
                                required: { value: true, message: "O projeto precisa de um nome!" },
                                maxLength: { value: 100, message: "Tamanho máximo de 100 caracteres!" }
                            })}
                            type="text"
                            style={errors.nome && {...inputFormat}}
                        />
                        {errors.nome && <ErrorMessage>{errors.nome.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label htmlFor="atuacao_escritor">Sua atuação:</label>
                    <select
                        id="atuacao_escritor"
                        name="atuacao_escritor"
                        ref={register({required: { value: true, message: "Escolha uma opção!" }})}
                        style={errors.atuacao_escritor && {...inputFormat}}
                    >
                        <option></option>
                        <option value='orientador'>Orientador</option>
                        <option value='coordenador'>Coordenador</option>
                        <option value='coorientador'>Coorientador</option>
                        <option value='bolsista'>Bolsista</option>
                        <option value='voluntario'>Voluntario</option>
                    </select>
                    {errors.atuacao_escritor && <ErrorMessage>{errors.atuacao_escritor.message}</ErrorMessage>}
                </CampoGrupo>
                <CampoGrupo>
                    <label htmlFor="estado_id">Estado de desenvolvimento atual:</label>
                    <select
                        id="estado_id"
                        name="estado_id"
                        ref={register({required: { value: true, message: "Escolha uma opção!" }})}
                        style={errors.estado_id && {...inputFormat}}
                    >
                        <option></option>
                        {estadosProj.map(item => (
                            <option key={item.id} value={item.id}>{item.estado}</option>
                        ))}
                    </select>
                    {errors.estado_id && <ErrorMessage>{errors.estado_id.message}</ErrorMessage>}
                </CampoGrupo>
                <CampoGrupo>
                    <label htmlFor="categoria_id">Em qual categoria o projeto se enquadra:</label>
                    <select
                        id="categoria_id"
                        name="categoria_id"
                        ref={register({required: { value: true, message: "Escolha uma opção!" }})}
                        style={errors.categoria_id && {...inputFormat}}
                    >
                        <option></option>
                        {categoriaProj.map(item => (
                            <option key={item.id} value={item.id}>{item.nome}</option>
                        ))}
                    </select>
                    {errors.categoria_id && <ErrorMessage>{errors.categoria_id.message}</ErrorMessage>}
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Resumo:
                        <textarea
                            placeholder="Faça um breve resumo sobre o projeto"
                            name="resumo"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.resumo && {...inputFormat}}
                        />
                        {errors.resumo && <ErrorMessage>{errors.resumo.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Introdução:
                        <textarea
                            name="introducao"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.introducao && {...inputFormat}}
                        />
                        {errors.introducao && <ErrorMessage>{errors.introducao.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Objetivos:
                        <textarea
                            placeholder="Quais os objetivos o projeto pretende alcançar?"
                            name="objetivo"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.objetivo && {...inputFormat}}
                        />
                        {errors.objetivo && <ErrorMessage>{errors.objetivo.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Metodologia:
                        <textarea
                            placeholder="Como o projeto está sendo desenvolvido?"
                            name="metodologia"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.metodologia && {...inputFormat}}
                        />
                        {errors.metodologia && <ErrorMessage>{errors.metodologia.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Resultados e discussões:
                        <textarea
                            placeholder="Obteve algum resultado? Fala sobre, se não explique o que ainda busca fazer"
                            name="result_disc"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.result_disc && {...inputFormat}}
                        />
                        {errors.result_disc && <ErrorMessage>{errors.result_disc.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>
                <CampoGrupo>
                    <label>
                        Conclusão:
                        <textarea
                            name="conclusao"
                            ref={register({required: { value: true, message: "Campo obrigatório!" }})}
                            style={errors.conclusao && {...inputFormat}}
                        />
                        {errors.conclusao && <ErrorMessage>{errors.conclusao.message}</ErrorMessage>}
                    </label>
                </CampoGrupo>

            </ProjetoDados>
            <Button type="submit">Cadastrar</Button>
        </Form>
    );
}

export default React.memo(FormProjeto);
