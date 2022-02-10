import React, { useEffect } from "react";
import { useForm } from "react-hook-form";
import { Form } from "../../styles/Form";
import { Input } from "../../styles/Inputs";
import { Label, Title } from "../../styles/Texts";
import { ErrorMessage } from "../../styles/Messages";
import { Button } from "../../styles/Buttons";

const FormSolicitacao = ({ projetoId, onSubmit, isEdit = { value: false } }) => {
  const { register, handleSubmit, setValue, formState: { errors } } = useForm();

  useEffect(() => {
    setValue('titulo', '');
    setValue('descricao', '');
    if(projetoId !== 0) {
      setValue('projeto_id', projetoId);
    }
  }, [projetoId]);

  useEffect(() => {
    if (isEdit.value) {
      setValue('titulo', isEdit.solicitacao.titulo);
      setValue('descricao', isEdit.solicitacao.descricao);
      setValue('solicitacao_id', isEdit.solicitacao.id);
    }
  }, [isEdit]);

  return (
    <Form align="left" method="POST" onSubmit={handleSubmit(onSubmit)}>
      <Title>{isEdit.value ? 'Alterar solicitação' : 'Informe a solicitação'}</Title>
      {isEdit.value && (
        <Input
          type="hidden"
          {...register('solicitacao_id', { required: { value: true, message: '' } })}
        />
      )}
      <Input
        type="hidden"
        {...register('projeto_id', { value: projetoId, required: { value: true, message: '' } })}
      />
      <Label htmlFor="titulo" hasError={errors.titulo}>Titúlo:</Label>
      <Input
        {...register('titulo', {
          required: { value: true,  message: 'Informe o campo título!'},
          maxLength: { value: 100, message: 'Quantidade máxima de caractêres: 100' }
        })}
        placeholder=" "
        hasError={errors.titulo}
      />
      {errors.titulo && (
        <ErrorMessage color="--red">{errors.titulo.message}</ErrorMessage>
      )}
      <Label htmlFor="descricao" hasError={errors.descricao}>Descrição:</Label>
      <Input
        as={'textarea'}
        {...register('descricao', {
          required: { value: true,  message: 'Informe o campo descrição!'},
        })}
        placeholder=" "
        hasError={errors.descricao}
      />
      {errors.descricao && (
        <ErrorMessage color="--red">{errors.descricao.message}</ErrorMessage>
      )}
      <Button bgColor="--green">Enviar</Button>
    </Form>
  );
};

export default React.memo(FormSolicitacao);
