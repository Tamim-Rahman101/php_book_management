<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>

    <?php
    $bookData = json_decode(file_get_contents('book.json'), true);
    if ($bookData) {
        echo '<table border="1">';
        echo '<tr><th>Title</th><th>Author</th><th>Available</th><th>Pages</th><th>ISBN</th><th>Action</th></tr>';
        foreach ($bookData as $book) {
            echo '<tr>';
            echo '<td>' . $book['title'] . '</td>';
            echo '<td>' . $book['author'] . '</td>';
            echo '<td>' . ($book['available'] ? 'Yes' : 'No') . '</td>';
            echo '<td>' . $book['pages'] . '</td>';
            echo '<td>' . $book['isbn'] . '</td>';
            echo '<td><a href="remove_book.php?isbn=' . $book['isbn'] . '">Remove</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No books found.';
    }
    ?>
</body>
</html>
