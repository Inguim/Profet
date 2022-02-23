import React, { useRef, useState } from "react";
import { ButtonSlide, Slide } from "./styles";
import { IoIosArrowBack, IoIosArrowForward } from "react-icons/io";

const Slider = ({ children, step = 260, width, onSlideEnd, type }) => {
  const [toStep, setToStep] = useState(0);
  const [paginate, setPaginate] = useState(1);

  const container = useRef(null);

  const handleStep = async (to, step) => {
    let x;
    switch (to) {
      case 1:
        x = toStep + Math.round(window.innerWidth / 2);
        if (x > 0) {
          x = 0;
        }
        setToStep(x);
        break;

      case 2:
        x = toStep - Math.round(window.innerWidth / 2);
        let listW = width * step;
        if (window.innerWidth - listW > x) {
          x = window.innerWidth - listW - 60;
          onSlideEnd(type, paginate);
          setPaginate((prev) => prev + 1);
        }
        setToStep(x);
        break;
    }
  };

  return (
    <Slide ref={container} width={width * step} marginLeft={toStep}>
      {Math.floor(screen.width / width) < width * step && (
        <ButtonSlide
          first
          direction={"to right"}
          onClick={() => handleStep(1, step)}
        >
          <IoIosArrowBack size={30} />
        </ButtonSlide>
      )}
      {children}
      {Math.floor(screen.width / width) < width * step && (
        <ButtonSlide direction={"to left"} onClick={() => handleStep(2, step)}>
          <IoIosArrowForward size={30} />
        </ButtonSlide>
      )}
    </Slide>
  );
};

export default Slider;
