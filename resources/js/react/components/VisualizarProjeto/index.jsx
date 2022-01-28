import React, { useCallback, useEffect, useState } from "react";
import { toast } from "react-toastify";
import { apiProjetos } from "../../services/data/index.js";
import { Container, Projeto, Section } from "./styles.js";

const VisualizarProjeto = ({ projetoId }) => {
  const [projeto, setProjeto] = useState({});

  const fetchProjeto = useCallback(async (projetoId) => {
    await apiProjetos.show(projetoId).then(response => {
      console.log(response.data.data);
      setProjeto(response.data.data);
    }).catch(error => toast.error(error.message));
  }, [setProjeto])

  useEffect(() => {
    if(projetoId > 0) {
      fetchProjeto(projetoId)
    }
  }, [projetoId]);

  return (
    <Container>
      <Projeto>
        <header>
          <h1>{projeto.nome}</h1>
        </header>
        <Section>
          <p>Orientador: Marcelo Corrêa Mussel</p>
          <p>Área de Atuação: Ciências Exatas e da Terra</p>
          <p>Autores: Bruna Castilho, Wasleny Pimenta</p>
          <p>{projeto.created_at}</p>
          <p>Estado Atual: Prototipação</p>
        </Section>
        <Section>
          <h2>Resumo</h2>
          <p>
            É um jogo de viagem no tempo que tenta usar este conceito, para
            explicar materias escolares de forma didatica porém em um jogo.
          </p>
        </Section>
        <Section>
          <h2>Introdução</h2>
          <p>
            O interesse em desenvolver um projeto na área de informática com o
            intuito de colocar em prática os conceitos e ferramentas a prendidas
            em sala de aula e de averiguar se de fato queremos seguir a área,
            além do estímulo de professores da área, fez com que a ideia do jogo
            surgisse. O projeto consiste em desenvolver um jogo de escolhas que
            abordam diversos temas diferentes: como machismo, consumismo
            radical, racismo e preconceito.
          </p>
        </Section>
        <Section>
          <h2>Objetivos</h2>
          <p>
            Criar um jogo descontraído e que ao mesmo tempo que é divertido
            também é educativo; tornando mais fácil a fixação de matérias como
            História, Sociologia e Filosofia
          </p>
        </Section>
        <Section>
          <h2>Resultados e Discussões</h2>
          <p>
            O jogo passará em várias épocas diferentes, dependendo das escolhas
            do jogador, já que na época futurista do jogo, existem duas
            máquinas, uma chamada Chronos e a outra chamada Gaia, que
            possibilitam a viagem no tempo. Porém, os usuários das máquinas não
            podem passar muito tempo no mesmo lugar, já que podem acabar
            interferindo no que já aconteceu, podendo causar problemas
            catastróficos. A história do jogo gira em torno do fato de que a uma
            das máquinas falha enquanto vários pesquisadores estavam em
            “serviço”, ou seja, em épocas diferentes à que pertencem e ficam
            presos nessas épocas. O jogador terá que resgatar esses
            pesquisadores antes que algo muito ruim aconteça.
          </p>
        </Section>
        <Section>
          <h2>Conclusão</h2>
          <p>
            Pretendemos concluir o enredo do jogo, além de caracterizar os
            demais personagens e colocar em prática o desenvolvimento do jogo
            através da programação.
          </p>
        </Section>
      </Projeto>
    </Container>
  );
};

export default React.memo(VisualizarProjeto);
