import styled from "styled-components";
import { Box } from "../CardSlider/styled";

export const ButtonSlide = styled.button`
  height: 355px;
  width: 30px;
  position: absolute;
  z-index: 1;
  width: 20px;
  background-image: ${({ direction }) => `linear-gradient( ${direction},  rgba(53,114,149,0.5074404761904762) 0%, rgba(119,147,161,0.45) 21%, rgba(99,183,191,0.14) 56%, rgba(8,183,191,0) 100%  )`};
  border: none;
  left: ${({ first }) => first ? `0px`: ''};
  opacity: 0.5;
  transition: opacity ease-in-out 0.4s;

  svg {
    margin: 0;
    padding: 0;
    position: relative;
    left: -12px;
    z-index: +1;
    fill: #327da8;
  }

  :hover {
    opacity: 1.5;
  }
`;

export const Slide = styled.div`
  display: flex;
  width: ${({ width }) => width + 'px'};
  margin-left: ${({ marginLeft }) => marginLeft + 'px'};
  overflow-x: hidden;
  transition: all ease-in-out 1s;

  ::-webkit-scrollbar {
    width: 0;
  }

  ${Box} + ${ButtonSlide} {
    right: 0;
    right: -3px;
  }

  :hover {
    ${ButtonSlide} {
      opacity: 0.8;
    }
  }
`;

