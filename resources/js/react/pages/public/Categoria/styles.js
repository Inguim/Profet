import styled from "styled-components";
import { Container as C } from "../../../styles/Container";

export const Container = styled(C)`
  min-height: 0;
  font-size: 0.9rem;
  margin-top: 10px;
  margin-bottom: 5px;
`;

export const Wrapper = styled.div`
  width: 100%;
  margin-bottom: 10px;
  border-bottom: ${({ isLast }) => !isLast ? `1px solid black` : ''};
  padding-bottom: 10px;
`;

export const TitleSlider = styled.h3`
  margin-bottom: 0px;
  font-weight: bold;
`;

export const Message = styled.span`
  font-size: 1.1rem;
  font-weight: bold;
  width: 100%;
  align-self: center;
`;

export const Fill = styled.div`
  width: 100%;
  height: 60vh;
  text-align: center;
  padding-top: 20px;

  p {
    margin: 0;

    span {
      color: blue;
      cursor: pointer;

      :hover {
        text-decoration: underline;
      }
    }
  }

  p + p {
    margin-top: 10px;
  }


`;
