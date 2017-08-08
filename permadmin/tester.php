<?php print_r($_POST); ?>

<html>
<head>
    <title>tester input</title>
</head>
<body>
    <form method="post">
        <p>
            <input type="text" name="post_title" />
        </p>
        <p>
            <textarea name="post_content"></textarea>
        </p>
        <p>
            <label for="post_category">cat1</label>
            <input type="checkbox" name="post_category" value="cat1" />
            <label for="post_category">cat2</label>
            <input type="checkbox" name="post_category" value="cat2" />
        </p>
        <p>
            <input type="submit" value="submit" />
        </p>
    </form>
</body>
</html>
