<?php
include 'config.php';
if(isset($_POST['sub'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0) {
        echo '<div class="erro">', "E-mail já cadastrado no sistema.", '</div>';
    } else {
        $i = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        mysqli_query($conexao, $i);   
        echo '<div class="erro">', "Inserido com sucesso.", '</div>';
    }
}
?>


    <head>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
        <style>
            <?php include 'style/reg.css'; ?>
        </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <div class="center">
        <section>
        <img src="img/logoCatalogXTextoEmbaixo.png">
            <div class="form-box">
            <table>
                <tr>
                    <td>
                        <center><h2>Cadastro</h2></center>
                        <div class="inputbox">
                            <input type="text" name="nome" required>
                            <label for="">Nome</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="inputbox">
                            <input type="text" name="email" required>
                            <label for="">Email</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="inputbox">
                            <input type="password" name="senha" required>
                            <label for="">Senha</label>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input type="submit" value="Registrar-se" name="sub" class="submit">
                        <div class="login">
                        <p>Já tem uma Conta? 
                        <a href="login.php" id="logar">Logar</a></p>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
        </section>
</div>
</body>
</html>