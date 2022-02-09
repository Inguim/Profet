import React, { useEffect, useState, useCallback } from "react";
import { Search, Results } from "./styles.js";

import { SiVerizon } from "react-icons/si";

import { toast } from "react-toastify";
import FormProjeto from "../../../components/FormProjeto";
import { apiMembros } from "../../../services/data";
import { Container } from "../../../styles/Container/index.js";
import { Label, Title } from "../../../styles/Texts/index.js";
import { InputSearch, Select } from "../../../styles/Inputs/index.js";
import { InfoMessage } from "../../../styles/Messages/index.js";
import { ButtonSvg } from "../../../styles/Buttons/index.js";

const NovoProjeto = () => {
  const [search, setSearch] = useState("");
  const [resultados, setResultados] = useState([]);
  const [participantes, setParticipantes] = useState([]);
  const [tipo, setTipo] = useState("aluno");
  const [isFirst, setIsFirst] = useState(true);

  const searchMembro = useCallback(
    async (search, tipo) => {
      isFirst && setIsFirst(false);
      await apiMembros.search(search, tipo).then((response) => {
        if (response.data.data.length === 1 && resultados.length === 0) {
          setResultados([response.data.data[0]]);
        } else if (response.data.data.length != 0 && resultados.length >= 1) {
          if (!resultados.find((item) => item.id === response.data.data[0].id))
            setResultados([...resultados, response.data.data[0]]);
        }
      });
    },
    [resultados, setResultados]
  );

  const saveMembro = useCallback(
    (membro, select) => {
      var aux = document.getElementById(select).value;

      if (aux) {
        if (participantes.length === 0) {
          setParticipantes([...participantes, { membro, relacao: aux, tipo: tipo }]);
        } else {
          if (!participantes.find((element) => element.membro.id === membro.id)) {
            setParticipantes([...participantes, { membro, relacao: aux, tipo: tipo }]);
          } else {
            toast.warning("Você ja selecionou esse membro");
          }
        }
      } else {
        toast.warning("Selecione uma atuação para este membro");
      }
    },
    [participantes, tipo, setParticipantes]
  );

  const deleteParticipante = useCallback(
    (id) => {
      setParticipantes(participantes.filter((item) => item.membro.id !== id));
    },
    [participantes, setParticipantes]
  );

  useEffect(() => {
    setResultados([]);
  }, [tipo, setResultados]);

  useEffect(() => {
    if (search.length > 2) {
      searchMembro(search, tipo);
    }
  }, [search, tipo, searchMembro]);

  return (
    <Container>
      <Search>
        <Title>Pesquisar participantes:</Title>
        <section>
          <Label htmlFor="tipo">Pesquisar por:</Label>
          <Select value={tipo} onChange={(e) => setTipo(e.target.value)}>
            <option value="aluno">Aluno</option>
            <option value="professor">Professor</option>
          </Select>
        </section>
        <Label htmlFor="nome">Nome:</Label>
        <div>
          <InputSearch
            type="search"
            width={"50%"}
            value={search}
            placeholder="🔍 Digite o nome..."
            onChange={(e) => setSearch(e.target.value)}
          />
        </div>
        <Results>
          <Title>Usuários encontrados:</Title>
          {resultados.length > 0 ? (
            <>
              {resultados.map((item) => (
                <li key={item.id}>
                  <ButtonSvg
                    type="button"
                    bgColor="--green"
                    onClick={() => saveMembro(item, `${item.name + item.id}`)}
                  >
                    <SiVerizon color="#59C15D" />
                  </ButtonSvg>
                  {item.name}

                  {tipo === "professor" ? (
                    <Select id={`${item.name + item.id}`}>
                      <option value="">Selecionar atuação</option>
                      <option value="orientador">Orientador</option>
                      <option value="coordenador">Coordenador</option>
                      <option value="coorientador">Coorientador</option>
                    </Select>
                  ) : (
                    <Select id={`${item.name + item.id}`}>
                      <option value="">Selecionar atuação</option>
                      <option value="bolsista">Bolsista</option>
                      <option value="voluntario">Voluntário</option>
                    </Select>
                  )}
                </li>
              ))}
            </>
          ) : (
            <>{!isFirst && <InfoMessage color={'--blue'}>Nenhum resultado encontrado</InfoMessage>}</>
          )}
        </Results>
      </Search>
      <FormProjeto
        participantes={participantes}
        deleteParticipante={deleteParticipante}
      />
    </Container>
  );
};

export default NovoProjeto;
