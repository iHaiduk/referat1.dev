<?php
$subject = 'Комментарий к сайту | ' . $_SERVER['SERVER_NAME'];

$message = '<!DOCTYPE html>
                <html lang="en">
                    <body>
                    <h3>Обратная связь</h3>
                    <div style="position:relative;margin:15px 0;padding:10px;background-color:#fff;border:1px solid #ddd;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px">
                    <blockquote style="{padding:0 0 0 15px;margin:0 0 20px;border-left:5px solid #eee">
                      <p style="margin-bottom:0;font-size:17.5px;font-weight:300;line-height:1.25">'.$_POST["message"].'</p>
                      <small style="display:block;line-height:20px;color:#999">'.$_POST["name"].'</cite></small>
                    </blockquote>
                  </div>
                  </body>
                </html>';


$headers = "From: " . $_SERVER['SERVER_NAME'] . "\r\n";
$headers .= "Reply-To: ". strip_tags($email_to) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if(mail($email_to, $subject, $message, $headers))
    echo json_encode(array('success' => true));
else
    echo json_encode(array('success' => false));


$headers = "From: " . $_SERVER['SERVER_NAME'] . "\r\n";
$headers .= "Reply-To: ". strip_tags($email_to) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if(mail($email_to, $subject, $message, $headers))
    echo json_encode(array('success' => true));
else
    echo json_encode(array('success' => false));