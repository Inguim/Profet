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

export const Border = styled.div`
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
`;

export const ContainerLoading = styled.div`
  display: flex;
  flex-direction: ${({ column }) => column ? `column` : `row`};
  color: ${({ color }) => color ? `var(${color})` : `var(--blue)`};
  align-items: ${({ align }) => align ? align : 'center'};
  justify-content: ${({ justify }) => justify ? justify : 'center'};
`;
