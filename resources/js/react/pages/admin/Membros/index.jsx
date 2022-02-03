import React, { useCallback, useEffect, useState } from "react";
import { HeaderProfessor, ListaAluno, ListaProfessor } from "./styles.js";

import { apiUsuarios } from "../../../services/data";
import { toast } from "react-toastify";
import { Container } from "../../../styles/Container/index.js";
import { ButtonLink } from "../../../styles/Buttons/index.js";
import LoadingCallback from "../../../components/LoadingCallback/index.jsx";
import { Title } from "../../../styles/Texts/index.js";

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
        <Title>Aluno:</Title>
        {isLoading ? (
          <LoadingCallback hg={'5%'} wh={'5%'} justify={'flex-start'}>Buscando alunos</LoadingCallback>
        ) : (
          <>
            {aluno.length > 0 ? (
              <>
                {aluno.map((item) => (
                  <div key={item.id+item.name}>
                    <p>{item.name}</p>
                    <p>{item.curso}</p>
                    <p>{item.serie}° Série</p>
                    <div>
                      <ButtonLink type="button" onClick={() => handleUpdateStatus(item.id)}>
                        Aprovar
                      </ButtonLink>
                      <ButtonLink type="button" onClick={() => handleDeleteUser(item.id)}>
                        Remover
                      </ButtonLink>
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
        <Title>Professor:</Title>
        {isLoading ? (
          <LoadingCallback hg={'5%'} wh={'5%'} justify={'flex-start'}>Buscando professores</LoadingCallback>
        ) : (
          <>
            {professor.length > 0 ? (
              <>
                {professor.map((item) => (
                  <section key={item.id+item.name}>
                    <HeaderProfessor>
                      <p>
                        <span>{item.name}:</span>{" "}
                        {item.email}
                      </p>
                      <div>
                        <ButtonLink type="button" onClick={() => handleUpdateStatus(item.id)}>
                          Aprovar
                        </ButtonLink>
                        <ButtonLink type="button" onClick={() => handleDeleteUser(item.id)}>
                          Remover
                        </ButtonLink>
                      </div>
                    </HeaderProfessor>
                    <p>Categorias:</p>
                    <div>
                      {item.professor.categorias.map((cat, index) => (
                        <p key={cat.categoria_id+cat.nome+index}>{cat.nome}</p>
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
