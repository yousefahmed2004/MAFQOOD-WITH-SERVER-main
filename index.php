<?php include "partials/header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/all.min.css" />
    <link rel="stylesheet" href="/public/css/normalize.css" />
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" type="x-icon" href="/public/images/logo.png" />
    <title>MAFQOOD - مفــــقــــود</title>
    <style>
        .search-buttons {
            display: flex;
            gap: 10px; /* Adjust spacing between buttons */
            justify-content: center; /* Centering buttons */
        }

        .search {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
        }

        .search i {
            font-size: 16px;
        }

        /* Fix header overlap */
        body {
            padding-top: 60px; /* Adjust based on header height */
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>

<body>    
    <div class="landing">
        <div class="overlay"></div>
        <div class="text">
            <h1>Help us return the missing children to their families.</h1>
            <p>
                Find missing children is a humanitarian and social initiative that works
                to reunite the missing with their families.
            </p>
            <div class="search-buttons">
                <a href="search" class="search">
                    <i class="fa-solid fa-image"></i>
                    Search By Image
                </a>
                <a href="generate-image.php" class="search">
                    <i class="fa-solid fa-magic"></i>
                    Generate By Image
                </a>
            </div>
        </div>
    </div>

    <div class="recent">
        <div class="container">
            <span>Recent Cases</span>
            <div class="content">
                <?php
                $query = "SELECT * FROM `report` ORDER BY `report-data` DESC LIMIT 10";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <div class="box">
                        <a href="missing.php?id=<?= $row["id"] ?>">
                            <div class="photo">
                                <img src="uploads/<?= $row["photo"] ?>" alt="" />
                            </div>
                            <div class="text">
                                <h3>Name: <?= $row["child-name"] ?></h3>
                                <p>Date of absence: <?= $row["date"] ?></p>
                            </div>
                            <div class="type <?= $row["type"] ?>"><?= $row["type"] ?></div>
                        </a>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>

    <div class="operations">
        <h2>Operations</h2>
        <div class="container">
            <div class="person-missing option">
                <img src="images/think.png" alt="">
                <p>Missing child</p>
                <h3>To report a missing child by providing info to help find them</h3>
                <a href="missing-person.php">More</a>
            </div>
            <div class="person-found option">
                <img src="images/hug.png" alt="">
                <p>Find child</p>
                <h3>To report a person who has been found to help them return home</h3>
                <a href="found-person.php">More</a>
            </div>
            <div class="all-person option">
                <img src="images/allchildren.png" alt="">
                <p>All children</p>
                <h3>To search in the missing or found all children and filter the results</h3>
                <a href="all-people.php">More</a>
            </div>
            <div class="image-search option">
                <img src="images/search.png" alt="">
                <p>Search by image</p>
                <h3>To search by the missing child’s photo and return the result</h3>
                <a href="search_image">More</a>
            </div>
        </div>
    </div>

    <div class="contact-link">
        <div class="container">
            <a href="contact.php">Contact us</a>
            <div>
                <p>Do you have a complaint or inquiry?</p>
                <h3>Contact us and help us to return the missing to their homes</h3>
            </div>
        </div>
    </div>

    <?php include("partials/footer.php") ?>

    <script src="/public/js/main.js"></script>
    <script src="/public/js/header.js"></script>
</body>

</html>
```
The suggested code change is not relevant to the PHP file provided. It is a Node.js/Express.js code snippet and cannot be incorporated into the PHP file.
