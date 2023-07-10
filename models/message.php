<?php
function message_model_list() {
    require_once(CONNEX_DIR);

    $sql = "select forum.id as mesID, user_name, title, article, date, userId from forum inner join user on userId=user.id order by date;";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connex);
    return $result;
}

function message_model_insert($request) {
    require_once(CONNEX_DIR);
    
    session_start();
   
    $title = $request['title'];
    $article = $request['article'];
    
    $name_id_session = $_SESSION['id'];
    $currentDate = date("Y-m-d");
    $sql = "INSERT INTO forum (title, article, date, userId) VALUES ('$title', '$article', ' $currentDate', '$name_id_session');";
    $result = mysqli_query($connex, $sql);

    mysqli_close($connex);
}

function message_model_show($request) {
    require (CONNEX_DIR);
 
    $id = mysqli_real_escape_string($connex, $request['id']);
    $sql = "SELECT * FROM forum WHERE forum.id = '$id'";//a changer

    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($connex);
    
    return $result;
}


function message_model_update($request) {
    require(CONNEX_DIR);

    foreach($request as $key=> $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE forum SET title = '$title', article = '$article' WHERE forum.id = '$id' ";
    $result = mysqli_query($connex, $sql);

    mysqli_close($connex);
}

function message_model_delete($request) {
    require(CONNEX_DIR);
    $userId = mysqli_real_escape_string($connex, $_POST['userId']);
    session_start();
    $idSession = $_SESSION['id'];

    if ($idSession !== $userId) {
        header("Location: ?module=message&action=index&msg=1");
        die();
    }

    foreach($request as $key=> $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }

   


    $sql = "DELETE FROM forum WHERE forum.id = '$id';";
    $result = mysqli_query($connex, $sql);

    mysqli_close($connex);
}

?>