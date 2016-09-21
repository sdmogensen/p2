<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <title>xkcd Password Generator</title>
    <link rel='stylesheet' href='styles.css' type='text/css'>
    <?php require('logic.php'); ?>

</head>
<body>
    <h1> xkcd Password Generator </h1>

    <form action='index.php' method='get'>
        # of words <input type='text' name='numWords' size='6' maxlength='1'
            value='<?php if (isset($numWords)) echo $numWords;?>' autofocus> (Max 9)<br>
        <input type='checkbox' name='number' value='yes'
            <?php if (isset($number) and $number) echo 'checked';?>> Add a number<br>
        <input type='checkbox' name='symbol' value='yes'
            <?php if (isset($symbol) and $symbol) echo 'checked';?>> Add a symbol<br><br>
        <input type='submit' class='button' value='Submit'>
    </form>

    <?php if(isset($error)): ?>
        <p class='error'><?php echo $error; ?></p>
    <?php endif ?>

    <?php if (isset($password)): ?>
        <p class='password'><?php echo $password; ?></p>
    <?php endif ?>

</body>
</html>
