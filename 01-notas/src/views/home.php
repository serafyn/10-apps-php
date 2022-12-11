<?php

require 'header.php';

use Vidamrr\Notas\models\Note;

$notes = Note::getAll();
?>




<h1>home</h1>

<?php

foreach ($notes as $note) {
?>


<?php }

?>



<?php
require 'footer.php';
?>