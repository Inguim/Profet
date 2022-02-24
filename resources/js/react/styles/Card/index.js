import styled from "styled-components";

export const Box = styled.div`
  min-width: 260px;
  max-width: 270px;
  min-height: 290px;
  height: inherit;
  border-radius: 5px;
  transition: all ease-in-out 0.2s;
  transform: scale(90%);
  box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.5);
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 1.1rem;

  :hover {
    transform: scale(95%);
    box-shadow: 0px 0px 15px 3px #00000080;
    background-color: rgb(184 184 184 / 13%);
  }
`;
