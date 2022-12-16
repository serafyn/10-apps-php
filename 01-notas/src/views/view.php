<?php


use Vidamrr\Notas\models\Note;

if (count($_POST) > 0) {

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $uuid = $_POST['id'];


    $note = Note::get($uuid);
    $note->setTitle($title);
    $note->setContent($content);

    $note->update();
} else if (isset($_GET['id'])) {

    $note = Note::get($_GET['id']);
} else {
    header('Location:?view=home');
}

require 'header.php';
?>


<h1>View</h1>

<form action="?view=view&<?php echo $note->getUuid(); ?>" method="POST">
    <input type="text" name="title" placeholder="Título" value="<?php echo $note->getTitle(); ?>" />
    <input type="hidden" name="id" value="<?php echo $note->getUuid(); ?>" />
    <textarea name="content" cols="30" rows="10"><?php echo $note->getContent(); ?></textarea>
    <input type="submit" value="Update" />
</form>

<?php
require 'footer.php';
?>