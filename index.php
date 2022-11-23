<?php  

// Invocation des fichiers de Fonctions et la Connexion a la BDD

require_once 'inc/log_bdd.php';
require_once 'inc/fonctions.php';

// TRAITEMENT DU FORMULAIRE DU CONTACT


if (!empty($_POST)) {

    if ( !isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 40) {
        // !isset n'est pas isset, .= concaténation puis affectation, || ou, strlen string length longueur chainbe de caractère
        $erreur .='<div class="fw-bolder text-center comments" style="background-color: #dc3545; border-radius: 8px; margin: 10px; padding: 10px;">Votre dénomination doit faire entre 2 et 40 caractères</div>';
    }
    if ( !isset($_POST['objet']) || strlen($_POST['objet']) < 6 || strlen($_POST['objet']) > 25) {
        $erreur .='<div class="fw-bolder text-center comments" style="background-color: #dc3545; border-radius: 8px; margin: 10px; padding: 10px;">l\'Objet doit faire entre 6 et 25 caractères </div>';
    }
  
    if ( !isset($_POST['mail']) || strlen($_POST['mail']) > 50 || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        // filter_var filtre une variable, et dans ce filtre on passe la constante prédéfinie (EN MAJUSCULE) qui vérifie que c'est bien au format email
        $erreur .='<div class="fw-bolder text-center comments" style="background-color: #dc3545; border-radius: 8px; margin: 10px; padding: 10px;">Votre email n\'est pas conforme</div>';
    }

    if ( !isset($_POST['message']) || strlen($_POST['message']) < 15 || strlen($_POST['message']) > 300 ) {
        // filter_var filtre une variable, et dans ce filtre on passe la constante prédéfinie (EN MAJUSCULE) qui vérifie que c'est bien au format email
        $erreur .='<div class="fw-bolder text-center comments" style="background-color: #dc3545; border-radius: 8px; margin: 10px; padding: 10px;">Votre message doit faire entre 15 et 300 caractères</div>';
    }


    
    if (empty($erreur)) {

    
	// htmlspecialchars pour la sécurité
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['objet'] = htmlspecialchars($_POST['objet']);
    $_POST['mail'] = htmlspecialchars($_POST['mail']);
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
    $_POST['message'] = htmlspecialchars($_POST['message']);


    $contact = executeRequete(" INSERT INTO contact (nom, objet, mail, telephone, message) VALUES (:nom, :objet, :mail, :telephone, :message)",

    array(
    ':nom' => $_POST['nom'],
    ':objet' => $_POST['objet'],
    ':mail' => $_POST['mail'],
    ':telephone' => $_POST['telephone'],
    ':message' => $_POST['message'],
    ));

	$confirmation .='<div class="fw-bolder text-center" style="background-color: #1868d0; border-radius: 8px; margin: 10px; padding: 10px;">Votre message a bien été envoyé</div>';

    }

} 


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="index">
		<meta name="author" content="Sleyter MONTEIRO & Myriam FARIDI">
		<meta name="description" content="Vivez le récit déchirant aux multiples récompenses d’Amicia et de son petit frère
				Hugo, livrés à eux-mêmes au cœur des heures les plus sombres de l’Histoire.
				Pourchassés par l'Inquisition et cernés par l'avancée inexorable des hordes de rats,
				Amicia et Hugo vont apprendre à se connaître et à compter l'un sur l'autre.
				Submergés par l’adversité, ils devront lutter pour survivre et trouver leur rôle
				dans ce monde impitoyable.">
		<title>A Plague Tale : Innocence</title>
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
		<link rel="manifest" href="img/favicon/site.webmanifest">
		<link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		<!-- CSS & CDN Bootstrap -->
		<link rel="stylesheet" href="css/style.css" />
		<link
		  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
			crossorigin="anonymous"/>

		<!-- Google Fonts  -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap"
			rel="stylesheet"
      />

	  	<!-- JS -->
		<script src="js/script.js" async></script>
		<script src="https://kit.fontawesome.com/2f161553ec.js" crossorigin="anonymous"></script>
	</head>

	<body class="bg-dark text-light">
		<header>
			<nav class="navbar navbar-expand-lg bg-black fixed-top">
        <div class="container-fluid">
		<button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
			<img
			src="img/focus-horizontal.svg"
			alt="un triangle aux trois côtés égaux"
			style="width: 200px; height: 100px;"/>
		
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
			  <li class="nav-item">
                <a class="nav-link text-white" href="index.php#synopsis">Synopsis</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php#personnages">Personnages</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link text-white" href="index.php#gameplay">Gameplay</a>
              </li>
            </ul>
			
			<button type="button" class="btn btn-dark btn-contact" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			Contact
			</button>

            <a  class="btn btn-warning" href="index.php#boutique" class="navbar-text" role="button">
             Achetez le Jeu
			</a>
          </div>
        </div>
      </nav>
		</header>
		<img id="aplague" src="img/logo_aplague.png" alt="Logo du Jeu A plague Tale" />

		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
			<div class="carousel-indicators">
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="0"
					class="active"
					aria-current="true"
					aria-label="Slide 1"
				></button>
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="1"
					aria-label="Slide 2"
				></button>
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="2"
					aria-label="Slide 3"
				></button>
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="3"
					aria-label="Slide 4"
				></button>
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="4"
					aria-label="Slide 5"
				></button>
				<button
					type="button"
					data-bs-target="#carouselExampleIndicators"
					data-bs-slide-to="5"
					aria-label="Slide 6"
				></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/aplague6.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 1"/>
				</div>
				<div class="carousel-item">
					<img src="img/aplague9.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 2"/>
				</div>
				<div class="carousel-item">
					<img src="img/aplague10.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 3"/>
				</div>
				<div class="carousel-item">
					<img src="img/aplague7.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 4"/>
				</div>
				<div class="carousel-item">
					<img src="img/aplague14.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 5"/>
				</div>
				<div class="carousel-item">
					<img src="img/aplague15.jpg" class="d-block w-100" alt="A Plague Tale Carroussel 6"/>
				</div>
			</div>
			<button
				class="carousel-control-prev"
				type="button"
				data-bs-target="#carouselExampleIndicators"
				data-bs-slide="prev"
			>
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button
				class="carousel-control-next"
				type="button"
				data-bs-target="#carouselExampleIndicators"
				data-bs-slide="next"
			>
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<main id="synopsis" class="container text-light">
			<h1>
				A Plague Tale : Innocence est un jeu d'action aventure développé par Asobo Studio et
				édité par Focus Home Interactive. L'histoire se déroule en France au temps du
				Moyen-âge
			</h1>
			<br/>

			<p class="lead">
				Vivez le récit déchirant aux multiples récompenses d’Amicia et de son petit frère
				Hugo, livrés à eux-mêmes au cœur des heures les plus sombres de l’Histoire.
				Pourchassés par l'Inquisition et cernés par l'avancée inexorable des hordes de rats,
				Amicia et Hugo vont apprendre à se connaître et à compter l'un sur l'autre.
				Submergés par l’adversité, ils devront lutter pour survivre et trouver leur rôle
				dans ce monde impitoyable.
			</p>
			<br/>

			<p class="lead">
				1348. Le fléau de la peste ravage le Royaume de France. A travers les villages
				dévastés par la maladie. Sur leur route, ils devront joindre leurs forces à celles
				d’autres orphelins, par le feu et la lumière. Grâce au lien qui les unit, les
				enfants affronteront les jours les plus sombres de l’Histoire pour échapper au
				destin funeste de leur famille. L’aventure commence sur consoles et PC – Le temps de
				l’innocence prend fin… Dans l'ancienne province de Guyenne, Le pays est ravagé par la Guerre de Cent Ans (1337-1453), conflit opposant le royaume d'Angleterre et celui de France, ainsi que par le début de la Peste noire et la fin de l'Inquisition médiévale. 
			</p>
			<br/>
			<hr>


			<h2 id="personnages" class="text-center">Les Personnages</h2>

			<div class="row d-flex justify-content-center">
				<div class="col-sm-6 col-md-5">
					<div class="card justify-content-center" style="width: 25rem;">
						<img src="img/amicia.jpeg" class="card-img-top" alt="Amicia De Rune">
						<div class="card-body bg-black">
							<p class="lead card-text">Amicia De Rune</p>
						</div>
					</div>
				</div>	

				<div class="col-sm-6 col-md-5">
					<div class="card justify-content-center" style="width: 23rem;">
						<img src="img/hugo.webp" class="card-img-top" alt="Hugo De Rune">
						<div class="card-body bg-black">
							<p class="lead card-text">Hugo De Rune</p>
						</div>
					</div>
				</div>
			</div>

					<p class="lead text-center" style="padding-top: 30px;">
					Vous incarnez Amicia de Rune, une adolescente âgée de 15 ans, accompagnée de son frère cadet, Hugo, âgé de 5 ans, tous deux livrés à eux-mêmes. Bien qu'étant du même sang, les deux enfants se connaissent peu puisque Amicia a été élevée par son père, Robert de Rune, chevalier au service du roi de France, qui lui a appris à chasser, tandis qu'Hugo, atteint d'une mystérieuse maladie du sang, est gardé par sa mère Béatrice de Rune dans sa chambre.

					Ils vont devoir survivre et ne compter que sur eux-mêmes alors qu'ils sont poursuivis par le seigneur Nicholas, haut membre de l'Inquisition qui tente de capturer Hugo pour le livrer au Grand Inquisiteur, Vitalis Bénévent. 
					</p>
			</div>
       </main>

	    <section class="container">
			<h2>Bande Annonce du Jeu</h2>
				<div class="row">
					<iframe width="800" height="560" src="https://www.youtube-nocookie.com/embed/8AOwiMciL1Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>		
		</section>
		<hr>

  <br>    
  <section id="gameplay">
	<h2>Gameplay</h2>
	<section id="fronde">
		<div class="container">
		  <div class="row">
			<div class="col-md-6">
				<div class="row">
					<video src="video/aplague_fronde.mp4" autoplay muted loop style="width: 600px;"></video>
				</div>           
			</div>
			<div class="col-md-6" style="padding-top: 50px;">
				<h5 class="text-center">
					La Fronde
				</h5>
					<p class="lead text-center">
					Votre fronde constitue une arme redoutable car un tir bien précis dans la tête avec une pierre comme projectile peut-être fatal pour vos ennemie...
					</p>
			</div>
		  </div>
		</div>
	</section><!-- Fin Section Fronde -->
  
      <hr>

	  <section id="rat">
		<div class="container">
		  <div class="row">
			<div class="col-md-6" style="padding-top: 50px;">
				<h5 class="text-center">
					Les Rats
				</h5>
				<p class="lead text-center">
					La peste fait rage au royaume de France, les rats sont de petits rongeurs à fourrure sombre dans A Plague Tale: Innocence et sont une menace omniprésente à laquelle tous doivent faire face. Apparaissant en grand nombre, ils sont imparables, dévorant ou contaminant tout sur leur passage. Ils peuvent cependant être dissuadés par la lumière.  
				</p>
			</div>
			<div class="col-md-6">
				<div class="row">
					<video src="video/aplague_rat.mp4" autoplay muted loop style="width: 600px;"></video>
				</div>             
			</div>
		 </div>
	    </div>
	  </section><!-- Fin Section Rat -->
	<hr>

	<section id="discretion">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
					<video src="video/aplague_discretion.mp4" autoplay muted loop style="width: 600px;"></video>
					</div>             
				</div>
				<div class="col-md-6">
					<h5 class="text-center" style="padding-top: 50px;">
						Discrétion
					</h5>
					<p class="lead text-center">
					Analysez votre environnement et utilisez-le à votre avantage, une armée se dresse devant vous. Protéger votre petit frère par la force ou par la furtivité
					</p>
				</div>
			</div>
		</div>
	  </section><!-- Fin section Discrétion -->
    <hr>
      
	<section id="alchimie">
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="padding-top: 40px;">
					<h5 class="text-center">
						Alchimie
					</h5>
					<p class="lead text-center">
					Au fur et à mesure que le joueur apprend plus de recettes d’alchimie, la roue de munitions d’Amicia s’agrandira pour refléter ses nouvelles capacités. Les joueurs auront accès à quatre types de projectiles alchimiques et deux mélanges qui peuvent être utilisés pour donner un avantage au combat et résoudre des énigmes. Chaque type de munition présente des avantages différents, mais ils ont également leur propre coût en ressources dont les joueurs doivent tenir compte lors de la planification de leurs prochaines étapes.
					</p>
				</div>
				<div class="col-md-6">
					<div class="row">
					<video src="video/aplague_alchimie.mp4" autoplay muted loop style="width: 600px;"></video>
					</div>             
				</div>
			</div>
		</div>
	  </section><!-- Fin section Alchimie -->
	  <hr>
  </section>

  <section id="boutique" class="container">

	<h3>Achetez le Jeu</h3>
	<h5>Disponible sur PC !</h5>
	<br>

	<div class="row">
	<iframe src="https://store.steampowered.com/widget/752590/" frameborder="0" width="646" height="190"></iframe>
	</div>	

	<h5>Et sur Console</h5>
	<br>	

	<!-- <div class="console d-flex justify-centent-evenly"> -->
		<a class="btn btn-primary" href="https://www.playstation.com/fr-fr/games/a-plague-tale-innocence/" target="_blank" rel="nofollow" role="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-playstation" viewBox="0 0 16 16">
				<path d="M15.858 11.451c-.313.395-1.079.676-1.079.676l-5.696 2.046v-1.509l4.192-1.493c.476-.17.549-.412.162-.538-.386-.127-1.085-.09-1.56.08l-2.794.984v-1.566l.161-.054s.807-.286 1.942-.412c1.135-.125 2.525.017 3.616.43 1.23.39 1.368.962 1.056 1.356ZM9.625 8.883v-3.86c0-.453-.083-.87-.508-.988-.326-.105-.528.198-.528.65v9.664l-2.606-.827V2c1.108.206 2.722.692 3.59.985 2.207.757 2.955 1.7 2.955 3.825 0 2.071-1.278 2.856-2.903 2.072Zm-8.424 3.625C-.061 12.15-.271 11.41.304 10.984c.532-.394 1.436-.69 1.436-.69l3.737-1.33v1.515l-2.69.963c-.474.17-.547.411-.161.538.386.126 1.085.09 1.56-.08l1.29-.469v1.356l-.257.043a8.454 8.454 0 0 1-4.018-.323Z"/>
			</svg>
			Playstation
		</a>

		<a class="xbox btn btn-success" href="https://www.xbox.com/fr-fr/games/store/a-plague-tale-innocence/bq2nnlqps8rs" target="_blank" rel="nofollow" role="button" style="margin: 50px;">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-xbox" viewBox="0 0 16 16">
				<path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z"/>
			</svg>
			Xbox
		</a>


		<a class="btn btn-danger" href="https://www.nintendo.fr/Jeux/Jeux-a-telecharger-sur-Nintendo-Switch/A-Plague-Tale-Innocence-Cloud-Version-2002534.html" target="_blank" rel="nofollow" role="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-nintendo-switch" viewBox="0 0 16 16">
				<path d="M9.34 8.005c0-4.38.01-7.972.023-7.982C9.373.01 10.036 0 10.831 0c1.153 0 1.51.01 1.743.05 1.73.298 3.045 1.6 3.373 3.326.046.242.053.809.053 4.61 0 4.06.005 4.537-.123 4.976-.022.076-.048.15-.08.242a4.136 4.136 0 0 1-3.426 2.767c-.317.033-2.889.046-2.978.013-.05-.02-.053-.752-.053-7.979Zm4.675.269a1.621 1.621 0 0 0-1.113-1.034 1.609 1.609 0 0 0-1.938 1.073 1.9 1.9 0 0 0-.014.935 1.632 1.632 0 0 0 1.952 1.107c.51-.136.908-.504 1.11-1.028.11-.285.113-.742.003-1.053ZM3.71 3.317c-.208.04-.526.199-.695.348-.348.301-.52.729-.494 1.232.013.262.03.332.136.544.155.321.39.556.712.715.222.11.278.123.567.133.261.01.354 0 .53-.06.719-.242 1.153-.94 1.03-1.656-.142-.852-.95-1.422-1.786-1.256Z"/>
				<path d="M3.425.053a4.136 4.136 0 0 0-3.28 3.015C0 3.628-.01 3.956.005 8.3c.01 3.99.014 4.082.08 4.39.368 1.66 1.548 2.844 3.224 3.235.22.05.497.06 2.29.07 1.856.012 2.048.009 2.097-.04.05-.05.053-.69.053-7.94 0-5.374-.01-7.906-.033-7.952-.033-.06-.09-.063-2.03-.06-1.578.004-2.052.014-2.26.05Zm3 14.665-1.35-.016c-1.242-.013-1.375-.02-1.623-.083a2.81 2.81 0 0 1-2.08-2.167c-.074-.335-.074-8.579-.004-8.907a2.845 2.845 0 0 1 1.716-2.05c.438-.176.64-.196 2.058-.2l1.282-.003v13.426Z"/>
			</svg>
			Nintendo Switch
		</a>
	<!-- </div>	 -->

  </section>

  <hr>


  <!-- Contact Section-->
  <!-- <section class="page-section" id="contact">
	<div class="container">
		<h3 class="text-center" style="padding-top: 30px;">Merci de votre visite !</h3>
		<h5 class="lead" style="padding-top: 10px;">N'hésitez pas à nous contacter</h5>
		<div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <form method="POST" action="">
                             Name input
                            <div class="form mb-5">
                                <label for="nom">Nom</label>
                                <input class="form-control" id="nom" name="nom" type="text"/>
                            </div>

                            <div class="form mb-3">
                                <label for="objet">Objet *</label>
                                <input class="form-control" id="objet" name="objet" type="text"/>
                            </div>
                            Email address input
                            <div class="form mb-3">
                                <label for="email">Adresse Mail *</label>
                                <input class="form-control" id="email" type="email" name="mail"/>
                            </div>
                            Phone number input
                            <div class="form mb-3">
                                <label for="tel">Téléphone</label>
                                <input class="form-control" id="telephone" name="telephone" type="tel"/>

                            </div>
                             Message input
                            <div class="form mb-3">
                                <label for="message">Message *</label>
                                <textarea class="form-control" id="message" name="message" style="height: 10rem"></textarea>
                            </div>
        
                            <div class="d-none" id="submit">
                                <div class="text-center mb-3">
                                </div>
                            </div>

                            <button class="btn btn-info" type='submit'>Envoyez</button>
                        </form>
				<div class="row"></div>
			</div>
		</div>
	</div>
  </section> -->
		<footer class="container-fluid bg-black">


			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-black" id="staticBackdropLabel">Contact</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body bg-dark">
				<section class="page-section" id="contact">
	<div class="container">
		<h3 class="text-center" style="padding-top: 30px;">Merci de votre visite !</h3>
		<h5 class="lead" style="padding-top: 10px;">N'hésitez pas à nous contacter</h5>
		<div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <form method="POST" id="contactForm" action="#">
                            <!-- Name input-->
                            <div class="form mb-5">
                                <label for="nom">Nom *</label>
                                <input class="form-control" id="nom" name="nom" type="text"/>
                            </div>

                            <div class="form mb-3">
                                <label for="objet">Objet *</label>
                                <input class="form-control" id="objet" name="objet" type="text"/>
                            </div>
                            <!-- Email address input-->
                            <div class="form mb-3">
                                <label for="email">Adresse Mail *</label>
                                <input class="form-control" id="email" type="email" name="mail"/>
                            </div>
                            <!-- Phone number input-->
                            <div class="form mb-3">
                                <label for="tel">Téléphone</label>
                                <input class="form-control" id="telephone" name="telephone" type="tel"/>

                            </div>
                            <!-- Message input-->
                            <div class="form mb-3">
                                <label for="message">Message *</label>
                                <textarea class="form-control" id="message" name="message" style="height: 10rem"></textarea>
                            </div>
        
                            <div class="d-none" id="submit">
                                <div class="text-center mb-3">
                                </div>
                            </div>

                            <button class="btn btn-info" type='submit'>Envoyez</button>
                        </form>
				<div class="row"><?php echo $confirmation, $erreur ?></div>
			</div>
		</div>
	</div>
  </section>
  </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
				</div>
				</div>
			</div>
			</div>
			<p>
				<strong>&copy; Sleyter MONTEIRO & Myriam FARIDI</strong> - Etudiants en Cybersécurité - Guardia
				Cybersecurity School
			</p>

		<div class="row">
				<div class="col">
					<a href="https://instagram.com/aplaguetale?igshid=YmMyMTA2M2Y=" target="_blank" class="reseau" rel="nofollow"><i class="fa-brands fa-instagram"> Instagram </i></a>

					<a href="https://twitter.com/APlagueTale?s=20&t=dM-jhGQhY3ym9xPh0FYq3g" target="_blank" class="reseau" rel="nofollow"><i class="fa-brands fa-twitter" style="padding: 20px;"> Twitter </i></a>

					<a href="https://fr-fr.facebook.com/APlagueTale/" target="_blank" class="reseau" rel="nofollow"><i class="fa-brands fa-facebook"> Facebook </i></a>
				</div>	
		</div>
		
			<p><i class="fa-solid fa-triangle-exclamation"></i> Ce site est une fan conception réalisé par des étudiants dans le cadre de leur pédagogie et il n'est donc pas officiel. <i class="fa-solid fa-triangle-exclamation"></i><br> Je vous invite à vous rendre sur la page officiel du Jeu<a href="https://www.focus-entmt.com/fr/games/a-plague-tale-innocence" target="_blank" style="text-decoration: none;" rel="nofollow"> Focus Entertainement</a></p>


			<!-- <img src="img/guardia-logo-208x200.png.webp" alt="Logo de Guardia"/> -->
		</footer>
	</body>

	<!-- JavaScript Bundle with Popper -->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
		crossorigin="anonymous"></script>
<!-- 
		<script>
			if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
		</script> -->
</html>
