<!DOCTYPE html>
<html>
<head>
    <title>Search Book</title>
</head>
<body>
    <h1>Search Book</h1>

    <form action="" method="get">
        <input type="text" name="query" placeholder="Search by title or author" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $bookData = json_decode(file_get_contents('book.json'), true);

        $foundBooks = array_filter($bookData, function ($book) use ($query) {
            return strpos($book['title'], $query) !== false || strpos($book['author'], $query) !== false;
        });

        if (!empty($foundBooks)) {
            echo '<h2>Search Results:</h2>';
            echo '<table border="1">';
            echo '<tr><th>Title</th><th>Author</th><th>Available</th><th>Pages</th><th>ISBN</th></tr>';
            foreach ($foundBooks as $book) {
                echo '<tr>';
                echo '<td>' . $book['title'] . '</td>';
                echo '<td>' . $book['author'] . '</td>';
                echo '<td>' . ($book['available'] ? 'Yes' : 'No') . '</td>';
                echo '<td>' . $book['pages'] . '</td>';
                echo '<td>' . $book['isbn'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Sorry, we don\'t have the book you are looking for.';
        }
    }
    ?>
</body>
</html>
