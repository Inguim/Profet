import Loading from "react-loading";
import { ContainerLoading } from "../../styles/Container";

export default function LoadingCallback({
  tp,
  cl,
  hg,
  wh,
  align,
  justify,
  children
}) {

  return (
    <ContainerLoading
      color={cl}
      justify={justify}
      align={align}
    >
      {children}
      <Loading
        {...{
          type: tp ? tp : 'bubbles',
          color: cl ? `var(${cl})` : `var(--blue)`,
          height: hg ? hg : '100px',
          width: wh ? wh : '100px'
        }}
      />
    </ContainerLoading>
  )
};
