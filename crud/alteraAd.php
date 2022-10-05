<?php
include_once "conexao.php";
// session_start();
// $id = $_SESSION['id_login'];
$imagem = $_FILES['imagem'];
if (isset($imagem)) {
    $ver = explode(".", strtolower($imagem['name'])); // Pegar a extensão da imagem
    if ($ver[sizeof($ver) - 1] == 'png' || $ver[sizeof($ver) - 1] == 'jpg' || $ver[sizeof($ver) - 1] == 'jpeg' || $ver[sizeof($ver) - 1] == 'bmp') {
        $name = date("H_i_s-d_m_Y.") . $ver[sizeof($ver) - 1]; // Novo nome
        $new_name = md5($name);
        $diretorio = "../imagens/";
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $new_name); // mover a imagem para a pasta
        echo "sucesso" . $new_name;
        $titulo = $_POST['titulo'];
        $desc = $_POST['desc'];
        $tel = $_POST['tel'];
        $what = $_POST['what'];
        $valor = $_POST['valor'];
        $cidade = $_POST['cidade'];
        $id = 1;

        $cad = $pdo->prepare("UPDATE `cadastro_ad` SET `imagem`= :imagem, `titulo`=:titulo, `descricao`=:descricao, `telefone`=:telefone, `whatsapp`=:whatsapp, `valor`=:valor, `localizacao`=:localizacao, `cadastro_cliente`=:cadastro_cliente");
        $cad->execute(array(
            ':imagem' => $new_name, // o nome da imagem
            ':titulo' => $titulo,
            ':descricao' => $desc,
            ':telefone' => $tel,
            ':whatsapp' => $what,
            ':valor' => $valor,
            ':localizacao' => $cidade,
            ':cadastro_cliente' => $id
        ));
        if ($cad == true) {
            echo "<script>alert('Alteração feita com sucesso')</script>";
            echo "<script>location.href='../perfil.php'</script>";
        }
    } else {
        echo "<script>alert('Formato invalido da imagem')</script>";
        echo "<script>location.href='../altera_ad.php'</script>";
    }
}
