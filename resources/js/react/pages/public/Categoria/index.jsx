import React, { useCallback, useEffect, useState } from "react";
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

  const handleOnDragEnd = useCallback(
    async (type, paginate) => {
      switch (type) {
        // case 1:
        //   await apiCategoriasFiltro.show(slug, paginate, 'recentes').then(response => {
        //     console.log(response.data.data);
        //         if(response.data.data.length > 0) {
        //           setRecentes(prev => [...prev, ...response.data.data]);
        //         } else {
        //           toast.info('Não existe mais projetos nessa divisão', { toastId: type });
        //         }
        // //   }).catch(() => console.log('Algo deu errado!'));
        //   break;

        case 2:
          await apiCategoriasFiltro
            .show(slug, paginate, "andamento")
            .then((response) => {
              if (response.data.data.length > 0) {
                setAndamento((prev) => [...prev, ...response.data.data]);
              } else {
                toast.info("Não existe mais projetos nessa divisão", {
                  toastId: type,
                });
              }
            })
            .catch(() => console.log("Algo deu errado!"));
          break;

        case 3:
          await apiCategoriasFiltro
            .show(slug, paginate, "concluido")
            .then((response) => {
              if (response.data.data.length > 0) {
                setConcluidos((prev) => [...prev, ...response.data.data]);
              } else {
                toast.info("Não existe mais projetos nessa divisão", {
                  toastId: type,
                });
              }
            })
            .catch(() => console.log("Algo deu errado!"));
          break;
      }
    },
    [setRecentes, setAndamento, setConcluidos, slug]
  );

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
                        <Slider
                          width={recentes.length}
                          slug={slug}
                          type={item.type}
                          onSlideEnd={handleOnDragEnd}
                        >
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
                        <Slider
                          width={andamento.length}
                          slug={slug}
                          type={item.type}
                          onSlideEnd={handleOnDragEnd}
                        >
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
                        <Slider
                          width={concluidos.length}
                          slug={slug}
                          type={item.type}
                          onSlideEnd={handleOnDragEnd}
                        >
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
