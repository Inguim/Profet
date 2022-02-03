import styled from "styled-components";
import { Select } from "../../../styles/Inputs";
import { Label } from "../../../styles/Texts";

export const Search = styled.div`
  background: #ffffff;
  display: flex;
  flex-direction: column;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  width: 80%;
  max-width: 100%;
  padding: 10px;
  margin-bottom: 40px;

  div {
    margin-bottom: 1rem;
  }

  div {
    display: flex;
    align-items: center;
    flex-direction: row;
  }

  section {
    section,
    ${Label} {
      display: block;
    }

    ${Select} {
      font-size: 1rem;
      margin-bottom: 1rem;
    }
  }
`;

export const Results = styled.ul`
  margin-top: 1.5rem;
  list-style-type: none;
  margin: 0;
  padding: 0;

  li {
    font-size: 1rem;
    border-bottom: 1px solid black;
    margin-bottom: 0.5rem;
    padding: 0 0 0.5rem 0;

    ${Select} {
      float: right;
      border: none;
      width: auto;
    }
  }

  @media (max-width: 768px) {
    li {
      font-size: 0.9rem;
    }
  }
`;
