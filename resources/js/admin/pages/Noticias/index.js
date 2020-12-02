import React, { useEffect, useState, useCallback } from "react";
import { useForm } from "react-hook-form";
import { Container, Form, Button, Lista } from "./styles.js";

import api from "../../../services/api";
import { toast } from "react-toastify";

const Noticias = () => {
    const { register, handleSubmit } = useForm();
    const [data, setData] = useState([]);
    const [id, setId] =useState(0);

    async function loadNoticias() {
        const response = await api.get('noticias');
        setData(response.data.data);
    }

    const handleUpdateNoticia = useCallback(item => {
        setId(item.id);
        document.querySelector("input[name=nome]").value = item.nome;
        document.querySelector("input[name=link]").value = item.link;
    }, [id]);

    const handleDeleteNoticia = useCallback(id => {
        async function deleteNoticia() {
            try {
                const response = await api.delete(`noticias/${id}`);
                if(!response.data.data.erro) {
                    toast.success(response.data.data.message)
                } else {
                    toast.error(response.data.data.message)
                }
                setData(data.filter(noticia => noticia.id !== id));
            } catch (error) {
                toast.error(error.message);
            }
        }

        deleteNoticia();
    });

    useEffect(() => {
        loadNoticias();
    }, [])

    const onSubmit = useCallback(
        async data => {
            try {
                if (data.id > 0) {
                    const response = await api.put(`noticias/${data.id}`, data);
                    if(!response.data.data.erro) {
                        toast.success(response.data.data.message)
                    } else {
                        toast.error(response.data.data.message)
                    }
                    loadNoticias();
                } else {
                    loadNoticias();
                    await api.post('noticias', data);
                    toast.success('Noticia inserida com sucesso!');
                    document.querySelector("input[name=nome]").value = "";
                    document.querySelector("input[name=link]").value = "";
                    setId(0);
                    loadNoticias();
                }
            } catch (error) {
                toast.error(error.message);
            }
    }, [history]);

    return (
        <Container>
            <Form method="POST" onSubmit={handleSubmit(onSubmit)}>
                <h1>Inserir notícias:</h1>
                <input type="hidden" name="id" value={id} required ref={register} />
                <label htmlFor="nome">Titulo:</label>
                <input type="text" id="nome" name="nome" required ref={register({ required: true })} />
                <label htmlFor="link">Link da notícia:</label>
                <input type="text" id="link" name="link" required ref={register({ required: true })} />
                <Button type="submit">Enviar</Button>
            </Form>
            <Lista>
                <h1>Notícias:</h1>
                {data.map(item => (
                    <div key={item.id}>
                        <p>{item.nome}</p>
                        <div>
                            <button type="button" onClick={() => handleUpdateNoticia(item)}>Editar</button>
                            <button type="button" onClick={() => handleDeleteNoticia(item.id)}>Remover</button>
                        </div>
                    </div>
                ))}
            </Lista>
        </Container>
    );
};

export default Noticias;
