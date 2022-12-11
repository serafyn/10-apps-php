<?php

require 'header.php';

use Vidamrr\Notas\models\Note;

$notes = Note::getAll();
?>

<h1>Home</h1>
<div class="textarea">
    <?php

    foreach ($notes as $note) {
    ?>
        <a href="?view=view&id=<?php echo $note->getUuid(); ?>">
            <textarea><?php echo $note->getTitle(); ?></textarea>
        </a>

    <?php }

    ?>
</div>


<?php
require 'footer.php';
?>