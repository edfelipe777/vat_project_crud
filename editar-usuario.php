<h1>Editar Usuário</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $data_nasc = $_POST["data_nasc"];
    $usuario_id = $_POST["usuario_id"];

    $stmt = $conn->prepare("UPDATE usuario SET 'nome=?, email=?, senha=?, data_nasc=? WHERE usuario_id=?");
    $stmt->bind_param("ssssi", $nome, $email, $senha, $data_nasc, $usuario_id);
    $res = $stmt->execute();

    if ($res) {
        echo "<script>alert('Editado com Sucesso');</script>";
        echo "<script>location.href='?page=listar';</script>";
        exit;
    } else {
        echo "<script>alert('Não foi possível editar');</script>";
        echo "<script>location.href='?page=listar';</script>";
        exit;
    }
}
?>

<?php
$sql = "SELECT * FROM usuario WHERE usuario_id=".$_REQUEST["usuario_id"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->usuario_id; ?>" >
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" value="<?php print $row->data_nasc; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
