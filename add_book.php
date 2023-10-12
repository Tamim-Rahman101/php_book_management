<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add a Book</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newBook = array(
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'available' => $_POST['available'] == 'on' ? true : false,
            'pages' => $_POST['pages'],
            'isbn' => $_POST['isbn']
        );

        $bookData = json_decode(file_get_contents('book.json'), true);
        $bookData[] = $newBook;

        file_put_contents('book.json', json_encode($bookData));
        echo 'Book added successfully. <a href="index.php">Go back to the book list</a>';
    }
    ?>

    <form action="" method="post">
        <table>
            <tr align=left>
                <th>Title:</th>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr align=left>
                <th>Author:</th>
                <td><input type="text" name="author" required></td>
            </tr>
            <tr align=left>
                <th>Available:</th>
                <td><input type="checkbox" name="available"></td>
            </tr>
            <tr align=left>
                <th>Pages:</th>
                <td><input type="number" name="pages" required></td>
            </tr>
            <tr align=left>
                <th>ISBN:</th>
                <td><input type="text" name="isbn" required></td>
            </tr>
        </table>
        <input type="submit" value="Add">
        <input type="button" onclick="window.location.href='https://localhost/json_book_database/';" value="Book List">
    </form>
</body>
</html>
