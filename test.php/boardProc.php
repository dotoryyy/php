<?
include_once 'DBconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $proc = $_POST['proc'];
    $category = $_POST['category'];

    if ($proc == 'I') {
        //저장
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        //데이터 등록
        $sql = "INSERT into board (subject, category, author, content, regDate) VALUES ('" . $subject . "', '" . $category . "', '개구리', '" . $content ."', NOW())";
        $result = $conn->query($sql);
        $conn->close();

        //목록으로 이동
        header("Location: /boardList.php");
        die();

    } 
    if ($proc == 'U') {
        //t수정
        $articleId = $_POST['articleId'];
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        //데이터 등록
        //$sql = "INSERT into board (subject, author, content, regDate) VALUES ('" . $subject ."', '개구리', '" . $content ."', NOW())";
        $sql = "UPDATE board SET subject = '" . $subject ."', category = '" . $category . "', content = '" . $content ."' Where articleId = " . $articleId;
        $result = $conn->query($sql);
        $conn->close();

        //목록으로 이동
        header("Location: /boardList.php");
        die();

    }
    else if ($proc == 'D') {
        //삭제
        $articleId = $_POST['articleId'];

        //데이터 삭제
        $sql = "DELETE FROM board WHERE articleId = " . $articleId .";";
        $result = $conn->query($sql);
        $conn->close();

        //목록으로 이동
        header("Location: /boardList.php");
        die();
        
    }else {
        echo '정상X';
    }
} 
//예외 처리
else {
    echo '정상X';
};

?>