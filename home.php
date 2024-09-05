<?php get_header(); ?>

<main id="primary" class="site-main home">

	<div class="section">
		<h2>Portfolio</h2>
	</div>

	<!-- Link to websites CPT -->
	<?php include('includes/websitesCPT.php'); ?>
	

	<div class="section" id="words">
		<span class="first">
			Imaginer.
		</span> 
		<span class="second">
			Créer.
		</span> 
		<span class="third">
			Recommencer.
		</span>
	</div>

	<div class="about">
		<div class="section">
			<div class="left">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/veronique_delauney_photo.jpeg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="right">
				<h2>A propos</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultricies est nec augue gravida auctor. Sed dictum efficitur felis, sit amet porttitor nulla placerat eu. Donec urna massa, dapibus eu hendrerit a, convallis cursus est. Aenean at libero nec massa pulvinar iaculis. Mauris commodo justo ipsum. In sodales tristique tortor porttitor bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque fermentum dictum lectus, at maximus mi interdum iaculis. Donec hendrerit augue leo. Nullam ut ex ac libero auctor porttitor.
				</p>
			</div>
		</div>
	</div>


	<div class="section">
		<h2>Compétences</h2>

		<div class="center">
			<p>
				A votre écoute, je vous accompagne dans l'intégralité de votre projet numérique.
			</p>
			<p>
				De la conception de votre identité visuelle à la réalisation de vos supports print et web, je développe pour vous une stratégie complète à votre image.
			</p>
		</div>
	 	<?php include('includes/competenciesCPT.php'); ?>
	</div>
	<!-- <div class="section" id="competencies">
		<div class="left">			
		</div>
		<div class="right">
			<div class="logo-holder">
				<div class="bg"></div>
				<div class="group">
					<div class="left">WORDPRESS</div>
					<div class="right">
						<div class="bar fill1"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">CSS3</div>
					<div class="right">
						<div class="bar fill2"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">JAVASCRIPT</div>
					<div class="right">
						<div class="bar fill3"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">PHP</div>
					<div class="right">
						<div class="bar fill4"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">GIT</div>
					<div class="right">
						<div class="bar fill5"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">INDESIGN</div>
					<div class="right">
						<div class="bar fill6"></div>
					</div>
				</div>
				<div class="group">
					<div class="left">PHOTOSHOP</div>
					<div class="right">
						<div class="bar fill6"></div>
					</div>
				</div>
			</div>
		</div>		
	</div> -->


	<!-- Sliding images -->
	<div class="fullWidth">
		<div class="images">
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square3.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square2.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square3.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square2.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square3.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square2.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square3.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
			<div class="square">
				<img class="portrait" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/square2.jpg'; ?> " alt="Véronique Delauney" title="Véronique Delauney" />
			</div>
		</div>
	</div>


</main>

<?php get_footer(); ?>