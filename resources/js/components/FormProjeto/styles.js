import styled from 'styled-components';

export const Form = styled.form`
    background: #FFFFFF;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    border-radius: 4px;
    width: 80%;
    max-width: 100%;
    padding: 10px;
    margin-bottom: 40px;
`;

export const Participantes = styled.ul`
    margin-top: 1.5rem;
    list-style-type: none;
    margin: 0;
    padding: 0;
    margin-bottom: 20px;

    h1 {
        font-size: 1.5rem;
        font-weight: bold
    }

    li {
        font-size: 1rem;
        border-bottom: 1px solid black;
        margin-bottom: 0.5rem;
        padding: 0 0 0.5rem 0;
        display: flex;
        align-items: center;

        div, button {
            display: inline-block;
        }

        button {
            margin-right: 8px;
        }

        p {
            margin-bottom: 0;
            font-weight: bold;

            span {
                font-weight: 500;
                text-transform: capitalize;
            }
        }
    }

    button {
        border: 1px solid #c15959;
        border-radius: 4px;
        border: 0 6px;
        margin-right: 0.5rem;
        background: none;
        transform: 1ms all ease;

        :hover {
            background: #c15959;

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

export const ProjetoDados = styled.div`
    margin-top: 10px;
    width: 100%;
`;

export const CampoGrupo = styled.div`
    display: flex;
    flex-direction: column;
    width: 100%;
    margin-bottom: 15px;


    label {
        font-size: 1.1rem;
    }

    select {
        font-size: 1rem;
        margin-bottom: 8px;
        border-radius: 8px;
    }

    input, textarea {
        background: #EAEAEA;
        border: 2px solid #A4A0A0;
        border-radius: 8px;
        height: 40px;
        width: 100%;
        font-size: 1rem;
    }

    textarea {
        height: 100px;
    }

    @media(max-width: 768px) {
        label {
            font-size: 1rem;
        }

        select {
            font-size: 0.9rem;
        }
        input, textarea{
            height: 30px;
            font-size: 0.9rem;
        }
    }
`;

export const Button = styled.button`
    max-width: 100%;
    width:  60%;
    border: 0;
    background: #0394fc;
    color: #fff;
    border-radius: 8px;
    font-weight: bold;
    font-size: 1.2rem;
    padding: 5px;
    transition: filter 0.2s;
    align-self: center;

    :hover {
        filter: brightness(90%);
    }

    @media(max-width: 768px) {
        font-size: 1.1rem;
    }
`;

export const ErrorMessage = styled.span`
 font-size: 0.8rem;
 color: red;
`;
