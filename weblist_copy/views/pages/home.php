<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */
?>

<?php $view->component('start'); ?>

    <main>
        <div class="container">
            <h3 class="mt-3">Новинки</h3>
            <hr>
            <div class="movies">
                <a href="game.html" class="card text-decoration-none movies__item">
                    <img src="https://www.overclockers.ua/news/games/134302-stalker-legends-of-the-zone-trilogy.jpg" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">S.T.A.L.K.E.R.</h5>
                        <p class="card-text">Бал <span class="badge bg-warning warn__badge">7.9</span></p>
                        <p class="card-text">серія ігор, розроблена українською компанією GSC Game World. Створена в жанрі шутер від першої особи і survival horror з елементами рольової гри та пригодницького бойовика. Події гри відбуваються в наш час, в альтернативному світі на території України, в Чорнобильській зоні відчуження.</p>
                    </div>
                </a>
            </div>
        </div>
    </main>

<?php $view->component('end'); ?>