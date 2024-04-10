<?php
/**
 * @var \App\Kernel\View $view
 * @var \App\Kernel\Session\Session $session
 */
?>

<?php $view->component('start'); ?>
    <h1>Add games page</h1>


    <form action="/admin/games/add" method="post">
        <p>Name</p>
        <div class="div">
            <input type="text" name="name">
        </div>
        <?php if($session->has('name')) { ?>
            <ul>
                <li style="color: red;">Error 1</li>
                <li style="color: red;">Error 2</li>
            </ul>
        <?php } ?>

        <div class="div">
            <button>Add</button>
        </div>
    </form>
<?php $view->component('end'); ?>
