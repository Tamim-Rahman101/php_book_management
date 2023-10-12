<?php
if (isset($_GET['isbn'])) {
    $isbnToRemove = $_GET['isbn'];

    $bookData = json_decode(file_get_contents('book.json'), true);
    foreach ($bookData as $key => $book) {
        if ($book['isbn'] == $isbnToRemove) {
            unset($bookData[$key]);
            file_put_contents('book.json', json_encode($bookData));
            break;
        }
    }
}

header('Location: index.php');
?>
