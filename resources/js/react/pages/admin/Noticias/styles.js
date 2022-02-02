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

export const Lista = styled.div`
    background: #FFFFFF;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    border-radius: 4px;
    width: 80%;
    max-width: 100%;
    padding: 10px;
    font-size: 1.1rem;

    div {
        margin-bottom: 5px;

        p {
            color: #424242;
            display: inline-block;
        }

        div {
            margin-bottom: 0;
            float: right;
        }
    }

    @media(max-width: 768px) {
        border-bottom: 1px solid black;
        font-size: 0.9rem;

        div {
            border-bottom: 1px solid black;
            margin-bottom: 10px;

            p {
                display: block;
                margin-bottom: 0;
            }

            div {
                float: left;
                border-bottom: none;
            }
        }
    }
`;


