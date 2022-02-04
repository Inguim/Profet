import styled from "styled-components";

export const Form = styled.form`
  display: flex;
  flex-direction: column;
  align-items: ${({ align }) => align ? align : 'center'};
  justify-content: center;
  padding: 10px;
`;

export const Column = styled.div`
  display: flex;
  margin-bottom: ${({ mgBottom }) => mgBottom ? mgBottom : '10px'};
`;
