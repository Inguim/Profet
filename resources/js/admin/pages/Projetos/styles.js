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

export const Lista = styled.div`
    background: #FFFFFF;
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
        font-weight: bold
    }

    div {
        margin-bottom: 10px;

        p {
            color: #424242;
            display: block;
            margin: 0;
        }

        div {
            margin-bottom: 0;
            float: right;

            button {
                display: inline-block;
                background: transparent;
                border: none;
                color: #086BAB;
                transition: filter 0.2s;
                padding-left: 0;

                :hover {
                    filter: brightness(90%);
                    text-decoration: underline;
                }
            }
        }
    }

    @media(max-width: 768px) {
        border-bottom: 1px solid black;
        font-size: 0.8rem;

        h1 {
            font-size: 1.5rem;
        }

        div {
            border-bottom: 1px solid black;
            margin-bottom: 10px;

            p {
                display: block;
                margin-bottom: 0;
            }

            div {
                border-bottom: none;

                button {
                    margin-right: 10px;
                    font-size: 0.75rem;
                    padding: 0;
                }
            }
        }
    }
`;

