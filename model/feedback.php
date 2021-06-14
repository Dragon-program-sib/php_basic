<?php
function getAllFeedback()
{
    $sql = "SELECT id, name, feedback FROM `feedback` ORDER BY id DESC";

    return getAssocResult($sql);
}

function addFeedBack()
{
    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";

    return getAssocResult($sql);
}

function editFeedBack()
{
    $sql = "SELECT id, name, feedback FROM `feedback` WHERE id = {$id}";

    return getAssocResult($sql);
}

function saveFeedBack()
{
    $sql = "UPDATE `feedback` SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}";

    return getAssocResult($sql);
}

function deleteFeedBack()
{
    $sql = "DELETE id, name, feedback FROM `feedback` WHERE id = {$id}";

    return getAssocResult($sql);
}

function doFeedBackAction($action)
{
    if ($_GET['action'] == "/feedback/create") {
        $name = strip_tags(htmlcpecialchars(mysqli_real_escape_string($db, $_POST['name'])));
        $feedback = strip_tags(htmlcpecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        addFeedBack();
        header('Location: /?message=ОК');
        die();
    }
    if ($_GET['action'] == "/feedback/edit") {
        $id = (int)$_GET['id'];
        $action = "/feedback/save";
        $buttonText = 'Изменить';
        editFeedBack();
        header('Location: /?message=EDIT');
        die();
    }
    if ($_GET['action'] == "/feedback/save") {
        $id = (int)$_POST['id'];
        $name = strip_tags(htmlcpecialchars(mysqli_real_escape_string($db, $_POST['name'])));
        $feedback = strip_tags(htmlcpecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
        saveFeedBack();
        header('Location: /?message=CHANGED');
        die();
    }
    if ($_GET['action'] == "/feedback/delete") {
        deleteFeedBack();
        header('Location: /?message=DEL');
        die();
    }
}

$message = [
    'OK' => 'Отзыв добавлен! Спасибо!',
    'EDIT' => 'Редактирование отзыва:',
    'CHANGED' => 'Отзыв изменён!',
    'DEL' => 'Отзыв удалён!',
];

$message = '';
$row = [];
$action = '/feedback/create';
$buttonText = 'Добавить';
