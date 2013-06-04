<?php

$sth = $dbh->prepare('SELECT * FROM messages ORDER BY id DESC');
$sth->execute();
$messages = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($messages);
