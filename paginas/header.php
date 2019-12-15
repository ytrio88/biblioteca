<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?php
        $extra = "";
        for ($i=0; $i < sizeof($lista)-1; $i++) 
            $extra .= "../";
        echo '
        <script src="' . $extra . 'js/jquery.js"></script>
        <script src="' . $extra . 'js/base.js"></script>
        <script src="' . $extra . 'js/pdfmake.js"></script>
        <script src="' . $extra . 'js/vfs_fonts.js"></script>
        <link rel="stylesheet" href="' . $extra . 'css/base.css">';
    ?>
    