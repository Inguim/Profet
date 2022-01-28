import styled from 'styled-components';

export const Container = styled.div`
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 100vw;
    width: 100%;
`;

export const Nav = styled.header`
    display: flex;
    width: 90%;
    max-width: 100vw;
    background-color: rgb(243, 243, 243);
    padding: 5px 35px;
    margin-top: 2rem;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    border-radius: 4px;

    input, label {
        display: none;
    }
    @media (max-width: 700px) {
        position: sticky;
        top: 0;
        label {
            display: block;
            z-index: 1;
            margin-bottom: 0;
        }
        input[type='checkbox']:checked ~ #right {
            left: 0px;
        }
    }

    @media (max-width: 500px) {
        height: 100px;
        img {
            display: none;
        }
    }
`;

export const Left = styled.div`
    display: flex;
    flex-direction: row;
    align-items: center;
    list-style: none;

    h1 {
        font-size: 1.5rem;
        margin-left: 15px;
        margin-bottom: 0;
    }
    img {
        max-width: 100px;
    }
    @media (max-width: 788px) {
        h1 {
            font-size: 1.2rem;
        }
    }
`;

export const Right = styled.div`
    .ul-Header {
        list-style: none;
        display: flex;
        align-items: center;
        text-decoration: none;
        text-transform: uppercase;
        margin-top: 16px;

        li {
            margin-left: 15px;
            a {
                font-size: 1rem;
                transition: all 250ms linear 0s;
            }
        }
    }
    @media (max-width: 788px) {
        .ul-Header li a {
            font-size: 0.8rem;
        }
    }
    @media (max-width: 700px) {
        top: 100px;
        width: 100%;
        height: 100%;
        position: fixed;
        background-color:#232323;
        padding-top: 20px;
        left: -100%;
        .ul-Header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            li {
                margin: 10px 0px;
            }
        }
    }
`;

export const Button = styled.li`
    padding: 5px 10px;
    border-radius: 8px;
    text-align: center;
    border-bottom: ${ props => props.ativo === true ? `3px solid #5989C1;` :`transparent;` };
    font-weight: ${props => props.ativo === true ? 'bold' : 'normal'};
    :hover {
        filter: brightness(90%);
    }
    @media (max-width: 700px) {
        display: block;
        padding: 3px 8px;
    }
`;
