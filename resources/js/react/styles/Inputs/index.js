import styled from "styled-components";

export const Input = styled.input`
  margin-bottom: ${({ mgBottom }) => (mgBottom ? mgBottom : "10px")};
  border: 1px solid ${({ hasError }) =>
    hasError ? "var(--red)" : "var(--dark-white)"};
  border-radius: 5px;
  height: ${({ isTextArea }) => (isTextArea ? "100px" : "40px")};
  font-size: 0.9rem;
  transition: all ease-in-out 0.3s;
  outline: none;
  padding: 0 5px;
  width: ${({ width }) => (width ? width : "100%")};
  overflow: hidden;

  ${({ hasError }) =>
    !hasError &&
    `:not(:placeholder-shown) {
      border: none;
      border-radius: 0;
      border-bottom: 3px solid var(--dark-green)};
    }`
  }

  ::placeholder {
    color: ${({ hasError }) => (hasError ? "var(--red)" : "")};
  }

  :focus {
    background-color:  ${({ hasError }) =>
      hasError ? "var(--red-rgba)" : "var(--light-gray-rgba)"};
    border: none;
    border-radius: 0;
    border-bottom: 3px solid ${({ hasError }) =>
      hasError ? "var(--red)" : "var(--blue)"};
  }

  @media (max-width: 768px) {
    height: ${({ isTextArea }) => (isTextArea ? "80px" : "35px")};
    font-size: 0.8rem;
  }
`;

export const InputSearch = styled(Input)`
`;

export const Select = styled.select`
  margin-bottom: ${({ mgBottom }) => (mgBottom ? mgBottom : "10px")};
  border: 1px solid
    ${({ hasError }) => (hasError ? "var(--red)" : "var(--dark-white)")};
  border-radius: 5px;
  height: ${({ isTextArea }) => (isTextArea ? "100px" : "40px")};
  font-size: 0.9rem;
  transition: all ease-in-out 0.3s;
  outline: none;
  padding: 0 5px;
  width: 100%;
  overflow: hidden;
  background: transparent;

  ::placeholder {
    color: ${({ hasError }) => (hasError ? "var(--red)" : "")};
  }

  :focus {
    background-color: ${({ hasError }) =>
      hasError ? "var(--red-rgba)" : "var(--light-gray-rgba)"};
    border: none;
    border-radius: 0;
    border-top: 3px solid
      ${({ hasError }) => (hasError ? "var(--red)" : "var(--blue)")};
  }

  option {
    background-color: var(--light-gray-rgba);
  }

  @media (max-width: 768px) {
    font-size: 0.8rem;
  }
`;
