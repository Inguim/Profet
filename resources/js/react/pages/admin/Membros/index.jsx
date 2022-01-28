import React, { useCallback, useEffect, useState } from "react";
import { Container, ListaAluno, ListaProfessor } from "./styles.js";

import { apiUsuarios } from "../../../services/data";
import { toast } from "react-toastify";

const Membros = () => {
  const [professor, setProfessor] = useState([]);
  const [aluno, setAluno] = useState([]);

  const loadUsers = useCallback(async () => {
    await apiUsuarios
      .index()
      .then((response) => {
        var { alunos, professores } = response.data.data;

        setProfessor(professores);
        setAluno(alunos);
      })
      .catch((error) => toast.error(error.message));
  }, [setAluno, setProfessor]);

  const handleUpdateStatus = useCallback((id) => {
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
  }, [loadUsers]);

  const handleDeleteUser = useCallback((id) => {
    const deleteUser = async (id) => {
      apiUsuarios.destroy(id).then(response => {
        if (!response.data.data.erro) {
          toast.success(response.data.data.message);
        } else {
          toast.error(response.data.data.message);
        }
        loadUsers();
      }).catch(error => toast.error(error.message));
    }
    if(confirm('Deseja realmente recusar e excluir permanentemente a conta deste usuário?')){
      deleteUser(id);
    }
  }, [loadUsers]);

  useEffect(() => {
    loadUsers();
  }, []);

  return (
    <Container>
      <ListaAluno>
        <h1>Aluno:</h1>
        {aluno.map((item) => (
          <div key={item.id}>
            <p>{item.name}</p>
            <p>{item.curso}</p>
            <p>{item.serie}° Série</p>
            <div>
              <button type="button" onClick={() => handleUpdateStatus(item.id)}>
                Aprovar
              </button>
              <button type="button" onClick={() => handleDeleteUser(item.id)}>
                Remover
              </button>
            </div>
          </div>
        ))}
      </ListaAluno>
      <ListaProfessor>
        <h1>Professor:</h1>
        {professor.map((item) => (
          <section key={item.id}>
            <div style={{ marginBottom: "5px" }} className="prof-header">
              <p>
                <span style={{ color: "black", fontWeight: "bold" }}>
                  {item.name}:
                </span>{" "}
                {item.email}
              </p>
              <div>
                <button
                  type="button"
                  onClick={() => handleUpdateStatus(item.id)}
                >
                  Aprovar
                </button>
                <button type="button" onClick={() => handleDeleteUser(item.id)}>
                  Remover
                </button>
              </div>
            </div>
            <p style={{ color: "black", marginBottom: "0px" }}>Categorias:</p>
            <div className="categorias">
              {item.professor.categorias.map((cat) => (
                <p key={cat.categoria_id}>{cat.nome}</p>
              ))}
            </div>
          </section>
        ))}
      </ListaProfessor>
    </Container>
  );
};

export default Membros;
