<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Game> $games
 */
?>

<?php $view->component('start'); ?>

    <main>
        <div class="container">
            <h3 class="mt-3">Новинки</h3>
            <hr>
            <div class="movies">
                <?php foreach ($games as $game) : ?>
                    <?php $view->component('game', ['game' => $game]); ?>
                <?php endforeach;?>
            </div>
        </div>
    </main>

<?php $view->component('end'); ?>