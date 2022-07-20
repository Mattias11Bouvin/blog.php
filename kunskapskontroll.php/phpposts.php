<?php 
require('C:\Users\mattias\connectsql.php');
//echo "<pre>";
//print_r($_POST);    
//echo "</pre>";


if (isset($_POST['deletePostBtn'])) {
    
    $sql = "
        DELETE FROM posts 
        WHERE id = :id;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_POST['postId']);
    $stmt->execute(); 
} 


if (isset($_POST['addPostBtn'])) {
     
     $sql = "
        INSERT INTO posts ( id, title, content, author) 
        VALUES (:id, :title, :content, :author);
    ";
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(":id", $_POST['id']);
     $stmt->bindParam(":title", $_POST['title']);
     $stmt->bindParam(":content", $_POST['content']);
     $stmt->bindParam(":author", $_POST['author']);
     $stmt->execute(); 
}



$stmt   = $pdo->query("SELECT * FROM posts"); 
$posts  = $stmt->fetchAll();                      
//echo "<pre>";
//print_r($posts);
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

<h1>Blog Kunskapskontroll
<a href="http://localhost/phpvisitor.php">Visitor</a>

</h1>


    <table id="posts-tbl">
        <thead>
            <tr>
                
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                
                
            </tr>
        </thead>

        <tbody>
            
               
            

            
            <?php foreach ($posts as $post) { ?>
                <tr>
                    
                    <td><?=htmlentities($post['title']) ?></td>
                    <td><?=htmlentities($post['author']) ?></td>
                    <td><?=htmlentities($post['content']) ?></td>
                    
                    
                    <td>
                    <form action="" method="POST">
                            <input type="hidden" name="postId" value="<?=$post['id'] ?>">
                            <input type="submit" name="deletePostBtn" value="Delete post"><br>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>

    </table>

    
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="author" placeholder="Author"><br>
        <input type="text" name="content" placeholder="Content"><br>
        <input type="submit" name="addPostBtn" value="Create post"><br>
    </form>

    
</body>
</html>