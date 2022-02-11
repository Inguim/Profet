import React, { useEffect, useRef, useState } from "react";;
import { ButtonSlide, Slide } from "./styles";
import { IoIosArrowBack, IoIosArrowForward } from 'react-icons/io';

const Slider = ({ children, step = 220 }) => {
  const [ toStep, setToStep ] = useState(0);

  const container = useRef(null);

  const handleStep = (to, step) => {
    switch (to) {
      case 1:
        // var x = toStep + Math.round(window.innerWidth / 2);
        // if(x > 0){
        //     x = 0;
        // }
        // setToStep(x);
        break;

      case 2:
        // var x = toStep - Math.round(window.innerWidth / 2);
        // var listW = 8 * 220;
        // if(window.innerWidth - listW > x)
        // {
        //     x = (window.innerWidth - listW) - 60;
        // }
        // setToStep(x < 0 ? x * -1 : x);
        break;
    }
  };

  return (
    <Slide ref={container} step={toStep} >
      <ButtonSlide first direction={'to right'} onClick={() => handleStep(1, step)}>
        <IoIosArrowBack  size={30} />
      </ButtonSlide>
        {children}
      <ButtonSlide direction={'to left'} onClick={() => handleStep(2, step)}>
        <IoIosArrowForward  size={30} />
      </ButtonSlide>
    </Slide>
  )
}

export default Slider;
