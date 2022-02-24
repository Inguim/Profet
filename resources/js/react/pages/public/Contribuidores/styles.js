import styled from "styled-components";
import { Box } from "../../../styles/Card";
import { Title } from "../../../styles/Texts";

export const Section = styled.section`
  max-width: 1200px;
  width: 100%;
  background: white;
  padding: 20px;
  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;
`;

export const Card = styled(Box)`
  padding: 10px 5px;
  text-align: center;
  box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
  background-color: rgba(33, 37, 41, 0.95);
  color: white;

  :hover {
    background-color: #243549;
  }

  div {
    background: linear-gradient(
      to bottom right,
      #b827fc 0%,
      #2c90fc 25%,
      #b8fd33 50%,
      #fec837 75%,
      #fd1892 100%
    );
    border-radius: 50%;

    img {
      padding: 2px;
      max-width: 150px;
      border-radius: 50%;
    }
  }

  div + a {
    color: white;
    :hover {
      color: #3490dc;
    }
  }

  h3 {
    margin: 10px 0;
  }

  h5 {
    margin: 2px 0 10px 0;
    border: 1px solid white;
    padding: 5px;
    border-radius: 5px;
  }

  h6 {
    margin: 5px 0;
    text-transform: uppercase;
  }

  a {
    margin-top: 10px;
    font-size: 0.8rem;
  }

  p {
    margin-top: 10px;
    font-size: 1rem;
    line-height: 21px;
  }
`;

export const Cards = styled.div`
  display: grid;
  justify-content: center;
  grid-template-columns: repeat(auto-fill, 270px);
`;

export const Header = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  ${Title} {
    text-align: center;
    margin-bottom: 2px;
    background: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  div {
    height: 5px;
    max-width: 120px;
    width: 100%;
    border-radius: 5px;
    background-color: #663dff;
    background-image: linear-gradient(
      319deg,
      #663dff 0%,
      #aa00ff 37%,
      #cc4499 100%
    );
  }
`;
