import styled from "styled-components";
import { ButtonLink } from "../../../styles/Buttons";

export const Solicitacao = styled.div`
  font-size: 1.1rem;
  margin: 10px 0;
  border-bottom: 1px solid black;

  p {
    margin: 0;
  }

  @media(max-width: 768px) {
    font-size: 0.9rem;
  }
`;

export const Header = styled.header`
  margin-bottom: 5px;

  h3 {
    font-size: 1.4rem;
    margin: 0;
    font-weight: bold;
    display: inline-block;
  }

  span {
    display: inline-block;
    font-weight: 400;
    font-style: italic;
    color: var(--gray);
    font-size: 0.9rem;
    float: right;
  }

`;

export const Actions = styled.section`
  margin: 5px 0 0 0;

  ${ButtonLink} {
    padding-left: 0;
    font-size: 1rem;
  }

  ${ButtonLink} + ${ButtonLink} {
    float: right;
    margin-top: 2px;
  }
`;
