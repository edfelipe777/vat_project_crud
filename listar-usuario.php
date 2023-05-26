<h1>Listar usuario</h1>
<?php
    $sql = "SELECT * FROM usuario";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
            print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>Email</th>";
            print "<th>Data de Nascimento</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->usuario_id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->data_nasc."</td>";

            /********************Botões de Ações*************************/
            print "<td>
                    <button onclick=\"location.href='?page=editar&usuario_id=".$row->usuario_id."'\";
                    class='btn btn-success'>Editar</button>
                    
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&usuario_id=".$row->usuario_id."';}else{false;}\"
                    class='btn btn-danger'>Exluir</button>
                   </td>";
            print "</tr>";
        }
            print "<table>";
    }else{
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }
?>