import React from "react";
import { redirectTo } from "../../utils/redirectTo";
import { Box, Resume, Title, Button } from "./styles";

const CardSlider = ({ projeto }) => {
  function formatResume(text) {
    if(text.length > 200) {
     return text.substring(0, 200) + '...';
    }
    return text;
  }

  return (
    <Box>
      <Title>{projeto.nome}</Title>
      <Resume>{formatResume(projeto.resumo)}</Resume>
      <Button type="button" onClick={() => redirectTo(`projeto/${projeto.id}`)}>Visualizar</Button>
    </Box>
  )
}

export default React.memo(CardSlider);
