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

export const Search = styled.div`
    background: #FFFFFF;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    border-radius: 4px;
    width: 80%;
    max-width: 100%;
    padding: 10px;
    margin-bottom: 40px;

    h1 {
        font-size: 2rem;
        font-weight: bold
    }

    div {
        margin-bottom: 1rem;
    }

    label {
        font-size: 1.1rem;
    }

    div {
        display: flex;
        align-items: center;
        flex-direction: row;
    }

    input {
        background: #EAEAEA;
        border: 2px solid #A4A0A0;
        width: 50%;
        border-radius: 8px 0 0 8px;
        height: 40px;
        font-size: 1rem;
    }

    section {
        section, label {
            display: block
        }

        select {
            border: none;
            font-size: 1rem;
            border: 1px solid black;
            margin-bottom: 1rem;
        }
    }

    @media(max-width: 768px) {
        h1 {
            font-size: 1.5rem;
        }

        label {
            font-size: 1rem;
        }

        input {
            height: 30px;
            font-size: 0.9rem;
        }
    }
`;

export const Button = styled.button`
    max-width: 127px;
    border: 0;
    background: #59C15D;
    color: #fff;
    border-radius: 0 8px 8px 0;
    font-weight: bold;
    font-size: 1.2rem;
    padding: 5px;
    transition: filter 0.2s;
    align-content: center;

    :hover {
        filter: brightness(90%);
    }

    @media(max-width: 768px) {
        font-size: 1.1rem;
        padding: 1px 5px;
    }
`;

export const Results = styled.ul`
    margin-top: 1.5rem;
    list-style-type: none;
    margin: 0;
    padding: 0;

    h1 {
        font-size: 1.5rem;
        font-weight: bold
    }

    li {
        font-size: 1rem;
        border-bottom: 1px solid black;
        margin-bottom: 0.5rem;
        padding: 0 0 0.5rem 0;


        select {
            float: right;
            border: none;
        }
    }

    button {
        border: 1px solid #59C15D;
        border-radius: 4px;
        border: 0 6px;
        margin-right: 0.5rem;
        background: none;
        transform: 1ms all ease;

        :hover {
            background: #59C15D;

            svg {
                fill: white;
            }
        }
    }

    @media(max-width: 768px) {
        h1 {
            font-size: 1.1rem;
        }

        li {
            font-size: 0.9rem;
        }
    }
`;
