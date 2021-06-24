<?php
function getAllFeedback()
{
    $sql = "SELECT id, name, feedback FROM `feedback` ORDER BY id DESC";

    return getAssocResult($sql);
}

function addFeedBack($name, $feedback)
{
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $name)));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $feedback)));
    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";
    executeQuery($sql);

    return mysqli_insert_id(getDb());
}

/*function editFeedBack($id_feed)
{
    $sql = "SELECT id, name, feedback FROM `feedback` WHERE id = {$id_feed}";

    return getAssocResult($sql);
}

function saveFeedBack($id_feed, $name, $feedback)
{
    $sql = "UPDATE `feedback` SET name='{$name}', feedback='{$feedback}' WHERE `feedback` . id = {$id_feed}";

    return getAssocResult($sql);;
}*/

function deleteFeedBack($id_feed)
{
    $id_feed = (int)$id_feed;
    executeQuery ("DELETE FROM `feedback` WHERE id = {$id_feed}");
}

function doFeedBackAction(&$params, $action)
{
    $params['name'] = '';
    $params['text'] = '';
    $params['buttonText'] = 'Отправить';
    $params['action'] = 'create';
    $params['id_feed'] = '';

    if ($action == "create") {
        addFeedBack($_POST['name'], $_POST['feedback']);
        header("Location: /feedback/?message=ОК");
        die();
    }
    if ($action == "edit") {
        $id_feed = (int)$_GET['id_feed'];
        $result_feedback = getAssocResult("SELECT id, name, feedback FROM `feedback` WHERE id = {$id_feed}");
        $params['name'] = $result_feedback[0]['name'];
        $params['text'] = $result_feedback[0]['feedback'];
        $params['action'] = "save";
        $params['id_feed'] = $id_feed;
        $params['buttonText'] = 'Изменить';
        $params['message'] = 'Режим редактирования отзыва - активирован.';
        //header("Location: /feedback/?message=EDIT");
    }
    if ($action == "save") {
        $id_feed = (int)$_POST['id_feedback'];
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
        executeQuery("UPDATE `feedback` SET name = '{$name}', feedback = '{$feedback}' WHERE `feedback` . id = {$id_feed}");
        header("Location: /feedback/?message=CHANGED");
        die();
    }
    if ($action == "delete") {
        deleteFeedBack($_GET['id_feed']);
        header("Location: /feedback/?message=DEL");
        die();
    }

    //if (isset($_GET['message'])) {
        //$message = $messages[$_GET['message']];
    //}

    if ($_GET['message'] == 'ОК') $params['message'] = 'Отзыв добавлен! Спасибо!';
    //if ($_GET['message'] == 'EDIT') $params['message'] = 'Режим редактирования отзыва - активирован.';
    if ($_GET['message'] == 'CHANGED') $params['message'] = 'Отзыв изменён!';
    if ($_GET['message'] == 'DEL') $params['message'] = 'Отзыв удалён!';
}

//if ($_GET['message'] == 'ОК') $params['message'] = 'Отзыв добавлен! Спасибо!';
//if ($_GET['message'] == 'EDIT') $params['message'] = 'Режим редактирования отзыва - активирован.';
//if ($_GET['message'] == 'CHANGED') $params['message'] = 'Отзыв изменён!';
//if ($_GET['message'] == 'DEL') $params['message'] = 'Отзыв удалён!';
