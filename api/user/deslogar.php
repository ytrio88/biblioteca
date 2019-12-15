<?php
    include "../geralDAO.php";
    session_destroy();
    header("Location: ../../../biblioteca/login");
    