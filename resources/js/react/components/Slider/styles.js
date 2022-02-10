import styled from "styled-components";
import { Box } from "../CardSlider/styled";

export const ButtonSlide = styled.button`
  height: 290px;
  position: absolute;
  z-index: 1;
  width: 20px;
`;

export const Slide = styled.div`
  display: flex;
  max-width: 100vw;
  width: 100%;
  overflow-x: auto;
  ::-webkit-scrollbar {
    width: 0px;
  }

  ${ButtonSlide} + ${Box} {
    margin-left: 25px;
  }

  ${Box} + ${ButtonSlide} {
    right: 0;
  }
`;

