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

  h1 {
    font-size: 2rem;
    font-weight: bold;
  }

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

      button {
        display: inline-block;
        background: transparent;
        border: none;
        color: #086bab;
        transition: filter 0.2s;

        :hover {
          filter: brightness(90%);
          text-decoration: underline;
        }
      }
    }
  }

  @media (max-width: 820px) {
    border-bottom: 1px solid black;
    font-size: 0.8rem;

    h1 {
      font-size: 1.5rem;
    }

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

        button {
          margin-right: 5px;
          font-size: 0.75rem;
          padding: 0;
        }
      }
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
  }

  section + section {
    border-top: 1px solid black;
  }

  h1 {
    font-size: 2rem;
    font-weight: bold;
  }

  .categorias {
    p {
      display: block;
    }
  }

  div {
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

    .prof-header {
      display: flex;
      flex-direction: column;
      flex-flow: column-reverse;
    }

    h1 {
      font-size: 1.5rem;
    }

    div {
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
