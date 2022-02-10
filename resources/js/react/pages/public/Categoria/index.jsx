import React from "react";
import { useParams } from "react-router-dom";
import CardSlider from "../../../components/CardSlider";
import Slider from "../../../components/Slider";
import { Container, TitleSlider, Wrapper } from "./styles";

const Categoria = () => {
  const { slug } = useParams();
  document.body.style.overflowX = "hidden";

  return (
    <Container>
      <Wrapper>
        <TitleSlider>Okay</TitleSlider>
        <Slider>
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider isLast />
        </Slider>
      </Wrapper>
      <Wrapper>
        <TitleSlider>Okay</TitleSlider>
        <Slider>
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider />
          <CardSlider isLast />
        </Slider>
      </Wrapper>
    </Container>
  )
}

export default Categoria;
