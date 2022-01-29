import styled from "styled-components";

export const Container = styled.section`
    width: 100%;
    max-width: 100vw;
    min-height: 100vh;;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-rendering: optimizelegibility;
    -webkit-font-smoothing: antialiased !important;
    font-size: 62.5%;
`;

export const Projeto = styled.div`
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
        text-transform: uppercase;
    }

    button {
        float: right;
        background: transparent;
        border: none;
        color: #086bab;
        font-size: 1.2rem;
        transition: filter 0.2s;

        :hover {
            filter: brightness(90%);
            text-decoration: underline;
        }
    }

    header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 1.5rem;
        }

        button {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 600px) {
        h1 {
            font-size: 1.2rem;
        }

        button {
            font-size: 0.9rem;
        }

        header {
            flex-direction: column;
            justify-content: center;

            h1 {
                text-align: center;
            }

            button {
                float: none;
            }
        }
    }
`;

export const Section = styled.section`
    margin-bottom: 15px;

    h2 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 2px;
    }

    p {
        font-size: 1rem;
        color: #424242;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        h2 {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 600px) {
        h2 {
            font-size: 1rem;
        }

        p {
            font-size: 0.8rem;
        }
    }
`;
