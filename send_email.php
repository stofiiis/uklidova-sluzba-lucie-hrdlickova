<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ochrana proti XSS
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Získání hodnot z formuláře
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $service = clean_input($_POST['service']);
    $message = clean_input($_POST['message']);

    // Kontrola, zda jsou pole vyplněná
    if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Vyplňte všechna pole."]);
        exit;
    }

    // Validace e-mailu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Neplatná e-mailová adresa."]);
        exit;
    }

    // ✅ E-MAIL SPRÁVCE (Tobě)
    $to_admin = "krystof.linhart1@gmail.com"; // Tvůj e-mail
    $subject_admin = "Nová poptávka od $name";

    $body_admin = "Máte novou poptávku:\n\n";
    $body_admin .= "Jméno: $name\n";
    $body_admin .= "Email: $email\n";
    $body_admin .= "Telefon: $phone\n";
    $body_admin .= "Služba: $service\n";
    $body_admin .= "Zpráva: $message\n";

    // ✅ Nastavení hlaviček – ODESÍLATEL JE TVŮJ E-MAIL
    $headers_admin = "From: Úklidová služba <noreply@uklidovkahrdlickova.com>\r\n";
    $headers_admin .= "Reply-To: $email\r\n";  // Pokud odpovíš, půjde odpověď klientovi
    $headers_admin .= "Return-Path: noreply@uklidovkahrdlickova.com\r\n"; // Pro správné doručování
    $headers_admin .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Odeslání e-mailu správci
    $email_sent_to_admin = mail($to_admin, $subject_admin, $body_admin, $headers_admin);

    // ✅ E-MAIL KLIENTOVI (Rekapitulace)
    $to_client = $email; // E-mail klienta
    $subject_client = "Potvrzení poptávky - Úklidová služba";

    $body_client = "Dobrý den, $name,\n\n";
    $body_client .= "Děkujeme za vaši poptávku! Rekapitulace vašeho požadavku:\n\n";
    $body_client .= "📞 Telefon: $phone\n";
    $body_client .= "📌 Služba: $service\n";
    $body_client .= "📝 Zpráva: $message\n\n";
    $body_client .= "Brzy se vám ozveme.\n\nS pozdravem,\nTým Úklidová služba";

    $headers_client = "From: Úklidová služba <info@uklidovkahrdlickova.com>\r\n";
    $headers_client .= "Reply-To: info@uklidovkahrdlickova.com\r\n";
    $headers_client .= "Return-Path: info@uklidovkahrdlickova.com\r\n";
    $headers_client .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Odeslání e-mailu klientovi
    $email_sent_to_client = mail($to_client, $subject_client, $body_client, $headers_client);

    // Kontrola, zda byly e-maily odeslány
    if ($email_sent_to_admin && $email_sent_to_client) {
        echo json_encode(["status" => "success", "message" => "Děkujeme za vaši poptávku! Rekapitulaci jsme vám zaslali na e-mail."]);
    } else {
        echo json_encode(["status" => "error", "message" => "E-mail nebyl úspěšně odeslán. Zkuste to prosím znovu."]);
    }
}
?>
