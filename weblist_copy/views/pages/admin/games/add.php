<?php
/**
 * @var \App\Kernel\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start'); ?>
    <h1>Add games page</h1>


    <form action="/admin/games/add" method="post" enctype="multipart/form-data">
        <p>Name</p>
        <div class="div">
            <input type="text" name="name">
        </div>
        <?php if($session->has('name')) { ?>
            <ul>
                <?php foreach ($session->getFlash('name') as $error) {?>
                <li style="color: red;"><?php echo $error?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <div class="div">
            <input type="file" name="image">
        </div>

        <div class="div">
            <button>Add</button>
        </div>
    </form>
<?php $view->component('end'); ?>
