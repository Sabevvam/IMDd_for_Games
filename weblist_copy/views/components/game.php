<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Game $game
 */
?>

<a href="/game?id=<?php echo $game->id()?>" class="card text-decoration-none movies__item" style="width: 176px; height: 310px;">
    <img src="<?php echo $storage->url($game->preview()) ?>" height="200px" class="card-img-top" alt="<?php echo $game->name() ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo $game->name() ?></h5>
        <p class="card-text">Бал <span class="badge bg-warning warn__badge"><?php echo $game->avgRating()?></span></p>
    </div>
</a>