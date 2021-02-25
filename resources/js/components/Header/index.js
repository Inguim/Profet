import React from 'react';
import { Link } from "react-router-dom";
import { Container, Nav, Left, Right, Button } from "./styles.js";

import { IoIosLogOut } from 'react-icons/io';
import { FaBars } from 'react-icons/fa';

const Header = () => {
    const menu = [
        { nome: 'Noticias', link: 'noticias' },
        { nome: 'Membros', link: 'membros'  },
        { nome: 'Projetos', link: 'projetos'  },
    ];

    return (
        <Container>
            <Nav>
                <Left>
                    <Button>
                        <a href="/home">
                            <IoIosLogOut size={30} color="#E02041" />
                        </a>
                    </Button>
                    <h1>Administrar</h1>
                </Left>
                <input type="checkbox" id="check"/>
                <label htmlFor="check">
                    <FaBars size={30} color="lightgrey"/>
                </label>
                <Right id="right">
                    <ul className="ul-Header">
                        {
                            menu.map(item => (
                                <Button key={item.nome} >
                                    <Link to={`/administrativa/${item.link}`}>
                                        { item.nome }
                                    </Link>
                                </Button>
                            ))
                        }
                    </ul>
                </Right>
            </Nav>
        </Container>
    );
}

export default React.memo(Header);

