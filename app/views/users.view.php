<?php require('partials/head.php'); ?>

<h1>Users</h1>

<?php foreach ($users as $user) : ?>
    <li><?= $user->name; ?></li>
<?php endforeach; ?>

<div>
    <h1>Submit your name :</h1>
</div>

<form method="POST" action="/names">
    <input name="name" type="text">
    <button type="submit">submit</button>
</form>

<?php require('partials/footer.php'); ?>