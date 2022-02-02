import styled from "styled-components";

export const Title = styled.h1`
  font-size: 2rem;
  font-weight: bold;

  @media(max-width: 768px) {
    font-size: 1.5rem;
  }
`;

export const Label = styled.div`
  margin-bottom: ${({ mgBottom }) => mgBottom ? mgBottom : '10px'};
  font-size: 1.1rem;
  font-weight: bold;
  color: ${({ hasError }) => hasError ? 'var(--red)' : 'black'};

  ::before {
    display: ${({ hasError }) => hasError ? 'inline' : 'none'};
    content: "*";
  }

  @media(max-width: 768px) {
    font-size: 1rem;
`;
