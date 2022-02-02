import styled from "styled-components";

const Message = styled.span`
  font-size: 0.8rem;
  font-weight: bold;
  font-style: italic;
  color: var(${({color}) => color});
  text-align: left;
  @media (max-width: 760px) {
    margin-bottom: 10px;
  }
`;

export const ErrorMessage = styled(Message)`
  ::before {
    display: inline;
    content: "⚠ ";
  }
`;

export const InfoMessage = styled(Message)`
  font-style: normal;
  font-size: 1rem;
  ::before {
    display: inline;
    content: "🛈 ";
  }
`;
