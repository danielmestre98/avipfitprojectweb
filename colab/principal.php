<?php
include_once( 'nav.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>AVIPfit</title>
	<link rel="stylesheet" href="../css/carousel.css">

</head>

<body>

	<main class="page-content pt-2" role="main">
	<div id="overlay" class="overlay"></div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="../img/aulaexp.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1 style="text-shadow: 2px 2px 4px #000000;">Agende uma aula experimental</h1>
                <p style="text-shadow: 2px 2px 4px #000000;">Já conhece a AVIPfit? Agende uma aula experimental conosco e venha nos conhecer! Comece hoje a mudança da sua vida!</p>
                <p><a class="btn btn-lg btn-primary" href="agendamento" role="button">Clique aqui e agende já!</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../img/parceiros.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1 style="text-shadow: 2px 2px 4px #000000;">Conheça nossos parceiros</h1>
                <p style="text-shadow: 2px 2px 4px #000000;">A AVIPfit possui parceria com clínicas de estética e laboratórios de manipulação. Tudo para o seu bem-estar.</p>
                <p><a class="btn btn-lg btn-primary" href="parceiros" role="button">Clique e conheça!</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="../img/faleconosco.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 style="text-shadow: 2px 2px 4px #000000;">Fale conosco</h1>
                <p style="text-shadow: 2px 2px 4px #000000;">Fique por dentro de todos os nossos eventos e conheça nossa rotina. Curta a página da AVIPfit no Facebook!</p>
                <p><a class="btn btn-lg btn-primary" target="_blank" href="https://www.facebook.com/TreinamentoPersonalizad0/" role="button"><i class="fab fa-facebook-f"></i></a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="../img/avipfit.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>A AVIPfit</h2>
            <p>Inaugurada em 2013, a AVIPfit articula a estratégia de elaboração de treinos exclusivos, direcionados e dinâmicos, buscando sempre a entrega de resultados satisfatórios e com agilidade, perceptíveis desde o início do coaching.</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../img/fotoprincipal.png" alt="Generic placeholder image" width="140" height="140">
            <h2>O personal trainer</h2>
            <p>André Viana, personal trainer e coach de emagrecimento, atua desde 2010 com treinamentos esportivos, onde pode observar a dificuldade do alcance de resultados por parte das pessoas em academias convencionais, devido à incompatibilidade das metodologias adotadas com base em padrões de estética, sem considerar a especificidade de cada biotipo.</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../img/studio.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>O studio</h2>
            <p>O studio AVIPfit é um espaço físico perfeito para sessões individuais ou de até cinco alunos, colaborando ao treinamento personalizado e possibilitando o acompanhamento individual ao aluno, conforme suas necessidades. O studio possui equipamentos modernos buscando a excelência em qualidade.</p>
            
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Nosso objetivo</h2>
            <p class="lead">Desenvolvimento de planos concisos por meio de avaliações periódicas e métricas para mensurar a evolução dos alunos, determinando o progresso conquistado e definindo novas metas ao escopo dos treinamentos.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../img/nossoobjetivo.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Como trabalhamos</h2>
            <p class="lead">Estabelecemos a relevância sobre a consciência do estado emocional do aluno relativo às patologias, síndromes ou crenças limitadoras com a finalidade de transformar o mindset e complementar os benefícios da atividade física. Conhecendo esta visão geral sobre nosso trabalho, convidamos-lhes a ingressar em um novo estilo de vida, surpreendente às primeiras semanas de treinamento!</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../img/trabalho.jpg" alt="Generic placeholder image">
          </div>
        </div>
		  <hr class="featurette-divider">


        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->

    </main>
	<!-- page-content" -->
	

</body>
</html>