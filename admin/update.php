
<?php
require 'database.php';
// On récupere l'id dans l'url
if (!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);
}

$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

if (!empty($_POST))
{
    $name = checkInput($_POST['name']);
    $description = checkInput($_POST['description']);
    $price = checkInput($_POST['price']);
    $category = checkInput($_POST['category']);
    $image = checkInput($_FILES['image']['name']);
    $imagePath = '../img/' .basename($image);
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess = true;
    $isUploadSuccess = false;

    if(empty($name))
    {
        $nameError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($description))
    {
        $descriptionError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($price))
    {
        $priceError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($category))
    {
        $categoryError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($image))
    {
        $isImageUpdated = false;
    }
    else
    {
        $isImageUpdated = true;
        $isUploadSuccess = true;
//        Quel sont les extensions autorisé ?
        if ($imageExtension != "jpg" && $imageExtension !="png" && $imageExtension !="jpeg" && $imageExtension !="gif")
        {
            $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
//        est ce que l'image existe deja ?
        if(file_exists($imagePath))
        {
            $imageError = "le fichier existe deja";
            $isUploadSuccess = false;
        }
//        Qu'elle est la taille maximum autorisé ?
        if ($_FILES["image"]["size"] > 500000)
        {
            $imageError = "le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
//        est ce que le transfert de l'image à etait transfert avec sucess ?
        if ($isUploadSuccess)
        {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
            {
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated))
    {
        $db = Database::connect();
        if ($isImageUpdated)
        {
        $statement = $db->prepare("UPDATE items set name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?");
        $statement->execute(array($name,$description,$price,$category,$image,$id));
        }
        else
        {
            $statement = $db->prepare("UPDATE items set name = ?, description = ?, price = ?, category = ? WHERE id = ?");
            $statement->execute(array($name,$description,$price,$category,$id));
        }
        Database::disconnect();
        header("Location: index.php");
    }
    elseif ($isImageUpdated && !$isUploadSuccess)
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items WHERE id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image = $item['image'];
        Database::disconnect();
    }

}
else
{
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM items WHERE id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $name           = $item['name'];
    $description    = $item['description'];
    $price          = $item['price'];
    $category       = $item['category'];
    $image          = $item['image'];
    Database::disconnect();
}

// Méthodes pour vérifier la données récuperer dans le formulaire
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!doctype html>
<html>
<head>
    <title>La sandwicherie</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> La sandwicherie <span class="glyphicon glyphicon-cutlery"></span></h1>

<div class="container admin">
    <div class="row">
        <div class="col-sm-6">
            <h1><strong>Modifier un items </strong></h1>
            <br>
            <form class="form" role="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="nom" value="<?php echo $name; ?> ">
                    <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?> ">
                    <span class="help-inline"><?php echo $descriptionError; ?></span>
                </div>
                <div class="form-group">
                    <label for="price">Prix: (en €)</label>
                    <input type="text" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?> ">
                    <span class="help-inline"><?php echo $priceError; ?></span>
                </div>
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select class="form-control" id="category" name="category">

                        <?php
                        $db = Database::connect();
                        foreach ($db->query('SELECT * FROM categories') as $row)
                        {
                            if ($row['id'] == $category)
                            echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            else
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        Database::disconnect();
                        ?>
                    </select>
                    <span class="help-inline"><?php echo $categoryError; ?></span>
                </div>
                <div class="form-group">
                    <label >Image:</label>
                    <p><?php echo $image; ?></p>
                    <label for="">Selectionner une image: </label>
                    <input type="file" id="image" name="image">
                    <span class="help-inline"><?php echo $imageError; ?></span>
                </div>
                <br>
                <div class="form_actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                    <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                </div>
            </form>
        </div>

        <div class="col-sm-6 site">
            <div class="thumbnail">
                <img src="<?php echo '../img/' . $image ;?>" alt="...">
                <div class="price"><?php echo number_format((float)$price,2,'.',''). ' €'; ?></div>
                <div class="caption">
                    <h4><?php echo $name; ?></h4>
                    <p><?php echo $description; ?></p>
                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>


</html>