<!DOCTYPE html>
<html>

<head>
    <title>PHP File Uploads</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <h1>PHP File Uploads</h1>
    <form method="post" enctype="multipart/form-data" action="http://localhost/Web_QLTHUVIEN/config/process-form.php">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
        <label for="image">Image file</label>
        <input type="file" id="image" name="image">
        <button>Upload</button>
    </form>

</body>

</html>