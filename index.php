<!DOCTYPE html>
<html>
<head>

    <title>xkcd Password Generator</title>
    <meta charset='utf-8'>

    <link rel='stylesheet' href='styles.css' type='text/css'>

    <?php require('logic.php'); ?>

</head>
<body>
    <h1> xkcd Password Generator </h1>

    <form action='index.php' method='get'>
        # of words <input type='text' name='numWords' size='6' maxlength='1' autofocus> (Max 9)<br>
        <input type='checkbox' name='number' value='yes'> Add a number<br>
        <input type='checkbox' name='symbol' value='yes'> Add a symbol<br>
        <input type='submit' value='Submit'>
        <?php if(isset($error)): ?>
            <div class='error'><?php echo $error; ?></div>
        <?php endif ?>
    </form>

</body>
</html>
