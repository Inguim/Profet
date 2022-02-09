import React, { useCallback, useEffect, useState } from "react";
import { Form, Participantes, ProjetoDados, CampoGrupo } from "./styles";

import { IoMdClose } from "react-icons/io";

import { useForm } from "react-hook-form";
import { toast } from "react-toastify";
import { apiFormProjetos } from "../../services/data";
import { redirectTo } from "../../utils/redirectTo";
import { Label, Title } from "../../styles/Texts";
import { Input, Select } from "../../styles/Inputs";
import { ErrorMessage } from "../../styles/Messages";
import { Button, ButtonSvg } from "../../styles/Buttons";

const FormProjeto = ({ participantes, deleteParticipante }) => {
  const {
    register,
    handleSubmit,
    formState: { errors },
    watch,
  } = useForm();
  const [estadosProj, setEstadoProj] = useState([]);
  const [users, setUsers] = useState([]);
  const [categoriaProj, setCategoriasProj] = useState([]);

  const watchEstado = watch(["estado_id"]);

  const handleLoadForm = useCallback(async () => {
    await apiFormProjetos.index().then((response) => {
      const { estados, categorias } = response.data.data;
      setEstadoProj(estados);
      setCategoriasProj(categorias);
    });
  }, [setEstadoProj, setCategoriasProj]);

  const onSubmit = useCallback(
    async (data) => {
      var available = false;
      var message = "";
      data.users = [];
      users.map((item) => {
        data.users.push({
          user_id: item.membro.id,
          relacao: item.relacao,
          tipo: item.tipo,
        });
      });

      if (data.estado_id == 3 && data.atuacao_escritor == "voluntario") {
        if (data.users.length >= 0) {
          if (
            data.users.find((item) => item.tipo == "professor") == undefined &&
            data.users.find((item) => item.relacao == "bolsista") == undefined
          ) {
            available = true;
          } else {
            message =
              'Apenas é permitido um projeto "a procura de orientador", caso este so tenha voluntários e sem a presença de um professor';
          }
        } else {
          available = true;
        }
      } else if (data.estado_id !== 3) {
        if (data.users.length > 0) {
          if (
            (data.atuacao_escritor == "voluntario" ||
              data.atuacao_escritor == "bolsista") &&
            data.users.find((item) => item.tipo == "professor") !== undefined
          ) {
            available = true;
          } else if (
            (data.atuacao_escritor !== "voluntario" ||
              data.atuacao_escritor !== "bolsista") &&
            data.users.find((item) => item.tipo == "aluno") !== undefined
          ) {
            available = true;
          }
        } else {
          message = `Este projeto precisa de no minimo 1 participante, caso o campo "sua atuação" seja "bolsista" ou "voluntario", deve-se haver no minímo um membro aluno, ou caso contrário um membro professor ou mais`;
        }
      }

      if (available) {
        await apiFormProjetos.store(data).then((response) => {
          if (!response.data.data.erro) {
            toast.success("Projeto inserido com sucesso!");
            redirectTo('home');
          } else {
            toast.error(response.data.data.msg);
          }
        });
      } else {
        toast.error(message);
      }
    },
    [users]
  );

  useEffect(() => {
    handleLoadForm();
  }, []);

  useEffect(() => {
    setUsers(participantes);
  }, [participantes]);

  return (
    <Form method="POST" onSubmit={handleSubmit(onSubmit)}>
      <Participantes>
        <Title>Participantes:</Title>
        {users.map((item) => (
          <li key={item.membro.id}>
            <ButtonSvg
              type="button"
              bgColor="--dark-red"
              onClick={() => deleteParticipante(item.membro.id)}
              style={{ svg: { shadow: "var(--dark-red)" } }}
            >
              <IoMdClose />
            </ButtonSvg>
            <div>
              <p>
                Nome: <span>{item.membro.name}</span>
              </p>
              <p>
                Atuação: <span>{item.relacao}</span>
              </p>
            </div>
          </li>
        ))}
      </Participantes>
      <ProjetoDados>
        <CampoGrupo>
          <Label hasError={errors.nome}>
            Nome do projeto:
            <Input
              placeholder="Tamanho máximo de 100 caracteres"
              {...register("nome", {
                required: {
                  value: true,
                  message: "O projeto precisa de um nome!",
                },
                maxLength: {
                  value: 100,
                  message: "Tamanho máximo de 100 caracteres!",
                },
              })}
              hasError={errors.nome}
            />
            {errors.nome && (
              <ErrorMessage color="--red" color="--red">
                {errors.nome.message}
              </ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
        <CampoGrupo>
          <Label htmlFor="estado_id" hasError={errors.estado_id}>
            Estado de desenvolvimento atual:
          </Label>
          <Select
            {...register("estado_id", {
              required: { value: true, message: "Escolha uma opção!" },
            })}
            hasError={errors.estado_id}
          >
            <option></option>
            {estadosProj.map((item) => (
              <option key={item.id} value={item.id}>
                {item.estado}
              </option>
            ))}
          </Select>
          {errors.estado_id && (
            <ErrorMessage color="--red">
              {errors.estado_id.message}
            </ErrorMessage>
          )}
        </CampoGrupo>
        <CampoGrupo>
          <Label htmlFor="atuacao_escritor" hasError={errors.atuacao_escritor}>
            Sua atuação:
          </Label>
          <Select
            {...register("atuacao_escritor", {
              required: { value: true, message: "Escolha uma opção!" },
            })}
            hasError={errors.atuacao_escritor}
          >
            <option></option>
            {watchEstado == 3 ? (
              <>
                <option value="voluntario">Voluntario</option>
              </>
            ) : (
              <>
                <option value="orientador">Orientador</option>
                <option value="coordenador">Coordenador</option>
                <option value="coorientador">Coorientador</option>
                <option value="bolsista">Bolsista</option>
                <option value="voluntario">Voluntario</option>
              </>
            )}
          </Select>
          {errors.atuacao_escritor && (
            <ErrorMessage color="--red">
              {errors.atuacao_escritor.message}
            </ErrorMessage>
          )}
        </CampoGrupo>
        <CampoGrupo>
          <Label htmlFor="categoria_id" hasError={errors.categoria_id}>
            Em qual categoria o projeto se enquadra:
          </Label>
          <Select
            {...register("categoria_id", {
              required: { value: true, message: "Escolha uma opção!" },
            })}
            hasError={errors.categoria_id}
          >
            <option></option>
            {categoriaProj.map((item) => (
              <option key={item.id} value={item.id}>
                {item.nome}
              </option>
            ))}
          </Select>
          {errors.categoria_id && (
            <ErrorMessage color="--red">
              {errors.categoria_id.message}
            </ErrorMessage>
          )}
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.resumo}>
            Resumo:
            <Input
              as={"textarea"}
              isTextArea
              placeholder="Faça um breve resumo sobre o projeto"
              {...register("resumo", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.resumo}
            />
            {errors.resumo && (
              <ErrorMessage color="--red">{errors.resumo.message}</ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.introducao}>
            Introdução:
            <Input
              as={"textarea"}
              isTextArea
              {...register("introducao", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.introducao}
              placeholder="Introduza os ideias por tras do projeto"
            />
            {errors.introducao && (
              <ErrorMessage color="--red">
                {errors.introducao.message}
              </ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.objetivo}>
            Objetivos:
            <Input
              as={"textarea"}
              isTextArea
              placeholder="Quais os objetivos o projeto pretende alcançar?"
              {...register("objetivo", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.objetivo}
            />
          </Label>
          {errors.objetivo && (
            <ErrorMessage color="--red">{errors.objetivo.message}</ErrorMessage>
          )}
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.metodologia}>
            Metodologia:
            <Input
              as={"textarea"}
              isTextArea
              placeholder="Como o projeto está sendo desenvolvido?"
              {...register("metodologia", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.metodologia}
            />
            {errors.metodologia && (
              <ErrorMessage color="--red">
                {errors.metodologia.message}
              </ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.result_disc}>
            Resultados e discussões:
            <Input
              as={"textarea"}
              isTextArea
              placeholder="Obteve algum resultado? Fale sobre, caso contrário explique o que ainda busca fazer"
              {...register("result_disc", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.result_disc}
            />
            {errors.result_disc && (
              <ErrorMessage color="--red">
                {errors.result_disc.message}
              </ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
        <CampoGrupo>
          <Label hasError={errors.conclusao}>
            Conclusão:
            <Input
              as={"textarea"}
              isTextArea
              {...register("conclusao", {
                required: { value: true, message: "Campo obrigatório!" },
              })}
              hasError={errors.conclusao}
              placeholder=" "
            />
            {errors.conclusao && (
              <ErrorMessage color="--red">
                {errors.conclusao.message}
              </ErrorMessage>
            )}
          </Label>
        </CampoGrupo>
      </ProjetoDados>
      <Button width={"100%"} bgColor="--dark-green" type="submit">
        Cadastrar
      </Button>
    </Form>
  );
};

export default React.memo(FormProjeto);
