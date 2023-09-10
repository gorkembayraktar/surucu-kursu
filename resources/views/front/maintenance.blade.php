<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bakım Modu @if($settings->get('title'))-@endif {{ $settings->get('title') }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{ asset( $settings->get('favicon') ) }}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{ asset( $settings->get('favicon') ) }}">

        <meta name="description" content="{{ ( $settings->get('seo_description') ) }}">
        <meta name="keywords" content="{{ ( $settings->get('seo_keywords') ) }}">
        <meta name="author" content="{{ ( $settings->get('seo_author') ) }}">

  
            <style>
            html, body {
                margin: 0 auto;
                font-family: Arial, Helvetica, sans-serif;
                height: 100%;
                background: #eeeef4;
                font-weight: 100;
                user-select: none;
            }
            main {
                height: 100%;
                display: flex;
                margin: 0 20px;
                text-align: center;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            main h1 {
                font-size: 3em;
                font-weight: 100;
                margin: 0;
            }
            main h2 {
                font-size: 1.5em;
                font-weight: 100;
                margin-bottom: 0;
            }
            main h3 {
                font-size: 1.5em;
                font-weight: 100;
                margin-top: 0;
            }
            main a {
                font-size: 1.5em;
                font-weight: 300;
                text-decoration: none;
            }
            footer {
                position: absolute;
                bottom: 0;
                margin: 10px;
                font-weight: 300;
            }

                </style>
  
     
    </head>
    <body>
        <main>
            {!! $settings->get('maintenance_html') !!}
        </main>
    </body>
</html>

    