<?php
$name = $email = $phone = $address = $skills = $education = $experience = "";
$targetFile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $address = $_POST['address'] ?? "";
    $skills = $_POST['skills'] ?? "";
    $education = $_POST['education'] ?? "";
    $experience = $_POST['experience'] ?? "";

    // File upload
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["profile"]["name"]);
        $targetFile = $targetDir . $fileName;

        move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your CV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cv-container">

    <div class="left">
        <img src="<?php echo $targetFile; ?>" class="profile">
        <h2><?php echo $name; ?></h2>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
        <p><?php echo $address; ?></p>
    </div>

    <div class="right">
        <h3>Skills</h3>
        <p><?php echo nl2br($skills); ?></p>

        <h3>Education</h3>
        <p><?php echo nl2br($education); ?></p>

        <h3>Experience</h3>
        <p><?php echo nl2br($experience); ?></p>
    </div>

</div>

</body>
</html>