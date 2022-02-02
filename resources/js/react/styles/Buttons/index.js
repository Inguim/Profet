import styled from "styled-components";

export const Button = styled.button`
  max-width: ${({ width }) => (width ? width : "127px")};
  width: 100%;
  border: 2px solid transparent;
  background: ${({ bgColor }) => `var(${bgColor})`};
  color: #fff;
  border-radius: 8px;
  font-size: 1.2rem;
  padding: 5px;
  align-self: ${({ align }) => (align ? align : "")};
  transition: all ease 0.3s;

  :hover {
    filter: brightness(90%);
    color: ${({ bgColor }) => `var(${bgColor})`};
    background: transparent;
    border: 2px solid ${({ bgColor }) => `var(${bgColor})`};
  }

  @media (max-width: 768px) {
    font-size: 1rem;
    max-width: inherit;
    margin-top: 20px;
  }
`;

export const ButtonLink = styled.button`
  display: inline-block;
  background: transparent;
  border: none;
  color: #086bab;
  transition: filter 0.2s;

  :hover {
    filter: brightness(90%);
    text-decoration: underline;
  }

  @media (max-width: 768px) {
    margin-right: 5px;
    font-size: 0.8rem;
    padding: 0;
  }
`;

export const ButtonSvg = styled.button`
  border: 1px solid ${({ bgColor }) => `var(${bgColor})`};
  border-radius: 4px;
  border: 0 6px;
  margin-right: 0.5rem;
  background: none;
  transition: all ease 0.3s;

  :hover {
    background: ${({ bgColor }) => `var(${bgColor})`};

    svg {
      fill: white;
    }
  }
`;
