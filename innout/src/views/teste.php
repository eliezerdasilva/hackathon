<?php


$smtp = $conn->prepare("SELECT * FROM  usuario_reserva");
$output= "";

if($smtp->execute() == true && $smtp->rowCount() > 0){
  
    $output = 
    '<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">CEP</th>
          <th scope="col">RUA</th>
          <th scope="col">N</th>
          <th scope="col">Data de Emprestimo</th>
          <th scope="col">Data de Emtrega</th>
          <th scope="col">Data de Situacao</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
    <tbody>';

    foreach ($smtp->fetchAll(PDO::FETCH_ASSOC) as $row) {

      $output .= 
        "<tr>
            <th scope='row'>{$row["id"]}</th>
            <td>{$row["tb_nome"]}</td>
            <td>{$row["tb_cpf"]}</td>
            <td>{$row["cep"]}</td>
            <td>{$row["rua"]}</td>
            <td>{$row["n"]}</td>
            <td>{$row["tb_data_emprestimo"]}</td>
            <td>{$row["tb_data_entrega"]}</td>
            <td>{$row["situacao"]}</td>
  
            <td><button type='button' class='btn btn-danger' data-id='{$row["id"]}' data-nome='{$row["tb_nome"]}' id='btn-delete'><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
    }

    $output .= "</tbody></table>";

    echo $output;
  
}else{
  echo "<div class='alert alert-warning text-center' role='alert'>
          <i class='fas fa-exclamation-circle'></i> Nenhum funcionário cadastrado.
        </div>";
}