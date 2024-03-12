<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>404 Error Page</title>
        <style>
            body {
                background: linear-gradient(180deg, #b2afcb, #3e405d);
                min-height: 100vh;
                overflow: hidden;
            }

            h1 {
                text-align: center;
                font-family: sans-serif;
                font-size: 4em;
                font-weight: normal;
                margin-bottom: 60px;
                color: #3e405d;
                text-shadow: 20px 20px 15px gray;
            }

            .picture-board {
                display: grid;
                grid-template-columns: 1fr 1fr;
                justify-content: center;
                max-width: 1400px;
                margin: auto;
            }

            img {
                display: block;
                margin: auto;
                border-radius: 20px;
                margin-top: 20px;
                height: 210px;
                box-shadow: 0px 0px 20px gray;
            }

            .go-to-the-home-page {
                margin-top: 120px;
                text-align: center;
                font-size: 1.9em;
            }

            .go-to-the-home-page a {
                text-decoration: none;
                color: orange;
                cursor: pointer;
            }

            .go-to-the-home-page a span {
                position: relative;
                top: -5px;
                left: 6px;
            }
        </style>
    </head>

    <body>
        <h1>Erreur 404 : Cette page n'existe pas</h1>

        <div class="picture-board">
            <img src="https://i.pinimg.com/originals/ff/f4/d3/fff4d33080d749876265297ba3c71c2e.gif" alt="anime rain" />
            <img src="https://gifdb.com/images/high/anime-rain-nichijou-mio-kx6m907pvfcou7cz.gif" alt="anime rain 2" />
        </div>

        <p class="go-to-the-home-page">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                <span>Retour à la page d'accueil</span>
            </a>
        </p>
    </body>
</html>
