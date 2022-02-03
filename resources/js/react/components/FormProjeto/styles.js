import styled from "styled-components";
import { Select } from "../../styles/Inputs";

export const Form = styled.form`
  background: #ffffff;
  display: flex;
  flex-direction: column;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  width: 80%;
  max-width: 100%;
  padding: 10px;
  margin-bottom: 40px;
`;

export const Participantes = styled.ul`
  margin-top: 1.5rem;
  list-style-type: none;
  margin: 0;
  padding: 0;

  li {
    font-size: 1rem;
    border-bottom: 1px solid black;
    margin-bottom: 0.5rem;
    padding: 0 0 0.5rem 0;
    display: flex;
    align-items: center;

    div,
    button {
      display: inline-block;
    }

    button {
      margin-right: 8px;
    }

    p {
      margin-bottom: 0;
      font-weight: bold;

      span {
        font-weight: 500;
        text-transform: capitalize;
      }
    }
  }

  button {
    border: 1px solid #c15959;
    border-radius: 4px;
    border: 0 6px;
    margin-right: 0.5rem;
    background: none;
    transform: 1ms all ease;

    :hover {
      background: #c15959;

      svg {
        fill: white;
      }
    }
  }

  @media (max-width: 768px) {
    li {
      font-size: 0.9rem;
    }
  }
`;

export const ProjetoDados = styled.div`
  margin-top: 10px;
  width: 100%;
`;

export const CampoGrupo = styled.div`
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-bottom: 15px;

  ${Select} {
    margin-bottom: 8px;
  }
`;
