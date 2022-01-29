import React, { useCallback, useEffect, useState } from "react";
import { toast } from "react-toastify";
import { apiProjetos } from "../../services/data/index.js";
import { formatDateTime } from "../../utils/format/index.js";
import { Container, Projeto, Section } from "./styles.js";

const VisualizarProjeto = ({ projetoId }) => {
  const [projeto, setProjeto] = useState({});
  const [isLoading, setIsLoading] = useState(true);

  const fetchProjeto = useCallback(
    async (projetoId) => {
      await apiProjetos
        .show(projetoId)
        .then((response) => {
          response.data.data.docentes = [];
          response.data.data.autores = [];

          response.data.data.user_projs.map((relacao) => {
            if (
              relacao.relacao === "bolsista" ||
              relacao.relacao === "voluntario"
            ) {
              response.data.data.autores.push({
                id: relacao.user.id,
                name: relacao.user.name,
                relacao: relacao.relacao,
              });
            } else {
              response.data.data.docentes.push({
                id: relacao.user.id,
                name: relacao.user.name,
                relacao: relacao.relacao,
              });
            }
          });
          setProjeto(response.data.data);
          setIsLoading(false);
        })
        .catch((error) => toast.error(error.message));
    },
    [setProjeto, setIsLoading]
  );

  useEffect(() => {
    if (projetoId > 0) {
      fetchProjeto(projetoId);
    }
  }, [projetoId]);

  return (
    <Container>
      {isLoading ? (
        "...."
      ) : (
        <Projeto>
          <header>
            <h1>{projeto.nome}</h1>
          </header>
          <Section>
            <p>
              Orientador:{" "}
              {projeto.docentes.length > 0 ? (
                <>
                  {projeto.docentes.map((user, index) => (
                    <React.Fragment key={user.id}>
                      {user.name}
                      {projeto.docentes.length !== index + 1 ? ", " : ""}
                    </React.Fragment>
                  ))}
                </>
              ) : (
                "Nenhum até o momento"
              )}
            </p>
            <p>Área de Atuação: {projeto.categoria.nome}</p>
            <p>
              Autores:{" "}
              {projeto.autores.length > 0 ? (
                <>
                  {projeto.autores.map((user, index) => (
                    <React.Fragment key={user.id}>
                      {user.name}
                      {projeto.autores.length !== index + 1 ? ", " : ""}
                    </React.Fragment>
                  ))}
                </>
              ) : (
                "Nenhum até o momento"
              )}
            </p>
            <p>Data de adesão: {formatDateTime(projeto.created_at)}</p>
            <p>Estado Atual: {projeto.estado.estado}</p>
          </Section>
          <Section>
            <h2>Resumo</h2>
            <p>{projeto.resumo}</p>
          </Section>
          <Section>
            <h2>Introdução</h2>
            <p>{projeto.introducao}</p>
          </Section>
          <Section>
            <h2>Objetivos</h2>
            <p>{projeto.objetivo}</p>
          </Section>
          <Section>
            <h2>Resultados e Discussões</h2>
            <p>{projeto.result_disc}</p>
          </Section>
          <Section>
            <h2>Conclusão</h2>
            <p>{projeto.conclusao}</p>
          </Section>
        </Projeto>
      )}
    </Container>
  );
};

export default React.memo(VisualizarProjeto);
