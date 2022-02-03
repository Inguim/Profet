import styled from "styled-components";
import { ButtonLink } from "../../../styles/Buttons";

export const Lista = styled.div`
  background: #ffffff;
  display: flex;
  flex-direction: column;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  width: 80%;
  max-width: 100%;
  padding: 10px;
  margin-bottom: 40px;
  font-size: 1.1rem;

  div {
    margin-bottom: 10px;

    p:first-child {
      font-weight: bold;
    }

    p {
      color: #424242;
      display: block;
      margin: 0;
    }

    p + div {
      justify-content: space-between;
      width: 100%;

      ${ButtonLink}:first-child {
        margin-left: -5px;
      }
    }

    div {
      margin-bottom: 0;
      float: right;
    }
  }

  @media (max-width: 768px) {
    border-bottom: 1px solid black;
    font-size: 0.8rem;

    div {
      border-bottom: 1px solid black;
      margin-bottom: 10px;

      p {
        display: block;
        margin-bottom: 0;
      }

      p + div ${ButtonLink}:first-child {
        margin-left: 0;
      }

      div {
        border-bottom: none;

        ${ButtonLink} {
          margin-right: 10px;
        }

        ${ButtonLink}:last-child {
          margin-right: 0;
        }
      }
    }

    div + ${ButtonLink} {
      margin-left: -5px;
    }
  }

  @media(max-width: 400px) {
    div div div{
      display: block;
      float: left;
    }
  }
`;
