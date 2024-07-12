<?php

/**
 * theme index file
 * currently all pages and posts are displayed by this file
 *
 * */

?>
<!DOCTYPE html>

<html lang="he" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>

		<?php

		the_title();
		echo ' &bullet; ';
		bloginfo( 'name' );

		?>

    </title>

    <style>
        html {
            font-family: system-ui;
        }

        p {
            max-width: 60ch;
            line-height: 1.5;
        }
    </style>

</head>

<body>

<header>

	<?php

	$pages = get_pages();
	if ( ! empty( $pages ) ) :?>

        <h2><?php bloginfo( 'name' ); ?></h2>

        <p><?php bloginfo( 'description' ); ?></p>

        <nav>

			<?php foreach ( $pages as $key => $page ) : ?>

				<?php if ( 0 !== $key && $key < count( $pages ) ) : ?>
                    <span>&bullet;</span>
				<?php endif ?>

                <a href="<?php echo get_page_link( $page->ID ); ?>">
					<?php echo $page->post_title; ?>
                </a>


			<?php endforeach; ?>

        </nav>

	<?php endif; ?>

</header>

<main>
	<?php the_content(); ?>
</main>

<footer>

    <hr>

    <p>
        דף זה נוצר בתאריך:
        <span class="modified-date">
            <?php the_date(); ?>
        </span>
        ונערך לאחרונה בתאריך:
        <span class="created-date">
		    <?php the_modified_date( get_option( 'date_format' ) ); ?>
        </span>
    </p>

    <hr>

    <div>
        <p>
            מונע בגאווה על ידי <a href="https://wordpress.org/">וורדפרס</a>
        </p>
        <p>כל התוכן שבאתר, אלא אם צוין אחרת, ©2023-2024 <strong>יוחאי ועדי גליק</strong>. כל
            הזכויות שמורות.
        </p>
        <p>
            האתר משתמש בתבנית <strong><?php echo esc_html( __( get_stylesheet(), 'seasons' ) ); ?></strong>.
        </p>
    </div>

    <div lang="en" dir="ltr">
        <p>
            Proudly powered by <a href="https://wordpress.org/">WordPress</a>.
        </p>
        <p>
            All contents of this site, unless otherwise noted, are ©2023-2024 Yochai and Adi Glik. All Rights Reserved.
        </p>
        <p>
            Current theme is <strong><?php echo esc_html( get_stylesheet() ); ?></strong>
        </p>
    </div>

</footer>

</body>

</html>
