<?php

$title = trim($message->title) != '' ? $message->title : NULL;
$content = trim($message->content) != '' ? $message->content : NULL;

if($title == NULL || $content == NULL) 
	throw new Exception('Please define a title and a content');

$dbh->beginTransaction();
$sth = $dbh->prepare('INSERT INTO messages (title, content) VALUES (:title, :content)');
$sth->execute(array(
	':title' => $title,
	':content' => $content
));
$message->id = $dbh->lastInsertId(); 
$dbh->commit();

echo json_encode($message);
