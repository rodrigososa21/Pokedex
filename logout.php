<?php

    // Acá solamente tomamos la sesión existente y la destruímos.
    session_start();
    session_destroy();

    header("Location: index.php");
?>