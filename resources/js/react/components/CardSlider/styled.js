import styled from 'styled-components';

export const Box = styled.div`
  min-width: 220px;
  max-width: 230px;
  min-height: 290px;
  height: inherit;
  border-radius: 5px;
  transition: all ease-in-out 0.2s;
  transform: scale(90%);
  box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.85);
  margin-right: ${({ isLast }) => isLast ? '25px' : '0'};

  :hover {
    transform: scale(95%);
    box-shadow: 0px 0px 15px 3px rgb(50 88 128);
  }
`;
