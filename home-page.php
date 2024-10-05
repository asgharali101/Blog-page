<?php

require_once './blog-page.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

    <!-- Main Content Wrapper (Centered Div) -->
    <div class="w-full max-w-4xl p-8 bg-gray-800 rounded-lg shadow-xl">

        <!-- Navigation (Login/Logout Buttons) -->
        <div class="flex justify-between mb-6">
            <?php if (isset($_SESSION['is_logged_in']) === false) { ?>
            <a href="./login-page.php?login=<?php ?>" class="text-center text-white px-6 py-2 text-2xl bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-300">
                Login
            </a>
            <?php } else { ?>
            <a href="./logout-page.php?logout=<?php ?>" class="text-center text-white px-6 py-2 text-2xl bg-red-500 rounded-lg hover:bg-red-600 transition duration-300">
                Logout
            </a>
            <?php } ?>
        </div>

        <!-- Blog Posts Loop -->
        <div class="space-y-8">
            <?php
            foreach ($_SESSION['blogs'] as $key => $blog) {
                if (isset($blog['publish_date'])) {
                    $totalTime = strtotime($blog['publish_date']);
                    $formatedTime = date('F d, Y', $totalTime);
                } else {
                    continue;
                }
                ?>
            <div class="p-6 bg-gray-700 rounded-lg shadow-md">
                <!-- Date -->
                <h3 class="text-lg font-semibold text-gray-300 mb-2"><?php echo $formatedTime; ?></h3>
                <!-- Title -->
                <h2 class="text-2xl font-bold text-white mb-4"><?php echo $blog['title']; ?></h2>
                <!-- Description -->
                <p class="text-gray-200 mb-4"><?php echo $blog['description']; ?></p>
                <?php if (isset($_SESSION['is_logged_in']) === true) { ?>
                <!-- Edit and Delete Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="edit-page.php?index=<?php echo $key; ?>" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                        Edit
                    </a>
                    <a href="delete-page.php?id=<?php echo $key ?>" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300">
                        Delete
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

    </div>

</body>
</html>
