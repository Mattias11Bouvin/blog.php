<?php 
require('C:\Users\mattias\connectsql.php');
//echo "<pre>";
//print_r($_GET);    
//echo "</pre>";
 

$sql = "
SELECT * FROM posts
WHERE id = :id
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$post = $stmt->fetch();                  

//echo "<pre>";
//print_r($post);
//echo "</pre>";

        ?>          


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Kunskapskontroll</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<h1>Specific post<a href="http://localhost/phpvisitor.php">Back</a></h1>
<table id="posts-tbl">
        <thead>
            <tr>
                
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Published_date</th>
        
            </tr>
            <tr>
            <form method="GET" action="postId">
                
                    <td><?=htmlentities($post['title']) ?> </td>
                    <td><?=htmlentities($post['author']) ?></td>
                    <td><?=htmlentities($post['content']) ?></td>
                    <td><?=htmlentities($post['published_date']) ?></td>
            </tr>
</form>

    </table>

</body>
</html>