function validacaoLogin() {
  if (document.login.email.value === "") {
    alert('Favor preencher o campo Email!')
    document.login.email.focus();
    return false;
  }
  if(document.login.senha.value.length < 8){
    alert('A senha deve possuir no minimo 8 caracteres')
    document.login.senha.focus();
    return false;
  }

}

function validacaoCadastro() {
  if(document.cadastro.nome.value === ""){
    alert('Por favor preencha o campo nome!')
    document.cadastro.nome.focus();
    return false;
  }
  
  if (document.cadastro.email.value === "") {
    alert('Favor preencher o campo Email!')
    document.login.email.focus();
    return false;
  }
  if(document.cadastro.senha.value.length < 8){
    alert('A senha deve possuir no minimo 8 caracteres')
    document.cadastro.senha.focus();
    return false;
  }

}