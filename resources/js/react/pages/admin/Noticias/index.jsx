import React, { useEffect, useState, useCallback } from "react";
import { useForm } from "react-hook-form";
import { Form, Lista } from "./styles.js";

import { apiNoticias } from '../../../services/data';
import { toast } from "react-toastify";
import { Container } from "../../../styles/Container/index.js";
import { Button, ButtonLink } from "../../../styles/Buttons/index.js";
import { Label, Title } from "../../../styles/Texts/index.js";
import { Input } from "../../../styles/Inputs/index.js";
import { ErrorMessage } from "../../../styles/Messages/index.js";

const Noticias = () => {
  const { register, handleSubmit, setValue, formState: { errors } } = useForm();
  const [data, setData] = useState([]);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    loadNoticias();
  }, []);

  const loadNoticias = useCallback(async () => {
    setIsLoading(true);
    await apiNoticias
      .index()
      .then((response) => {
        setData(response.data.data);
        setIsLoading(false);
      })
      .catch(() => {
        toast.error("Não foi possivel carregar as notícias!");
      });
  }, [setData]);

  const handleUpdateNoticia = useCallback(
    (item) => {
      setValue("id", item.id);
      setValue("nome", item.nome);
      setValue("link", item.link);
    },
    [setValue]
  );

  const handleDeleteNoticia = useCallback(
    (id) => {
      async function deleteNoticia(id) {
        await apiNoticias
          .destroy(id)
          .then((response) => {
            if (!response.data.data.erro) {
              toast.success(response.data.data.message, { toastId: id });
            } else {
              toast.error(response.data.data.message, { toastId: id });
            }
            setData((prev) => prev.filter((noticia) => noticia.id !== id));
          })
          .catch(() =>
            toast.error("Algo deu errado ao deletar a notícia!", {
              toastId: id,
            })
          );
      }

      deleteNoticia(id);
    },
    [setData]
  );

  const onSubmit = useCallback(
    async (data) => {
      if (data.id > 0) {
        await apiNoticias
          .update(data.id, data)
          .then((response) => {
            if (!response.data.data.erro) {
              toast.success(response.data.data.message, { toastId: data.id });
              loadNoticias();
              setValue("nome", '');
              setValue("link", '');
              setValue("id", 0);
            } else {
              toast.error(response.data.data.message, { toastId: data.id });
            }
          })
          .catch(() =>
            toast.error("Algo deu errado ao deletar!", { toastId: data.id })
          );
      } else {
        await apiNoticias
          .store(data)
          .then(() => {
            toast.success("Noticia inserida com sucesso!", {
              toastId: data.id,
            });
            loadNoticias();
            setValue("nome", '');
            setValue("link", '');
          })
          .catch(() =>
            toast.error("Algo deu errado ao inserior a noticia", {
              toastId: data.id,
            })
          );
      }
    },
    [setValue, loadNoticias]
  );

  return (
    <Container>
      <Form method="POST" onSubmit={handleSubmit(onSubmit)}>
        <Title>Inserir notícias:</Title>
        <Input
          type="hidden"
          {...register("id", { value: 0, required: { value: true, message: "" } })}
        />
        <Label htmlFor="nome" hasError={errors.nome}>Titulo:</Label>
        <Input
          id="nome"
          hasError={errors.nome}
          {...register("nome", {
            required: {
              value: true,
              message: "Informe um nome para a notícia!",
            },
          })}
          placeholder=" "
        />
        {errors.nome && (
          <ErrorMessage color={"--red"}>{errors.nome.message}</ErrorMessage>
        )}
        <Label htmlFor="link" hasError={errors.link}>Link da notícia:</Label>
        <Input
          id="link"
          hasError={errors.link}
          {...register("link", {
            required: {
              value: true,
              message: "Informe um link para a notícia!",
            },
          })}
          placeholder=" "
        />
        {errors.link && (
          <ErrorMessage color={"--red"}>{errors.link.message}</ErrorMessage>
        )}
        <Button bgColor="--dark-green" type="submit">Enviar</Button>
      </Form>
      <Lista>
        <Title>Notícias:</Title>
        {isLoading ? (
          <span>Buscando...</span>
        ) : (
          <>
            {data.map((item) => (
              <div key={item.id}>
                <p>{item.nome}</p>
                <div>
                  <ButtonLink
                    type="button"
                    onClick={() => handleUpdateNoticia(item)}
                  >
                    Editar
                  </ButtonLink>
                  <ButtonLink
                    type="button"
                    onClick={() => handleDeleteNoticia(item.id)}
                  >
                    Remover
                  </ButtonLink>
                </div>
              </div>
            ))}
          </>
        )}
      </Lista>
    </Container>
  );
};

export default Noticias;
