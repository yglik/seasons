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


    <!--suppress CssInvalidPropertyValue, CssUnusedSymbol -->
    <style>

        /* custom properties declaration */
        :root {

            --summer-color: oklch(0.5 0.1 142.49); /* nature green */
            --autumn-color: oklch(0.5 0.1 49.29); /* fall brown orange */
            --winter-color: oklch(0.5 0.1 236.54); /* cold ice blue */
            --spring-color: oklch(0.5 0.1 350.31); /* blossom pink */


            @media (prefers-color-scheme: dark) {
                --summer-color: oklch(0.65 0.3 142.49); /* nature green */
                --autumn-color: oklch(0.65 0.3 49.29); /* fall brown orange */
                --winter-color: oklch(0.65 0.3 236.54); /* cold ice blue */
                --spring-color: oklch(0.65 0.3 350.31); /* blossom pink */

            }

            --season-color: var(--autumn-color);

        }

        html {
            font-family: system-ui;

            color: black;
            background-color: white;

            @media (prefers-color-scheme: dark) {
                color: white;
                background-color: black;;
            }
        }

        body {
            max-width: clamp(320px, 90%, 1000px);
            margin: auto;

            font-size: 1.25rem;
            line-height: 1.5;

            accent-color: var(--season-color);
        }

        img {
            max-width: 100%;
        }

        p {
            max-width: 65ch;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--season-color);
            text-wrap: balance;
        }

        a {
            @media (prefers-color-scheme: dark) {
                color: rgb(158, 158, 255); /* webkit-link on dark color scheme */
            }
        }

        li + li {
            margin-block-start: 0.5rem;
        }

        figure.wp-block-image {
            margin: 0;
        }

        pre, code {
            direction: ltr;
        }

        @media (prefers-reduced-motion) {
            *, *::before, *::after {
                animation-duration: 0s !important;
                /* additional recommendation */
                transition: none !important;
                scroll-behavior: auto !important;
            }
        }

        :where(body:has(input[name="hebrew"]:not(:checked)) .internationalized[lang="he"]) {
            display: none;
        }

        :where(body:has(input[name="english"]:not(:checked)) .internationalized[lang="en"]) {
            display: none;
        }

    </style>

</head>

<body>

<header>

	<?php

	$pages = get_pages( [ 'sort_column' => 'menu_order' ] );
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
<?php
$content_has_h1_tag = ( new WP_HTML_Tag_Processor( get_the_content() ) )->next_tag( 'h1' );
?>
<main>

	<?php if ( ! $content_has_h1_tag ): ?>

        <h1><?php the_title() ?></h1>

	<?php endif; ?>

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

    <div class="internationalized" lang="he">
        <p>
            מונע בגאווה על ידי <a href="https://wordpress.org/">וורדפרס</a>
        </p>
        <p>כל התוכן שבאתר, אלא אם צוין אחרת, ©2023-2024 <strong>יוחאי ועדי גליק</strong>. כל
            הזכויות שמורות.
        </p>
        <p>
            האתר משתמש בתבנית <strong><?php echo esc_html( __( ucfirst( get_stylesheet() ), 'seasons' ) ); ?></strong>.
        </p>
    </div>

    <div class="internationalized" lang="en" dir="ltr">
        <p>
            Proudly powered by <a href="https://wordpress.org/">WordPress</a>.
        </p>
        <p>
            All contents of this site, unless otherwise noted, are ©2023-2024 Yochai and Adi Glik. All Rights Reserved.
        </p>
        <p>
            Current theme is <strong><?php echo esc_html( ucfirst( get_stylesheet() ) ); ?></strong>
        </p>
    </div>

    <hr>

    <form id="settings">

        <label for="hebrew">עברית</label>
        <input type="checkbox" name="hebrew" id="hebrew" checked>

        <label for="english">English</label>
        <input type="checkbox" name="english" id="english">

    </form>

</footer>

</body>

</html>
