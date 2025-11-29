<?php
// Set upload directory
$uploadDir = __DIR__ . '/Uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $targetFile = $uploadDir . $fileName;
    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    // Allowed file types
    $allowedTypes = ['jpg', 'png', 'gif', 'pdf', 'zip', 'txt', 'php'];
    if (!in_array(strtolower($fileType), $allowedTypes)) {
        $error = "Error: File type not allowed.";
    } elseif ($file['error'] !== 0) {
        $error = "Error: File upload failed.";
    } elseif (move_uploaded_file($file['tmp_name'], $targetFile)) {
        $success = "File uploaded successfully: <a href='Uploads/$fileName'>$fileName</a>";
    } else {
        $error = "Error: Unable to upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Uploader</title>
    <style>
        body {
            background: #000000;
            color: #e0e0e0;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            background-image: radial-gradient(circle at 10% 20%, #000000 0%, #0a0a0a 90%);
        }
        .logo {
            max-width: 300px; /* Larger image size */
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        input[type="file"] {
            background: rgba(20, 20, 20, 0.9);
            color: #e0e0e0;
            border: 1px solid #444444;
            padding: 10px; /* Smaller size */
            border-radius: 6px;
            font-size: 14px; /* Smaller font size */
        }
        input[type="file"]::file-selector-button {
            background: linear-gradient(to bottom, #ff4d88, #cc0066);
            color: #fff;
            border: none;
            padding: 6px 12px; /* Smaller size */
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px; /* Smaller font size */
            text-shadow: 0 1px 1px rgba(0,0,0,0.4);
            transition: all 0.3s;
        }
        input[type="file"]::file-selector-button:hover {
            background: linear-gradient(to bottom, #ff88aa, #ff4d88);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.6);
        }
        button {
            background: linear-gradient(to bottom, #ff4d88, #cc0066);
            color: #fff;
            border: none;
            padding: 8px 16px; /* Smaller size */
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px; /* Smaller font size */
            cursor: pointer;
            text-shadow: 0 1px 1px rgba(0,0,0,0.4);
            transition: all 0.3s;
        }
        button:hover {
            background: linear-gradient(to bottom, #ff88aa, #ff4d88);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.6);
        }
        .join-button {
            margin-top: 30px;
            background: linear-gradient(to bottom, #ff4d88, #cc0066);
            color: #fff;
            border: none;
            padding: 8px 16px; /* Smaller size */
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px; /* Smaller font size */
            cursor: pointer;
            text-shadow: 0 1px 1px rgba(0,0,0,0.4);
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .join-button:hover {
            background: linear-gradient(to bottom, #ff88aa, #ff4d88);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.6);
        }
        .success {
            color: #88ff88;
            background: rgba(0, 50, 0, 0.4);
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #00aa00;
            margin-top: 15px;
            text-align: center;
        }
        .error {
            color: #ff6666;
            background: rgba(50, 0, 0, 0.4);
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #aa0000;
            margin-top: 15px;
            text-align: center;
        }
        a {
            color: #ff4d88;
            text-decoration: none;
        }
        a:hover {
            color: #ff88aa;
            text-decoration: underline;
        }
        .quotes-container {
            width: 100%;
            overflow: hidden;
            margin: 20px 0;
        }
        .quotes {
            display: flex;
            animation: slide 30s linear infinite;
            white-space: nowrap;
        }
        .quote {
            font-size: 14px; /* Small size */
            color: #ff4d88;
            margin-right: 50px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.7);
        }
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <img src="https://github.com/JamesKurayami/Eclipse666/raw/main/image/Eclipse.png" alt="Eclipse Logo" class="logo">
    <div class="quotes-container">
        <div class="quotes">
            <span class="quote">“We are not six demons, We are one demon split into six hungers.”</span>
            <span class="quote">“Hexa is the circle broken, the seal shattered, the truth revealed.”</span>
            <span class="quote">“Six voices speak, yet the silence between them is what kills.”</span>
            <span class="quote">“I wear six crowns of fire, and each burns a world to ash.”</span>
            <span class="quote">“The Hexa Demon does not bargain, It consumes both sides of the deal.”</span>
            <span class="quote">“Six wounds carved me Six powers raised me Six worlds fear me.”</span>
            <span class="quote">“Where angels kneel in threes, Demons reign in sixes.”</span>
            <span class="quote">“Hexa is not a number, It is the name your soul screams when it burns.”</span>
            <span class="quote">“Each head devours lies, Until only despair remains.”</span>
            <span class="quote">“We are the curse written six times, So it can never be erased.”</span>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
    <?php if (isset($success)): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <a href="https://t.me/HexaDemons" class="join-button">Join Our Telegram</a>
</body>
</html>