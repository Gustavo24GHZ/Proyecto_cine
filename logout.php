<?php
    session_start();

    if(!isset($_SESSION['id_usu'])) {
        header("Location: ../index.html");
        exit();
    }

    session_destroy();
    echo "<script>alert('Vuelva pronto!');window.location.href='../index.html';</script>";
?>