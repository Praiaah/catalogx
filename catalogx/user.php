<?php
    session_start();
    include_once('config.php');
    if (!isset($_SESSION['email'])) {
        header('HTTP/1.0 403 Forbidden');
        header("Location: login.php");
        exit;
    }
    $logado = $_SESSION['email'];
    // Busca os dados do usuÃ¡rio logado
    $sql = "SELECT * FROM usuarios WHERE email = '$logado'";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc(); // Retorna apenas um resultado

    // Verifica o nÃ­vel de permissÃ£o do usuÃ¡rio
    if ($row['permissao'] == 1) {
        // Consulta permitida apenas para usuÃ¡rios com permissÃ£o 1 (admin)
        $data = "";
        $result = $conexao->query($sql);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Catalogx</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
        <style>
            <?php 
                include 'style/user.css';  
                ?>

        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navleft">
                    <?php
                            echo "<a class='navbar-brand' href=''>EVENTOS</a>";

                    ?>
                </div>
                <div class="navright">
                    </button>
                    <button class="add" onclick="openPopup()">+</button>
                    <a href="login.php" class="btnSair">Sair</a>
                </div>
            </div>
            </div>
        </nav>
    <br>

    <?php 
if (isset($_POST['sub'])) {
    if ($row && isset($row['id'])) {
        $idUsuarioLogado = $row['id'];
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];

        $sql = "SELECT * FROM eventos WHERE nome = '$nome'";
        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {
        } else {
            $sql_insert = "INSERT INTO eventos (nome, data, descricao, fk_id_usuario) VALUES ('$nome', '$data', '$descricao', '$idUsuarioLogado')";
            mysqli_query($conexao, $sql_insert);
        }
    }
}

$idUsuarioLogado = $row['id']; // ObtÃ©m o ID do usuÃ¡rio logado
$sql_select = "SELECT * FROM eventos WHERE fk_id_usuario = '$idUsuarioLogado'";
$result_select = mysqli_query($conexao, $sql_select);
?>
<style>

</style>

<div class="container-event">
<?php
    // Use a while loop to iterate over the query results or an array of events.
    while ($user_data = mysqli_fetch_assoc($result_select)) {
        $originalDate = $user_data["data"];
        $newDate = date("d/m/Y", strtotime($originalDate));
        echo "<div class='content-event'>";
        echo "<div class='section'><a href='sistema.php''><b>".$user_data['nome']."</b></div></a>";
        echo "<div class='section2'><svg class='date-svg' width='17' height='20' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.667 1.417v2.125m5.666-2.125v2.125M2.48 6.439h12.042m.354-.418v6.02c0 2.126-1.063 3.542-3.542 3.542H5.667c-2.48 0-3.542-1.416-3.542-3.541V6.02c0-2.125 1.063-3.542 3.542-3.542h5.666c2.48 0 3.542 1.417 3.542 3.542Z' stroke='#fff' stroke-width='1.4' stroke-miterlimit='10' stroke-linecap='round' stroke-linejoin='round'/><path d='M11.117 9.704h.007m-.007 2.125h.007M8.497 9.704h.007m-.007 2.125h.007M5.875 9.704h.007m-.007 2.125h.007' stroke='#fff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/></svg>".$newDate."</div>";
        echo "<div class='section3'><p class='descricao'>".$user_data['descricao']."</p></div>";
        echo "<div class='section4'> <a class='btnEdit' href='edit.php' title='Editar'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-pencil-square' viewBox='0 0 16 16'>
          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
        </svg>
      </a>
            <a class='btnDelete' href='delete.php' title='Deletar'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
            </a> </div>";
        echo "</div>";
    }
    ?>
</div>

    <div id="popup" class="popup-overlay">
        <div class="popup-content">
            
            <div class="flex1-popup"></div>
                <div class="flexprincipal-popup">
                    <form method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <h5 class="title-formitens">Nome do evento:</h5>
                                <div class="input-formitens">
                                    <input type="text" name="nome" maxlength="28" required>
                                </div>
                            </tr>
                            <tr>
                                <br>
                            </tr>
                            <tr>
                                <h5 class="title-formitens">Data do evento</h5>
                                <div class="input-formitens">
                                    <input class="input-formitens" type="date" name="data" required>
                                </div>
                            </tr>
                            <tr>
                                <br>
                            </tr>
                            <tr>
                                <h5 class="title-formitens">Descrição do evento</h5>
                                <div class="input-formitens">
                                    <input class="input-formitens" type="text" name="descricao" maxlength="190">
                                </div>
                            </tr>
                            <tr>
                                <br>
                            </tr>
                            <tr>
                                <input type="submit" value="registrar" name="sub" class="submit">
                            </tr>
                        </table>
                    </form>
                </div>
            <div class="flex2-popup">
                <span class="popup-close" onclick="closePopup()">X</span>
            </div>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "flex";
        }
        
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>


    </body>

    </html>

    <!--
        <form method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>
                                    <center><h2>Cadastro</h2></center>
                                    <div class="inputbox">
                                        <input type="text" name="nome" required>
                                        <label for="">Nome do Evento</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputbox">
                                        <input type="date" name="data" required>
                                        <label for="">Data do Evento</label>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td>
                                    <input type="submit" value="registrar" name="sub" class="submit">
                                    <div class="login">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
    -->