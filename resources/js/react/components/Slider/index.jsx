import React from "react";;
import { ButtonSlide, Slide } from "./styles";

const Slider = ({ children }) => {
  return (
    <Slide>
      <ButtonSlide>{"<"}</ButtonSlide>
        {children}
      <ButtonSlide>{">"}</ButtonSlide>
    </Slide>
  )
}

export default Slider;
