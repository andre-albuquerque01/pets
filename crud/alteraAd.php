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
        // echo "sucesso" . $name;
        $titulo = $_POST['titulo'];
        $desc = $_POST['desc'];
        $what = $_POST['what'];
        $valor = $_POST['valor'];
        $cidade = $_POST['cidade'];
        $id = $_SESSION['id'];

        $cad = $pdo->prepare("UPDATE `cadastro_ad` SET `imagem`= :imagem, `titulo`=:titulo, `descricao`=:descricao, `whatsapp`=:whatsapp, `valor`=:valor, `localizacao`=:localizacao WHERE cadastro_cliente = $id");
        $cad->execute(array(
            ':imagem' => $name, // o nome da imagem
            ':titulo' => $titulo,
            ':descricao' => $desc,
            ':whatsapp' => $what,
            ':valor' => $valor,
            ':localizacao' => $cidade
        ));
        if ($cad == true) {
            echo "<script>alert('Alteração feita com sucesso')</script>";
            echo "<script>location.href='../dashboard/'</script>";
        }
    } else {
        echo "<script>alert('Formato invalido da imagem')</script>";
        echo "<script>location.href='../altera_ad.php'</script>";
    }
}
