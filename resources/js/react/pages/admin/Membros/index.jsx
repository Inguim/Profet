import React, { useCallback, useEffect, useState } from "react";
import { ListaAluno, ListaProfessor } from "./styles.js";

import { apiUsuarios } from "../../../services/data";
import { toast } from "react-toastify";
import { Container } from "../../../styles/Container/index.js";
import { ButtonLink } from "../../../styles/Buttons/index.js";
import LoadingCallback from "../../../components/LoadingCallback/index.jsx";

const Membros = () => {
  const [professor, setProfessor] = useState([]);
  const [aluno, setAluno] = useState([]);
  const [isLoading, setIsloading] = useState(true);

  const loadUsers = useCallback(async () => {
    setIsloading(true);
    await apiUsuarios
      .index()
      .then((response) => {
        var { alunos, professores } = response.data.data;

        setProfessor(professores);
        setAluno(alunos);
        setIsloading(false);
      })
      .catch((error) => toast.error(error.message));
  }, [setAluno, setProfessor, setIsloading]);

  const handleUpdateStatus = useCallback(
    (id) => {
      const updateStatus = async (id) => {
        await apiUsuarios
          .update(id)
          .then((response) => {
            if (!response.data.data.erro) {
              toast.success(response.data.data.message);
            } else {
              toast.error(response.data.data.message);
            }
            loadUsers();
          })
          .catch((error) => toast.error(error.message));
      };
      updateStatus(id);
    },
    [loadUsers]
  );

  const handleDeleteUser = useCallback(
    (id) => {
      const deleteUser = async (id) => {
        apiUsuarios
          .destroy(id)
          .then((response) => {
            if (!response.data.data.erro) {
              toast.success(response.data.data.message);
            } else {
              toast.error(response.data.data.message);
            }
            loadUsers();
          })
          .catch((error) => toast.error(error.message));
      };
      if (
        confirm(
          "Deseja realmente recusar e excluir permanentemente a conta deste usuário?"
        )
      ) {
        deleteUser(id);
      }
    },
    [loadUsers]
  );

  useEffect(() => {
    loadUsers();
  }, []);

  return (
    <Container>
      <ListaAluno>
        <h1>Aluno:</h1>
        {isLoading ? (
          <LoadingCallback hg={'5%'} wh={'5%'} justify={'flex-start'}>Buscando alunos</LoadingCallback>
        ) : (
          <>
            {aluno.length > 0 ? (
              <>
                {aluno.map((item) => (
                  <div key={item.id}>
                    <p>{item.name}</p>
                    <p>{item.curso}</p>
                    <p>{item.serie}° Série</p>
                    <div>
                      <button
                        type="button"
                        onClick={() => handleUpdateStatus(item.id)}
                      >
                        Aprovar
                      </button>
                      <button
                        type="button"
                        onClick={() => handleDeleteUser(item.id)}
                      >
                        Remover
                      </button>
                    </div>
                  </div>
                ))}
              </>
            ) : (
              <p>Nenhuma solicitação até o momento</p>
            )}
          </>
        )}
      </ListaAluno>
      <ListaProfessor>
        <h1>Professor:</h1>
        {isLoading ? (
          <LoadingCallback hg={'5%'} wh={'5%'} justify={'flex-start'}>Buscando professores</LoadingCallback>
        ) : (
          <>
            {professor.length > 0 ? (
              <>
                {professor.map((item) => (
                  <section key={item.id}>
                    <div
                      style={{ marginBottom: "5px" }}
                      className="prof-header"
                    >
                      <p>
                        <span style={{ color: "black", fontWeight: "bold" }}>
                          {item.name}:
                        </span>{" "}
                        {item.email}
                      </p>
                      <div>
                        <ButtonLink
                          type="button"
                          onClick={() => handleUpdateStatus(item.id)}
                        >
                          Aprovar
                        </ButtonLink>
                        <ButtonLink
                          type="button"
                          onClick={() => handleDeleteUser(item.id)}
                        >
                          Remover
                        </ButtonLink>
                      </div>
                    </div>
                    <p style={{ color: "black", marginBottom: "0px" }}>
                      Categorias:
                    </p>
                    <div className="categorias">
                      {item.professor.categorias.map((cat) => (
                        <p key={cat.categoria_id}>{cat.nome}</p>
                      ))}
                    </div>
                  </section>
                ))}
              </>
            ) : (
              <p>Nenhuma solicitação até o momento</p>
            )}
          </>
        )}
      </ListaProfessor>
    </Container>
  );
};

export default Membros;
