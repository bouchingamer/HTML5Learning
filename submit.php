
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        exit("Please fill in every field.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Please enter a valid email address.");
    }

    echo "<h1>Form submitted successfully!</h1>";
    echo "<p>Thank you, " . htmlspecialchars($name, ENT_QUOTES, "UTF-8") . "!</p>";
    echo "<p>Your email: " . htmlspecialchars($email, ENT_QUOTES, "UTF-8") . "</p>";
    echo "<h2>Your message</h2>";
    echo "<p>" . nl2br(htmlspecialchars($message, ENT_QUOTES, "UTF-8")) . "</p>";
} else {
    http_response_code(405);
    echo "Please submit the form using POST.";
}
?>
<forms></forms>