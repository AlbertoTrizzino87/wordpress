<div class="header-centro">
    <div class="logo">
        <a href="#">LOGO</a>
    </div>

    <i class="fal fa-bars hamburguesa"></i>

    <?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'container'       => 'nav',
            'container_class' => 'navegacion'
		) );
	?>
</div>