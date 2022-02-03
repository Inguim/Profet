import styled from 'styled-components';

export const Container = styled.section`
    width: 100%;
    max-width: 100vw;
    min-height: 100vh;
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-rendering: optimizelegibility;
    -webkit-font-smoothing: antialiased !important;
    font-size: 62.5%;
`;

export const ContainerLoading = styled.div`
  display: flex;
  color: ${({ color }) => color ? `var(${color})` : `var(--blue)`};
  align-items: ${({ align }) => align ? align : 'center'};
  justify-content: ${({ justify }) => justify ? justify : 'center'};
`;
