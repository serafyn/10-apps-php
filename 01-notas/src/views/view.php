<?php
require 'header.php';

use Vidamrr\Notas\models\Note;

if (isset($_GET['id'])) {

    $note = Note::get($_GET['id']);
} else {
    header('Location:?view=home');
}

?>

<h1>View</h1>

<?php
require 'footer.php';
?>