<?php

$name = "Bobbie Teriba";
$email = "bobbieteriba@gmail.com";
$artist = "Kendrick Lamar";
$album = "Good Kid, MAAD City";
$subject = "Backstage";

$comment = "Your payment is confirmed." . "\r\n"
        . "For " . $artist . "'s album : " . $album . "\r\n"
        . " Thank you for your order.";

$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=iso-8859-1";
$headers[] = "To: $name <$email>";
$headers[] = "From: Backstage <D00197875@student.dkit.ie>";
$headers[] = "Cc: D00197875@student.dkit.ie";
$headers[] = "Bcc: D00197875@student.dkit.ie";

mail($email, $subject, $comment, implode("\r\n", $headers));
