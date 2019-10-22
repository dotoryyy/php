<?
include_once  'DBConnection.php';
$articleId = $_GET['articleId'];

//데이터 조회
$sql = "SELECT articleId, category, subject, author, content, regDate FROM board WHERE articleId = ". $articleId .";";
$result = $conn->query($sql);
$conn->close();

$data = mysqli_fetch_array($result);
?>

<form action="boardProc.php" method="post">
    <input type="hidden" name="articleId" value="<?= $data['articleId'] ?>">
    <input type="hidden" name="proc" value="D">
    <table>
        <tr>
            <th>글번호</th>
            <td><?= $data['articleId'] ?></td>
        </tr>
        <tr>
            <th>카테고리</th>
            <td>
            <? if($data['category'] == 'TYP1') {
                echo '공지사항';
            } else if ($data['category'] == 'TYP2') {
                echo 'FED';
            } else if ($data['category'] == 'TYP3') {
                echo 'SI';
            } ?>
            </td>
        </tr>
        <tr>
            <th>제목</th>
            <td><?= $data['subject'] ?></td>
        </tr>
        <tr>
            <th>작성자</th>
            <td><?=  $data['author'] ?></td>
        </tr>
        <tr>
            <th>작성일</th>
            <td><?= $data['regDate'] ?></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><?= $data['content'] ?></td>
        </tr>
    </table>
    <a href="boardList.php">목록</a>
    <button  type="submit">삭제</button>
    <a href="boardModify.php?articleId=<?= $data['articleId'] ?>">수정</a>
</form>