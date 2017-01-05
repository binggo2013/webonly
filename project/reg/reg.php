<?php
session_start();
sleep(3);
include 'Transfer.class.php';
    $t=new Transfer(array("fieldName"=>'pic'));
    //上传文件成功
    if($t->upload()){
        $pdo=new PDO("mysql:host=localhost;dbname=kong","root","");
        $sql="insert into user(
            username,
            pwd,
            email,
            pic,
            regTime
        )values(
            '".$_POST['username']."',
            '".md5($_POST['pwd'])."',
            '".$_POST['email']."',
            '".$_FILES['pic']['name']."',
            now()
        )";
        //echo $sql;
        //执行sql语句，返回$result
        //ok,返回的是数字
        //failed：0；
        $result=$pdo->exec($sql);
        if($result){
            echo "ok";
        }else{
            echo "failed";
        }
    }else{
        echo $t->getError();
    }


?>