<?php
require 'header.php';

use Vidamrr\Notas\models\Note;

if (count($_POST) > 0) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $note = new Note($title, $content);
    $note->save();
}
?>

<h1>Crear Nueva Nota</h1>

<form action="?view=create" method="POST">
    <input type="text" name="title" placeholder="Título" required />
    <textarea name="content" cols="30" rows="10"></textarea>
    <input type="submit" value="Crear" />
</form>

<?php
require 'footer.php';
?>