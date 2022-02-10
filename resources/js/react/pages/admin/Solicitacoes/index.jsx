import React, { useCallback, useEffect, useState } from "react";
import { toast } from "react-toastify";
import ContainerModal from "../../../components/ContainerModal";
import FormSolicitacao from "../../../components/FormSolicitacao";
import LoadingCallback from "../../../components/LoadingCallback";
import VisualizarProjeto from "../../../components/VisualizarProjeto";
import { apiSolicitacao } from "../../../services/data";
import { ButtonLink } from "../../../styles/Buttons";
import { Border, Container } from "../../../styles/Container";
import { Title } from "../../../styles/Texts";
import { Actions, Header, Solicitacao } from "./styles";

const Solicitacoes = () => {
  const [isLoading, setIsLoading] = useState(true);
  const [solicitados, setSolicitados] = useState([]);
  const [alterados, setAlterados] = useState([]);
  const [openProjeto, setOpenProjeto] = useState(false);
  const [openSolicitacao, setOpenSolicitacao] = useState(false);
  const [idProject, setIdProject] = useState(0);
  const [solicitacao, setSolicitacao] = useState({});

  const fetchSolicitacoes = async () => {
    apiSolicitacao
      .index()
      .then((response) => {
        setSolicitados(response.data.data.solicitados);
        setAlterados(response.data.data.alterados);
        setIsLoading(false);
      })
      .catch(() => toast.error("Algo deu errado ao buscar as solicitações"));
  };

  const handleOpenModal = useCallback(
    (id) => {
      setIdProject(id);
      setOpenProjeto(true);
    },
    [setIdProject, setIdProject]
  );

  const handleOpenSolicitacao = useCallback(
    (id, solicitacao) => {
      setIdProject(id);
      setSolicitacao(solicitacao);
      setOpenSolicitacao(true);
    },
    [setIdProject, setIdProject]
  );

  const handleUpdateSolicitacao = useCallback(
    async (data) => {
      apiSolicitacao
        .update(data.solicitacao_id, {
          titulo: data.titulo,
          descricao: data.descricao,
          tipo_alteracao: 1,
        })
        .then((response) => {
          if (!response.data.data.error) {
            setOpenSolicitacao(false);
            fetchSolicitacoes();
            toast.success("Solicitação alterada com sucesso!", {
              toastId: data.id,
            });
          } else {
            toast.error(response.data.data.message, { toastId: id });
          }
        });
    },
    [apiSolicitacao]
  );

  const handleRecusarAlteracao = useCallback(
    async (id) => {
      apiSolicitacao
        .update(id, { status: "recusado", tipo_alteracao: 2 })
        .then((response) => {
          if (!response.data.data.error) {
            setOpenSolicitacao(false);
            setAlterados((prev) =>
              prev.filter((alterado) => alterado.id !== id)
            );
            toast.success("Alteração recusada com sucesso!", {
              toastId: id,
            });
          } else {
            toast.error(response.data.data.message, { toastId: id });
          }
        })
        .catch(() => toast.error("Algo deu errado ao recusar!"));
    },
    [setAlterados, apiSolicitacao]
  );

  const handleAprovarAlteracao = useCallback(async (id, tipo) => {
    apiSolicitacao
      .update(id, { status: "aprovado", tipo_alteracao: tipo })
      .then((response) => {
        if (!response.data.data.error) {
          setOpenSolicitacao(false);
          setAlterados((prev) => prev.filter((alterado) => alterado.id !== id));
          toast.success(`${tipo === 2 ? "Alteração efetuada" : "Projeto aprovado"} com sucesso!`, {
            toastId: id,
          });
        } else {
          toast.error(response.data.data.message, { toastId: id });
        }
      })
      .catch(() => toast.error("Algo deu errado ao aprovar!"));
  }, []);

  const handleDeleteSolicitacao = useCallback(
    async (id) => {
      apiSolicitacao.destroy(id).then((response) => {
        if (!response.data.data.error) {
          setSolicitados((prev) =>
            prev.filter((solicitacao) => solicitacao.id !== id)
          );
          toast.success("Solicitação deletada com sucesso!", {
            toastId: id,
          });
        } else {
          toast.error(response.data.data.message, { toastId: id });
        }
      });
    },
    [setSolicitacao, apiSolicitacao]
  );

  useEffect(() => {
    fetchSolicitacoes();
  }, []);

  return (
    <Container>
      <ContainerModal onClose={() => setOpenProjeto(false)} show={openProjeto}>
        <VisualizarProjeto projetoId={idProject} />
      </ContainerModal>
      <ContainerModal
        onClose={() => setOpenSolicitacao(false)}
        show={openSolicitacao}
      >
        <FormSolicitacao
          projetoId={idProject}
          isEdit={{
            value: true,
            solicitacao: solicitacao,
          }}
          onClose={() => setOpenSolicitacao(false)}
          onSubmit={handleUpdateSolicitacao}
        />
      </ContainerModal>
      <Border>
        {isLoading ? (
          <LoadingCallback hg={"3%"} wh={"3%"} justify={"flex-start"}>
            Buscando projetos
          </LoadingCallback>
        ) : (
          <>
            <Title>Aguardando alteração</Title>
            {solicitados.length > 0 ? (
              <>
                {solicitados.map((solicitacao) => (
                  <Solicitacao
                    key={
                      solicitacao.id +
                      solicitacao.updated_at +
                      solicitacao.projeto.id
                    }
                  >
                    <Header>
                      <h3>
                        {solicitacao.titulo[0].toUpperCase()}
                        {solicitacao.titulo.substring(1)}
                      </h3>
                      <span>{solicitacao.updated_at_ago}</span>
                    </Header>
                    <p>Projeto: {solicitacao.projeto.nome}</p>
                    <p>Descrição da solicitação:</p>
                    <p>{solicitacao.descricao}</p>
                    <Actions>
                      <ButtonLink
                        onClick={() => handleOpenModal(solicitacao.projeto.id)}
                      >
                        Visualizar Projeto
                      </ButtonLink>
                      <ButtonLink
                        onClick={() =>
                          confirm(
                            "Deseja realmente recusar e excluir esta solicitação?"
                          ) && handleDeleteSolicitacao(solicitacao.id)
                        }
                      >
                        Excluir
                      </ButtonLink>
                      <ButtonLink
                        onClick={() =>
                          handleOpenSolicitacao(solicitacao.projeto.id, {
                            id: solicitacao.id,
                            titulo: solicitacao.titulo,
                            descricao: solicitacao.descricao,
                          })
                        }
                      >
                        Editar
                      </ButtonLink>
                    </Actions>
                  </Solicitacao>
                ))}
              </>
            ) : (
              <p>Nenhum projeto com solicitação até o momento</p>
            )}
          </>
        )}
      </Border>
      <Border>
        {isLoading ? (
          <LoadingCallback hg={"3%"} wh={"3%"} justify={"flex-start"}>
            Buscando projetos
          </LoadingCallback>
        ) : (
          <>
            <Title>Aguardando nova análise</Title>
            {alterados.length > 0 ? (
              <>
                {alterados.map((alterado) => (
                  <Solicitacao
                    key={
                      alterado.id + alterado.updated_at + alterado.projeto.id
                    }
                  >
                    <Header>
                      <h3>
                        {alterado.titulo[0].toUpperCase()}
                        {alterado.titulo.substring(1)}
                      </h3>
                      <span>{alterado.updated_at_ago}</span>
                    </Header>
                    <p>Projeto: {alterado.projeto.nome}</p>
                    <p>Descrição da solicitação:</p>
                    <p>{alterado.descricao}</p>
                    <Actions>
                      <ButtonLink
                        onClick={() => handleOpenModal(alterado.projeto.id)}
                      >
                        Visualizar Projeto
                      </ButtonLink>
                      <ButtonLink
                        onClick={() => handleRecusarAlteracao(alterado.id)}
                      >
                        Recusar
                      </ButtonLink>
                      <ButtonLink
                        onClick={() =>
                          handleAprovarAlteracao(alterado.id, 2)
                        }
                      >
                        Aprovar solicitacão
                      </ButtonLink>
                      <ButtonLink
                        onClick={() =>
                          handleAprovarAlteracao(alterado.id, 3)
                        }
                      >
                        Aprovar projeto
                      </ButtonLink>
                    </Actions>
                  </Solicitacao>
                ))}
              </>
            ) : (
              <p>Nenhum projeto foi alterado até o momento</p>
            )}
          </>
        )}
      </Border>
    </Container>
  );
};

export default Solicitacoes;
