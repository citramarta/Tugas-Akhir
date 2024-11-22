<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews - Cimyww Bakery</title>
    <link href="https://fonts.googleapis.com/css2?family=Sitka+Small&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body id="review-page">

    <!-- Header Menu -->
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="review.php">Review</a>
            <a href="https://wa.me/62895383330084" target="_blank">Kontak</a>
            <a href="Lokasi.php">Lokasi</a>
        </nav>
    </header>

    <!-- Bagian Review -->
    <section id="review" class="review">
        <div class="review-header">
            <h2>Customer Reviews</h2>
        </div>
        
        <div class="review-container">
            <?php
                function displayReviews($reviews) {
                    foreach ($reviews as $review) {
                        echo '<div class="review-card">';
                        echo '<div class="review-avatar">';
                        echo '<img src="' . $review['avatar'] . '" alt="' . $review['name'] . '">';
                        echo '</div>';
                        echo '<div class="review-content">';
                        echo '<h3>' . $review['name'] . '</h3>';
                        echo '<p class="username">' . $review['username'] . '</p>';
                        echo '<div class="stars">';
                        for ($i = 0; $i < $review['rating']; $i++) {
                            echo '<span>⭐</span>';
                        }
                        echo '</div>';
                        echo '<p class="review-text">' . $review['content'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }

                // Data review
                $reviews = [
                    [
                        "name" => "Hwang In Youp",
                        "username" => "@hi_high_hiy",
                        "rating" => 5,
                        "content" => "Double layer cheese cake itu selalu inget saya pas launching pertama kue ini...",
                        "avatar" => "images/hwang.jpg"
                    ],
                    [
                        "name" => "Byeon Woo Seok",
                        "username" => "@Woo Seok Byeon",
                        "rating" => 5,
                        "content" => "My cake favorite Blueberry Cheesecake...",
                        "avatar" => "images/byeon.jpg"
                    ],
                    [
                        "name" => "Kim Hye-yoon",
                        "username" => "@hye_yoon1110",
                        "rating" => 5,
                        "content" => "Suka cake nya dong... yg triple cake choco...",
                        "avatar" => "images/kim hye.jpg"
                    ],
                    [
                        "name" => "IU",
                        "username" => "@dlwlrma",
                        "rating" => 5,
                        "content" => "My cake favorite Blueberry Cheesecake...",
                        "avatar" => "images/iu.jpg"
                    ],
                    [
                        "name" => "Songkang",
                        "username" => "@songkang_b",
                        "rating" => 5,
                        "content" => "My cake favorite Blueberry Cheesecake...",
                        "avatar" => "images/songkang.jpg"
                    ],
                ];

                // Panggil fungsi 
                displayReviews($reviews);
            ?>
        </div>
    </section>

    
    <!-- Copyright -->
    <footer>
        <div class="footer-bottom">
            <p>© 2024 Cimyww Bakery. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
