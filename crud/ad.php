<?php
include_once "conexao.php";
session_start();
$imagem = $_FILES['imagem'];
if (isset($imagem)) {
    $ver = explode(".", strtolower($imagem['name'])); // Pegar a extensão da imagem
    if ($ver[sizeof($ver) - 1] == 'png' || $ver[sizeof($ver) - 1] == 'jpg' || $ver[sizeof($ver) - 1] == 'jpeg' || $ver[sizeof($ver) - 1] == 'bmp') {
        $name = date("H_i_s-d_m_Y.") . $ver[sizeof($ver) - 1]; // Novo nome
        $diretorio = "../imagens/";
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $name); // mover a imagem para a pasta
        echo "sucesso" . $new_name;
        $titulo = $_POST['titulo'];
        $desc = $_POST['desc'];
        $tel = $_POST['tel'];
        $what = $_POST['what'];
        $valor = $_POST['valor'];
        $cidade = $_POST['cidade'];
        $id = $_SESSION['id'];

        $cad = $pdo->prepare("INSERT INTO `cadastro_ad`(`imagem`, `titulo`, `descricao`, `telefone`, `whatsapp`, `valor`, `localizacao`, `cadastro_cliente`,`AD_ativo_desativo`) VALUE (:imagem, :titulo, :descricao, :telefone, :whatsapp, :valor, :localizacao, :cadastro_cliente,:AD_ativo_desativo)");
        $cad->execute(array(
            ':imagem' => $name, // o nome da imagem
            ':titulo' => $titulo,
            ':descricao' => $desc,
            ':telefone' => $tel,
            ':whatsapp' => $what,
            ':valor' => $valor,
            ':localizacao' => $cidade,
            ':cadastro_cliente' => $id,
            ':AD_ativo_desativo' => 'a'
        ));
        if ($cad == true) {
            echo "<script>alert('Cadastrado com sucesso')</script>";
            echo "<script>location.href='../dashboard/'</script>";
        }
    } else {
        echo "<script>alert('Formato invalido da imagem')</script>";
        echo "<script>location.href='../cadastro_ad.php'</script>";
    }
}
