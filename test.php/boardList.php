<?
include_once  'DBConnection.php';

//데이터 조회
$sql = "SELECT articleId, category, subject, author, regDate FROM board ORDER BY articleId DESC";
$result = $conn->query($sql);
$conn->close();

$category = $_POST['category'];
?>

<p>
<h1>숙제 : 카테고리 추가~~</h1>
<br/>
TYP1 -> 공지사항
<br/>
TYP2 -> FED
<br/>
TYP3 -> SI
<br/>1) 글 등록 시 selectbox로 카테고리 선택해서 넣을수있게
<br/>
DB엔 TYPn이 들어가고 화면에는 공지사항, ~~이 들어가야댐
<br/>
2) select 잘 했으면 그 담엔 라디오 ㅎㅎ
</p>
<table>
    <thead>
        <tr>
            <th>글번호</th>
            <th>카테고리</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
    </thead>
    <tbody>
        <?
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?=  $row['articleId'] ?></td>
            <td>
            <? if($row['category'] == 'TYP1') {
                echo '공지사항';
            } else if ($row['category'] == 'TYP2') {
                echo 'FED';
            } else if ($row['category'] == 'TYP3') {
                echo 'SI';
            } ?>
            </td>
            <td><a href="boardDetail.php?articleId=<?= $row['articleId']; ?>"><?php echo $row['subject'] ?></a></td>
            <td><?= $row['author'] ?></td>
            <td><?= $row['regDate'] ?></td>
        </tr> 
     <? 
            }
        }
     ?>
    </tbody>
</table>
<a href="boardResist.php">글쓰기</a>