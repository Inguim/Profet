import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { toast } from "react-toastify";
import CardSlider from "../../../components/CardSlider";
import LoadingCallback from "../../../components/LoadingCallback";
import Slider from "../../../components/Slider";
import { apiCategoriasFiltro } from "../../../services/data";
import { redirectTo } from "../../../utils/redirectTo";
import { Container, Message, TitleSlider, Wrapper, Fill } from "./styles";

const Categoria = () => {
  const { slug } = useParams();
  const [recentes, setRecentes] = useState([]);
  const [andamento, setAndamento] = useState([]);
  const [concluidos, setConcluidos] = useState([]);
  const [isLoading, setIsLoading] = useState(true);

  const sliders = [
    { id: "1@recentes", title: "Recentes", type: 1 },
    { id: "2@andamento", title: "Em Andamento", type: 2 },
    { id: "3@concluidos", title: "Concluidos", type: 3 },
  ];

  async function fetchData(slug) {
    await apiCategoriasFiltro
      .index(slug)
      .then((response) => {
        setRecentes([...response.data.data.recentes]);
        setAndamento([...response.data.data.andamento]);
        setConcluidos([...response.data.data.concluido]);
        setIsLoading(false);
      })
      .catch(() =>
        toast.error("Algo deu errado ao tentar carregar os projetos")
      );
  }

  useEffect(() => {
    fetchData(slug);
    document.body.style.overflowX = "hidden";
  }, []);

  return (
    <Container>
      {isLoading ? (
        <LoadingCallback />
      ) : (
        <>
          {recentes.length <= 0 &&
          andamento.length <= 0 &&
          concluidos.length <= 0 ? (
            <Fill>
              <p>Ainda não há nenhum projeto nessa categoria 🙈</p>
              <p>
                Mas, talvez o primeiro possa ser o seu, basta clickar{" "}
                <span onClick={() => redirectTo("projeto/novo")}>aqui</span> !!.
                Ou caso ainda não tenha se cadastrado na plataforma, cadastre-se
                por <span onClick={() => redirectTo("register")}>aqui</span>
              </p>
            </Fill>
          ) : (
            <>
              {sliders.map((item, index) => (
                <Wrapper
                  id={item.id}
                  key={item.id}
                  isLast={index + 1 === sliders.length}
                >
                  <TitleSlider>{item.title}</TitleSlider>
                  {item.type === 1 && (
                    <>
                      {recentes.length <= 0 ? (
                        <Message>
                          Ainda não existe nenhum projeto nessa divisão 🙈
                        </Message>
                      ) : (
                        <Slider>
                          {recentes.map((projeto) => (
                            <CardSlider
                              key={
                                Math.floor(Math.random() * 1000 + 1) +
                                projeto.nome
                              }
                              projeto={projeto}
                            />
                          ))}
                        </Slider>
                      )}
                    </>
                  )}
                  {item.type === 2 && (
                    <>
                      {andamento.length <= 0 ? (
                        <Message>
                          Ainda não existe nenhum projeto nessa divisão 🙈
                        </Message>
                      ) : (
                        <Slider>
                          {andamento.map((projeto) => (
                            <CardSlider
                              key={
                                Math.floor(Math.random() * 1000 + 1) +
                                projeto.nome
                              }
                              projeto={projeto}
                            />
                          ))}
                        </Slider>
                      )}
                    </>
                  )}
                  {item.type === 3 && (
                    <>
                      {concluidos.length <= 0 ? (
                        <Message>
                          Ainda não existe nenhum projeto nessa divisão 🙈
                        </Message>
                      ) : (
                        <Slider>
                          {concluidos.map((projeto) => (
                            <CardSlider
                              key={
                                Math.floor(Math.random() * 1000 + 1) +
                                projeto.nome
                              }
                              projeto={projeto}
                            />
                          ))}
                        </Slider>
                      )}
                    </>
                  )}
                </Wrapper>
              ))}
            </>
          )}
        </>
      )}
    </Container>
  );
};

export default Categoria;
