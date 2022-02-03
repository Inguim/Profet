import styled from "styled-components";

export const ListaAluno = styled.div`
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
    margin-bottom: 5px;

    p {
      color: #424242;
      display: inline-block;
      margin-right: 15px;
      margin-bottom: 0;
    }

    div {
      margin-bottom: 0;
      float: right;
    }
  }

  @media (max-width: 820px) {
    border-bottom: 1px solid black;
    font-size: 0.8rem;

    div {
      border-bottom: 1px solid black;
      margin-bottom: 10px;

      p {
        display: block;
        margin-bottom: 0;
      }

      div {
        float: left;
        border-bottom: none;
      }
    }
  }
`;

export const HeaderProfessor = styled.div`
  margin-bottom: 5px;

  p {
    color: #424242;
    display: inline-block;
    margin-right: 15px;
    margin-bottom: 0;

     span {
      color: black;
      font-weight: bold;
     }
  }

  div {
    margin-bottom: 0;
    float: right;
  }

  @media (max-width: 820px) {
    display: flex;
    flex-direction: column;
    flex-flow: column-reverse;
    margin-bottom: 10px;

    p {
      display: block;
      margin-bottom: 0;
    }

    div {
      float: left;
      border-bottom: none;
    }
  }
`;

export const ListaProfessor = styled.div`
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

  section {
    display: flex;
    flex-direction: column;
    padding: 5px 0;

    ${HeaderProfessor} + p {
      color: black;
      margin-bottom: 5px;
      font-weight: bold;
    }

    div p {
      display: block;
      margin-bottom: 0;
    }
  }

  section + section {
    border-top: 1px solid black;
  }

  @media (max-width: 820px) {
    border-bottom: 1px solid black;
    font-size: 0.8rem;
  }
`;


