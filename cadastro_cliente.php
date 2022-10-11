<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro usuário</title>
    <script src="js/cep.js"></script>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/cliente.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" name="nome" id="name" class="form-control" placeholder="Nome completo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email válido" required>
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha forte" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tel">Telefone</label>
                        <input type="number" name="tel" id="tel" class="form-control" placeholder="Apenas número" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cep">Cep</label>
                        <input type="number" name="cep" id="cep" class="form-control" size="10" maxlength="9" onblur="pesquisacep(this.value);" placeholder="CEP" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" id="uf" class="form-control" readonly>
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="term" id="term" required> <a href="">Termo de autorização</a>
                </div>
                <div class="col-md-3 mt-2 mb-5">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.  
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>
</body>

</html>