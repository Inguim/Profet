import React, { useEffect, useState, useCallback } from "react";
import { useForm } from "react-hook-form";
import { Container, Form, Button, Lista } from "./styles.js";

import api from "../../../services/api";
import { toast } from "react-toastify";

const Noticias = () => {
    const { register, handleSubmit } = useForm();
    const [data, setData] = useState([]);
    const [id, setId] = useState(0);

    useEffect(() => {
        loadNoticias();
    }, []);

    const loadNoticias = useCallback(async () => {
        await api
            .get("noticias")
            .then((response) => {
                setData(response.data.data);
            })
            .catch(() => {
                toast.error("Não foi possivel carregar as notícias!");
            });
    }, [setData]);

    const handleUpdateNoticia = useCallback(
        (item) => {
            setId(item.id);
            document.querySelector("input[name=nome]").value = item.nome;
            document.querySelector("input[name=link]").value = item.link;
        },
        [setId]
    );

    const handleDeleteNoticia = useCallback(
        (id) => {
            async function deleteNoticia(id) {
                await api
                    .delete(`noticias/${id}`)
                    .then((response) => {
                        if (!response.data.data.erro) {
                            toast.success(response.data.data.message);
                        } else {
                            toast.error(response.data.data.message);
                        }
                        setData((prev) =>
                            prev.filter((noticia) => noticia.id !== id)
                        );
                    })
                    .catch(() =>
                        toast.error("Algo deu errado ao deletar a notícia!")
                    );
            }

            deleteNoticia(id);
        },
        [setData]
    );

    const onSubmit = useCallback(
        async (data) => {
            if (data.id > 0) {
                await api
                    .put(`noticias/${data.id}`, data)
                    .then((response) => {
                        if (!response.data.data.erro) {
                            toast.success(response.data.data.message);
                            loadNoticias();
                        } else {
                            toast.error(response.data.data.message);
                        }
                    })
                    .catch(() => toast.error("Algo deu errado ao deletar!"));
            } else {
                await api
                    .post("noticias", data)
                    .then(() => {
                        toast.success("Noticia inserida com sucesso!");
                        document.querySelector("input[name=nome]").value = "";
                        document.querySelector("input[name=link]").value = "";
                        setId(0);
                        loadNoticias();
                    })
                    .catch(() =>
                        toast.error("Algo deu errao ao inserior a noticia")
                    );
            }
        },
        [setId, loadNoticias]
    );

    return (
        <Container>
            <Form method="POST" onSubmit={handleSubmit(onSubmit)}>
                <h1>Inserir notícias:</h1>
                <input
                    type="hidden"
                    name="id"
                    value={id}
                    required
                    ref={register}
                />
                <label htmlFor="nome">Titulo:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    required
                    ref={register({ required: true })}
                />
                <label htmlFor="link">Link da notícia:</label>
                <input
                    type="text"
                    id="link"
                    name="link"
                    required
                    ref={register({ required: true })}
                />
                <Button type="submit">Enviar</Button>
            </Form>
            <Lista>
                <h1>Notícias:</h1>
                {data.map((item) => (
                    <div key={item.id}>
                        <p>{item.nome}</p>
                        <div>
                            <button
                                type="button"
                                onClick={() => handleUpdateNoticia(item)}
                            >
                                Editar
                            </button>
                            <button
                                type="button"
                                onClick={() => handleDeleteNoticia(item.id)}
                            >
                                Remover
                            </button>
                        </div>
                    </div>
                ))}
            </Lista>
        </Container>
    );
};

export default Noticias;
