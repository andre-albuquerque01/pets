<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Altera usuário</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <?php
    include_once "crud/conexao.php";
    include_once "crud/verifca_login.php";
    $id = $_SESSION['id'];

    $select = $pdo->query("SELECT nome, cep, estado, cidade, telefone, email, senha from cadastro_cliente WHERE id = $id");
    while ($sel = $select->fetch()) {
        $nome = $sel['nome'];
        $cep = $sel['cep'];
        $city = $sel['cidade'];
        $estado = $sel['estado'];
        $tell = $sel['telefone'];
        $email = $sel['email'];
    }
    ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/Alteracliente.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" name="nome" id="name" class="form-control" value="<?= $nome ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Senha atual</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Nova senha</label>
                        <input type="password" name="Newsenha" id="senha" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="tel">Telefone</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="<?= $tell ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cep">Cep</label>
                        <input type="number" name="cep" id="cep" class="form-control" size="10" maxlength="9" onblur="pesquisacep(this.value);" placeholder="CEP" value="<?= $cep ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $city ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="<?= $estado ?>" required readonly>
                    </div>
                </div>
                <div class="mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
    <script defer>
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