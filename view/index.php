<?php if(session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="es"> <!-- "es" si la web está en español -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Hilo Rojo</title>
    <!-- CSS principal -->
    <link rel="stylesheet" href="index2.0.css">
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">


</head>

<body>
    <div id="contenedor">
        <!-- CABECERA SUPERIOR -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/HiloRojo/view/header.php'; ?>


        <main id="contenido">
            <section id="portada">
                <div>
                    <h2> CONECTAR NUNCA FUE TAN SENCILLO</h2>
                    <h3> Conexiones que no
                        <br> dependen de un algoritmo.
                    </h3>
                    <a class="btn-inicio" href="#eventos_cerca"> VER EVENTOS </a>
                </div>
            </section>

            <section id="slider">
                <div class="your-class">
                    <div class="slide-card-slider">
                        <a href="eventos/evento_ejemplo1.php">
                            <img src="assets/Ejemplo_evento_1.png" alt="imagen de evento" />
                        </a>
                        <h3> GAME NIGHT DATING </h3>
                    </div>
                    <div class="slide-card-slider">
                        <a href="eventos/evento_ejemplo5.php">
                            <img src="assets/Ejemplo_evento_5.jpg" alt="imagen de evento" />
                        </a>
                        <h3>CITAS NOCTURNAS</h3>
                    </div>
                    <div class="slide-card-slider">
                        <a href="eventos/evento_ejemplo3.php">
                            <img src="assets/Ejemplo_evento_3.png" alt="imagen evento" />
                        </a>
                        <h3> ENTRE CALÇOTS</h3>
                    </div>
                    <div class="slide-card-slider">
                        <a href="eventos/evento_ejemplo4.php">
                            <img src="assets/Ejemplo_evento_4.png" alt="imagen de evento" />
                        </a>
                        <h3>PINK LOVE EXPERIENCE</h3>
                    </div>
                </div>
            </section>


            <section id="eventos_nuevos">
                <h2 id="subtitulo"> RECIÉN LLEGADOS AL HILO... </h2>
                <article>
                    <img src="assets/Ejemplo_evento_1.png" alt="imagen de evento" />
                    <div>
                        <h2> GAME NIGHT DATING </h2>
                        <p> Speed dating tradicional para fans de los juegos de mesa.
                            Conecta con otras personas mientras compartís partidas, risas y conversaciones en un
                            ambiente cercano y divertido.
                            <br>Ideal para romper el hielo jugando.
                        </p>
                        <a href="eventos/evento_ejemplo1.php" class="card__btn"> IR AL EVENTO </a>
                    </div>
                </article>
                <article>
                    <img src="assets/Ejemplo_evento_2.png" alt="imagen de evento" />
                    <div>
                        <h2> SPEED DATING RETRO</h2>
                        <p> Viaja a los años 50 con una experiencia divertida entre batidos, música vintage y nuevas
                            conexiones. Nunca es tarde para conectar, una experiencia única.</p>
                        <a href="eventos/evento_ejemplo2.php" class="card__btn"> IR AL EVENTO </a>
                    </div>
                </article>
            </section>

            <section id="eventos_cerca">
                <h2 id="subtitulo"> CONECTA CERCA DE TI...</h2>

                <article class="card">
                    <div class="card__photo">
                        <img src="assets/Ejemplo_evento_3.png" alt="imagen evento" />
                    </div>

                    <h3 class="card__title"> ENTRE CALÇOTS</h3>
                    <p class="card__meta">Comparte calçots, vino y risas en un evento donde conocer gente fluye de forma
                        natural.</p>
                    <a href="eventos/evento_ejemplo3.php" class="card__btn"> IR AL EVENTO </a>
                </article>
                <article class="card">
                    <div class="card__photo">
                        <img src="assets/Ejemplo_evento_4.png" alt="imagen de evento" />
                    </div>

                    <h3 class="card__title">PINK LOVE EXPERIENCE</h3>
                    <p class="card__meta">Un evento pensado para quienes creen en el amor bonito. Ambiente rosa y
                        atmósfera íntima.</p>
                    <a href="eventos/evento_ejemplo4.php" class="card__btn"> IR AL EVENTO </a>
                </article>
                <article class="card">
                    <div class="card__photo">
                        <img src="assets/Ejemplo_evento_5.jpg" alt="imagen de evento" />
                    </div>

                    <h3 class="card__title">CITAS NOCTURNAS</h3>
                    <p class="card__meta"> Conversaciones sin prisas, sin presión y con un toque nocturno.</p>
                    <a href="eventos/evento_ejemplo5.php" class="card__btn"> IR AL EVENTO </a>
                </article>

                <article class="card">
                    <div class="card__photo">
                        <img src="assets/Ejemplo_evento_6.jpg" alt="imagen evento" />
                    </div>

                    <h3 class="card__title">EXPERIENCIA SOCIAL</h3>
                    <p class="card__meta">Una cena dinámica para conocer gente nueva de forma natural.</p>
                    <a href="eventos/evento_ejemplo6.php" class="card__btn"> IR AL EVENTO </a>
                </article>

                <article class="card">
                    <div class="card__photo">
                        <img src="assets/ejemplo_evento_7.jpg" alt="imagen evento" />
                    </div>

                    <h3 class="card__title">CITAS A CIEGAS</h3>
                    <p class="card__meta">Atrévete a vivir una experiencia diferente sin distracciones visuales.</p>
                    <a href="eventos/evento_ejemplo7.php" class="card__btn"> IR AL EVENTO </a>
                </article>

                <article class="card">
                    <div class="card__photo">
                        <img src="assets/ejemplo_evento_8.png" alt="imagen evento" />
                    </div>

                    <h3 class="card__title">DATING CON MASCOTAS</h3>
                    <p class="card__meta">Conecta con otras personas amantes de los animales en un entorno divertido.
                    </p>
                    <a href="eventos/evento_ejemplo8.php" class="card__btn"> IR AL EVENTO </a>
                </article>
            </section>

            <section id="slider-empresas">
                <h2 id="subtitulo"> PROMOTORES DEL HILO ROJO</h2>
                <div class="your-class-empresas">
                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Restaurante · Gràcia, Barcelona</p>
                            <h3 class="promotor-card__titulo">Restaurante La Plaza</h3>
                            <p class="promotor-card__descripcion">
                                Un espacio gastronómico cálido y social, pensado para compartir
                                buena comida, conversaciones y nuevas conexiones.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Ambiente acogedor</li>
                                    <li>Ubicación céntrica</li>
                                    <li>Ideal para encuentros distendidos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Cafetería · Eixample, Barcelona</p>
                            <h3 class="promotor-card__titulo">Café Aurora</h3>
                            <p class="promotor-card__descripcion">
                                Una cafetería tranquila y luminosa, perfecta para eventos cercanos,
                                charlas informales y primeras conexiones sin presión.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Espacio relajado</li>
                                    <li>Buena iluminación</li>
                                    <li>Perfecto para citas de tarde</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Bar cultural · El Born, Barcelona</p>
                            <h3 class="promotor-card__titulo">La Sala Roja</h3>
                            <p class="promotor-card__descripcion">
                                Un local con personalidad propia, música suave y ambiente creativo,
                                ideal para encuentros con un toque diferente.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Ambiente artístico</li>
                                    <li>Zona con encanto</li>
                                    <li>Formato ideal para grupos pequeños</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Casa joven · Sants, Barcelona</p>
                            <h3 class="promotor-card__titulo">Espai Jove Sants</h3>
                            <p class="promotor-card__descripcion">
                                Un espacio comunitario pensado para actividades sociales, dinámicas
                                participativas y eventos accesibles para gente joven.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Entorno juvenil</li>
                                    <li>Espacio polivalente</li>
                                    <li>Ideal para actividades guiadas</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Librería café · Sant Antoni, Barcelona</p>
                            <h3 class="promotor-card__titulo">Lletres i Cafè</h3>
                            <p class="promotor-card__descripcion">
                                Una librería con zona de café donde las conversaciones nacen de forma
                                natural entre libros, calma y pequeños detalles.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Ambiente íntimo</li>
                                    <li>Estética cuidada</li>
                                    <li>Ideal para perfiles tranquilos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Rooftop · Poblenou, Barcelona</p>
                            <h3 class="promotor-card__titulo">Terrassa Mar</h3>
                            <p class="promotor-card__descripcion">
                                Una terraza urbana con vistas y ambiente moderno, pensada para eventos
                                sociales al aire libre y experiencias más especiales.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Vistas agradables</li>
                                    <li>Ambiente moderno</li>
                                    <li>Perfecto para eventos de noche</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Centro cultural · El Raval, Barcelona</p>
                            <h3 class="promotor-card__titulo">Centre Obert Raval</h3>
                            <p class="promotor-card__descripcion">
                                Un espacio diverso y abierto a la comunidad, ideal para encuentros
                                inclusivos, dinámicas sociales y eventos con valor humano.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Espacio inclusivo</li>
                                    <li>Ubicación multicultural</li>
                                    <li>Ideal para eventos participativos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Coctelería · Sarrià, Barcelona</p>
                            <h3 class="promotor-card__titulo">Nuit Bar</h3>
                            <p class="promotor-card__descripcion">
                                Una coctelería elegante y tranquila, perfecta para encuentros más
                                cuidados, conversaciones pausadas y ambiente sofisticado.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Ambiente elegante</li>
                                    <li>Iluminación cálida</li>
                                    <li>Ideal para citas afterwork</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Espacio creativo · Poble-sec, Barcelona</p>
                            <h3 class="promotor-card__titulo">Atelier 21</h3>
                            <p class="promotor-card__descripcion">
                                Un estudio creativo adaptable para talleres, encuentros temáticos
                                y eventos donde la experiencia importa tanto como la conexión.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Formato flexible</li>
                                    <li>Estética original</li>
                                    <li>Ideal para eventos temáticos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="promotor-card">
                        <div class="promotor-card__contenido">
                            <p class="promotor-card__tipo">Hotel boutique · Ciutat Vella, Barcelona</p>
                            <h3 class="promotor-card__titulo">Hotel Brisa</h3>
                            <p class="promotor-card__descripcion">
                                Un hotel pequeño y con encanto, ideal para organizar encuentros
                                cuidados, cómodos y con una imagen más profesional.
                            </p>
                            <div class="promotor-card__bloque">
                                <h4>Lo que aporta</h4>
                                <ul class="promotor-card__lista">
                                    <li>Imagen profesional</li>
                                    <li>Espacios reservados</li>
                                    <li>Ideal para eventos especiales</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="espacio_iconos">
                <h2 id="subtitulo"> MÁS ALLÁ DEL ENCUENTRO</h2>
                <article class="card_icon">
                    <div class="card__icon_photo">
                        <div class="icon" id="icon4"> </div>
                    </div>
                    <h3 class="card__title">Próximos Encuentros</h3>
                    <p class="card__meta">Consulta el calendario y reserva tu plaza en los próximos encuentros, cenas y
                        experiencias exclusivas.</p>
                </article>
                <article class="card_icon">
                    <div class="card__icon_photo">
                        <div class="icon" id="icon2"> </div>
                    </div>
                    <h3 class="card__title">Sugerencias & Soporte</h3>
                    <p class="card__meta">Tu opinión importa. Envíanos sugerencias o comunícanos cualquier incidencia
                        para seguir mejorando.</p>
                </article>
                <article class="card_icon">
                    <div class="card__icon_photo">
                        <div class="icon" id="icon1"> </div>
                    </div>

                    <h3 class="card__title">Guía para Conectar</h3>
                    <p class="card__meta">Descubre cómo funcionamos y prepárate con consejos prácticos para disfrutar de
                        tu experiencia.</p>
                </article>

                <article class="card_icon">
                    <div class="card__icon_photo">
                        <div class="icon" id="icon3"> </div>
                    </div>
                    <h3 class="card__title">Términos y Normativa</h3>
                    <p class="card__meta">Queremos un entorno seguro y respetuoso. Conoce nuestras normas y cómo
                        protegemos tu privacidad.</p>
                </article>

            </section>
        </main>
    </div>
    <footer>
        <img src="assets/logo en blanco.png" alt="logo del footer">
        <nav class="footer-nav">
            <a href="#sobre-nosotros">Sobre nosotros</a>
            <a href="#ayuda">Ayuda</a>
            <a href="#contacto">Contacto</a>
            <a href="index.php">Home</a>
        </nav>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="slick/slick.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.your-class').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '60px',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '40px'
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '20px'
                        }
                    }
                ]
            });
        });
        $(document).ready(function () {
            $('.your-class-empresas').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>

</body>

</html>