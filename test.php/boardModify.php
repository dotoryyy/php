<?
include_once  'DBConnection.php';
$articleId = $_GET['articleId'];

//$cateList = array('TYP1', 'TYP2', 'TYP3');

// for ($i = 0; $i < count($cateList); $i++) {
//     if ($data['category'] == $cateList[$i]) {
//         echo 'selected';
//     }
// }

$cateList = array(
    'TYP1' => '공지사항',
    'TYP2' => 'FED',
    'TYP3' => 'SI'
);

print_r($data['category']);





//데이터 조회
$sql = "SELECT articleId, subject, author, content, regDate FROM board WHERE articleId = ". $articleId .";";
$result = $conn->query($sql);
$conn->close();

$data = mysqli_fetch_array($result);
?>

<form action="boardProc.php" method="post">
    <input type="hidden" name="proc" value="U">
    <input type="hidden" name="articleId" value="<?= $data['articleId']?>">
    <table>
         <tr>
            <th>글번호</th>
            <td><?= $data['articleId'] ?></td>
        </tr>
        <tr>
            <th>카테고리</th>
            <td>
                <select name="category" id="">
                 <?
                    foreach($cateList as $value => $name) {
                        // if ($data['category'] == $value) {
                        //     echo "<option value=".$value." selected>'.$name.'</option>";
                        // } else {         
                        //     echo "<option value=".$value.">'.$name.'</option>";
                        // };
                        $selected = ($data['category'] == $value ? 'selected="selected"' : '');
                        echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>' ;
                    }
                 ?>
                    <option value="TYP1" <? if ($data['category'] == 'TYP1') { echo 'selected'; } ?>>공지사항</option>
                    <option value="TYP2" <? if ($data['category'] == 'TYP2') { echo 'selected'; } ?>>FED</option>
                    <option value="TYP3" <? if ($data['category'] == 'TYP3') { echo 'selected'; } ?>>SI</option>
                </select>   
            </td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" name="subject" value="<?= $data['subject'] ?>"></td>
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
            <td><textarea name="content" id="" cols="30" rows="10"><?= $data['content'] ?></textarea></td>
        </tr>
    </table>
    <a href="boardList.php">취소</a>
    <button  type="submit">저장</button>
</form>