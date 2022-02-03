import Loading from "react-loading";
import { ContainerLoading } from "../../styles/Container";

export default function LoadingCallback({
  tp,
  cl,
  hg,
  wh,
  align,
  justify,
  column,
  children
}) {

  return (
    <ContainerLoading
      color={cl}
      justify={justify}
      align={align}
      column={column}
    >
      {children}{' '}
      <Loading
        {...{
          type: tp ? tp : 'balls',
          color: cl ? `var(${cl})` : `var(--blue)`,
          height: hg ? hg : '100px',
          width: wh ? wh : '100px'
        }}
      />
    </ContainerLoading>
  )
};
