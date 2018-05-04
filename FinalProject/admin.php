<?php

    // Start Session
    session_start();
    if(!isset($_SESSION['adminName']))
    {
        header("Location:")
    }

?>