import React, { useCallback, useEffect, useState } from "react";
import { toast } from "react-toastify";
import ContainerModal from "../../../components/ContainerModal/index.jsx";
import VisualizarProjeto from "../../../components/VisualizarProjeto/index.jsx";
import { apiProjetos } from "../../../services/data/index.js";
import { Container, Lista } from "./styles.js";

const Projetos = () => {
  const [projetos, setProjetos] = useState([]);
  const [open, setOpen] = useState(false);
  const [idProject, setIdProject] = useState(0);

  const fetchProjetos = useCallback(async () => {
    await apiProjetos.index().then((response) => {
      var aux = response.data.data;
      var formated = [];
      aux.map((item, index) => {
        formated = [
          ...formated,
          {
            id: item.id,
            nome: item.nome,
            resumo: item.resumo,
            categoria: item.categoria.nome,
            estado: item.estado.estado,
            participantes: [],
            docentes: [],
          },
        ];

        item.user_projs.map((relacao) => {
          if (relacao.relacao === "bolsista" ||relacao.relacao === "voluntario") {
            formated[index].participantes.push({
              id: relacao.user.id,
              name: relacao.user.name,
              relacao: relacao.relacao,
            });
          } else {
            formated[index].docentes.push({
              id: relacao.user.id,
              name: relacao.user.name,
              relacao: relacao.relacao,
            });
          }
        });
      });
      setProjetos(formated);
    }).catch(error => toast.error(error.message));
  }, []);

  const handleOpenModal = useCallback(id => {
    setOpen(true);
    setIdProject(id);
  }, [setIdProject, setIdProject]);

  useEffect(() => {
    fetchProjetos();
  }, []);

  return (
    <Container>
      <ContainerModal onClose={() => setOpen(false)} show={open}>
        <VisualizarProjeto projetoId={idProject} />
      </ContainerModal>
      <Lista>
        <h1>Projetos:</h1>
        {projetos.map((projeto) => (
          <div key={projeto.id}>
            <p style={{ fontWeight: "bold" }}>{projeto.nome}</p>
            <p>
              Participantes:{" "}
              {projeto.participantes.length > 0 ? (
                <>
                  {projeto.participantes.map((user, index) => (
                    <React.Fragment key={user.id}>
                      {user.name}
                      {projeto.participantes.length !== index + 1 ? ", " : ""}
                    </React.Fragment>
                  ))}
                </>
              ) : (
                "Nenhum até o momento"
              )}
            </p>
            <p>Docentes:{" "}
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
            <p>Categoria: {projeto.categoria}</p>
            <p>Estado atual: {projeto.estado}</p>
            <p>{projeto.resumo}</p>
            <div style={{ justifyContent: "space-between", width: "100%" }}>
              <button type="button" onClick={() => handleOpenModal(projeto.id)}>Visualizar</button>
              <div>
                <button type="button">Aprovar</button>
                <button type="button">Solicitar Alteração</button>
              </div>
            </div>
          </div>
        ))}
      </Lista>
    </Container>
  );
};

export default Projetos;
