import styled from "styled-components";

export const Modal = styled.div`
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 1000;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease-in-out;
  ${(props) =>
    !props.isShow
      ? `opacity: 0;
    pointer-events: none;`
      : `opacity: 1;
    pointer-events: visible;`}
`;

export const ModalContent = styled.div`
  width: 50%;
  max-height: 80%;
  overflow-y: auto;
  background-color: white;
  padding: 5px;
  border: 1px solid silver;
  border-radius: 5px;
  box-shadow: 2px 3px 5px rgba(0, 0, 0, 0.1);
  ::-webkit-scrollbar {
    width: 0px;
  }
`;

export const ButtonClose = styled.button`
  border: none;
  background-color: white;
  width: 100%;
  svg {
    float: right;
  }
`;
