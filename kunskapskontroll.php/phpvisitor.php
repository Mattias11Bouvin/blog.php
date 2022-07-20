<?php 
require('C:\Users\mattias\connectsql.php');
//echo "<pre>";
//print_r($_POST);    
//echo "</pre>";




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

<h1>Blog For My Visitors
<a href="http://localhost/phpposts.php">Back</a></h1>
<table id="posts-tbl">
    
        <thead>
            <tr>
                
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Published_date</th>
                
                
            </tr>
        </thead>

        <tbody>
            
            
        
            
            <?php foreach ($posts as $post) { ?>
                <tr>
                 
                    
                    
                    <td><?=htmlentities($post['title']) ?></td>
                    <td><?=htmlentities($post['author']) ?></td>
                    <td><?=
                    
                    $position= substr( 0, 100); 
                    $message=$post['content'];
                    $limitedpost = substr($message, 0, 100);
                    echo $limitedpost . "<a href='http://localhost/specificpost.php?id=$post[id]'"  ?></a>
                    Read More </td>
                    
                      
                    <td><?=htmlentities($post['published_date']) ?></td> 
                    
                    <form action="" method="POST">
                            <input type="hidden" name="postId" value="<?=$post['id'] ?>">
                        </form>
                    
                </tr>
            <?php }?>
        </tbody>

    </table>

</body>
</html>



