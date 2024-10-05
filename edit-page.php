<?php
require_once './blog-page.php';

$currentPost = $_SESSION['blogs'][$_GET['index']];
$form_error = false;
if (isset($_GET['title'])) {
    $indexValue = $_GET['index'];
    $_SESSION['blogs'][$indexValue] = $_GET;
    header('location:./home-page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

<?php if (isset($_SESSION['is_logged_in']) === true) { ?>

<!-- Edit Post Form (Centered) -->
<div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-3xl">
    <h1 class="text-3xl font-bold text-white mb-6">Edit Post</h1>
    
    <form>
        <!-- Title Input -->
        <div class="mb-4">
            <label class="block text-gray-300 mb-2" for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" required value="<?php echo $currentPost['title'] ?? ''; ?>" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Error Message -->
        <?php if (isset($tittle_error)) { ?>
            <h2 class="text-red-500 text-lg mb-4"><?php echo $tittle_error; ?></h2>
        <?php } ?>
        
        <!-- Description Textarea -->
        <div class="mb-4">
            <label class="block text-gray-300 mb-2" for="description">Description</label>
            <textarea id="description" name="description" placeholder="Description" required class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 h-32"><?php echo $currentPost['description'] ?? ''; ?></textarea>
        </div>

        <!-- Publish Date Input -->
        <div class="mb-4">
            <label class="block text-gray-300 mb-2" for="publish_date">Publish Date</label>
            <input type="date" id="publish_date" name="publish_date" value="<?php echo $currentPost['publish_date'] ?? ''; ?>" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Hidden Input for Index -->
        <input type="hidden" name="index" value="<?php echo $_GET['index']; ?>">

        <!-- Submit Button -->
        <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
            Save Post
        </button>
    </form>
</div>

<?php } else { ?>
  <!-- Unauthorized User Message -->
  <h2 class="text-red-500 text-3xl text-center">You are not an authorized user</h2>
<?php } ?>

</body>
</html>
