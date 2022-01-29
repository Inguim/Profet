import React, { useEffect } from "react";
import ReactDOM from "react-dom";
import { CgClose } from "react-icons/cg";
import { ButtonClose, Modal, ModalContent } from "./styles";

const ContainerModal = (props) => {
  const closeOnEscapeKeyDown = (e) => {
    if ((e.charCode || e.keyCode) === 27) {
      props.onClose();
    }
  };

  useEffect(() => {
    document.body.addEventListener("keydown", closeOnEscapeKeyDown);
    return function cleanup() {
      document.body.removeEventListener("keydown", closeOnEscapeKeyDown);
    };
  }, []);

  useEffect(() => {
    props.show ? document.body.style.overflowY = 'hidden' : document.body.style.overflowY = 'auto';
  }, [props.show]);


  return ReactDOM.createPortal(
    <Modal isShow={props.show} onClick={props.onClose}>
      <ModalContent onClick={(e) => e.stopPropagation()}>
        <div>
          <ButtonClose>
            <CgClose onClick={props.onClose} color="#ff4040" size={25} />
          </ButtonClose>
        </div>
        {props.children}
      </ModalContent>
    </Modal>,
    document.getElementById("admin-area")
  );
};

export default ContainerModal;
