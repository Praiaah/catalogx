<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
    <style>
        <?php include 'style/home.css'; ?>
    </style>
  </head>
  <body>
  <section class="section1" id="section1">
  <div class="circle circle-left"></div>
        <header>
            <a href="#"><img src="img/logoCatalogXTextoEmbaixo.png" alt="" class="logo"></a>
            <nav class="navegation">
                <ul class=nav>
                    <li><a href="#sobre">?</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="text">
                <h2>SISTEMA DE <br><span>CAIXAS</span></h2>
                <p>Transforme sua empresa com
                  nosso sistema de caixa e gestão
                  de vendas! Comprando
                  conosco, você terá uma solução
                  eficiente e personalizada para
                  gerenciar seus negócios</p>
                <a href="login.php">Login</a>
                <a href="reg.php">Cadastrar</a>
            </div>
        </div>
        <ul class="icons">
            <li><a href="#"><img src="img/facebook.png" alt=""></a></li>
            <li><a href="#"><img src="img/twitter.png" alt=""></a></li>
            <li><a href="#"><img src="img/instagram.png" alt=""></a></li>
        </ul>
    </section>
    <section class="section2" id="sobre">
    <div class="circle circle-right"></div>
        <div class="sobre">
            <div class="ct1">
                <div class="top">
                    <h2>O que é CatalogX?</h2>
                    <br>
                    <p class="bod">CatalogX é um sistema de gerenciamento de vendas. Recomendado para caixistas de festas,
                        restaurantes ou lanchonetes, principalmente em eventos.
                    </p>
                    <br>
                    <p class="bod">
                        O sistema conta com o registro de venda e vizualização 
                        em tempo real do lucro, despeza, produto e muito mais!
                    </p>
                    <br>
                    <p class="bod">
                        Para começar seu gerenciamento, entre em contato com nossa equipe e faça já seu cadastro!
                    </p>
                </div>
            </div>
            <div class="ct2">
                <div class="top">
                    <h2>Quem Somos?</h2>
                    <br>
                    <p class="bod">Norteam é uma equipe especializada em sistemas. nós vizualizamos o problema e logo assumimos
                        a solução.
                    </p>
                    <br>
                    <p class="bod">Nosso foco é facilitar e implementar tecnologia em tarefas comerciais. Sem papel, sem anotações.
                        nossos produtos contam com uma base de dados responsiva e automatica.
                    </p>
                    <br>
                    <p class="bod">A equipe conta com apenas três integrantes! Saiba mais no botão abaixo.
                    </p>
                </div>
            </div>
            <div class="ct3">
                <div class="top">
                    <h2>Como Adquirir o sistema?</h2>
                    <br>
                    <p class="bod">Para maior segurança de seus dados e negócio, optamos pelo cadastro direto com a equipe.
                        possuímos um atendimento especializado, via Whatsapp, para você cliente, se sentir o mais confortável possível.
                    </p>
                    <br>
                    <p class="bod">É preciso entrar em contato via Whatsapp pelo botão abaixo. É preferível entrar já com informações
                        cruciais, como nome, modelo do negócio e intúitos com a plataforma. Demais requisitos serão desenrolados
                        durante o atendimento.
                    </p>
                    <br>
                    <a href="https://wa.me/5519997655021?text=Olá!%20estou%20interessado(a)%20no%20plano%20CatalogX!" target="_blank">
                        <div class="btnwpp">
                            <p>
                                Comece já!
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.nav a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

    $('html, body').animate({
        scrollTop: targetOffset - 200
    }, 750, 'swing');
  });
</script>

  </body>
</html>
