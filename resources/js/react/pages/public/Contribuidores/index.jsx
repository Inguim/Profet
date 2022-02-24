import React, { useEffect, useState } from "react";
import { toast } from "react-toastify";
import LoadingCallback from "../../../components/LoadingCallback";
import { apiContribuidores } from "../../../services/data";
import { Container } from "../../../styles/Container";
import { Title } from "../../../styles/Texts";
import { getUser } from "../../../utils/githubApi";
import { Card, Cards, Header, Section } from "./styles";

const Contribuidores = () => {
  const [contribuidores, setContribuidores] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const url = process.env.MIX_APP_URL;

  const fetchUser = async (username) => {
    return await getUser(username);
  };

  const handleContribuidores = () => {
    apiContribuidores
      .index()
      .then((response) => {
        response.data.data.map((user) => {
          fetchUser(user.github_username).then((response) => {
            setContribuidores((prev) => [
              ...prev,
              {
                ...response,
                contribuicao: user.tipo_contribuicao.nome,
                id: user.user_id,
              },
            ]);
          });
        });
        setIsLoading(false);
      })
      .catch(() => toast.error("Algo deu errado entre você e o servidor!"));
  };

  useEffect(() => {
    handleContribuidores();
  }, []);

  return (
    <Container>
      {isLoading ? (
        <LoadingCallback />
      ) : (
        <Section>
          <Header>
            <Title>Equipe</Title>
            <div></div>
          </Header>
          <Cards>
            {contribuidores.map((contribuidor, index) => (
              <Card key={index}>
                <div>
                  <img
                    src={contribuidor.cover_url}
                    alt={contribuidor.username}
                  />
                </div>
                <a href={`${url}/usuario/${contribuidor.id}`}>
                  <h3>{contribuidor.username}</h3>
                </a>
                <h6>{contribuidor.location}</h6>
                <p>{contribuidor.bio}</p>
                <h5>{contribuidor.contribuicao}</h5>
                <a href={`${contribuidor.git}`}>Perfil de desenvolvedor</a>
              </Card>
            ))}
          </Cards>
        </Section>
      )}
    </Container>
  );
};

export default Contribuidores;
