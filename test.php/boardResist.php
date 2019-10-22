<form action="boardProc.php" method="post">
    <input type="hidden" name="proc" value="I">
    <table>
        <tr>
            <th>제목</th>
            <td><input type="text" name="subject" value=""></td>
        </tr>
        <tr>
            <th>카테고리</th>
            <td>
                <select name="category" id="">
                    <option value="TYP1">공지사항</option>
                    <option value="TYP2">FED</option>
                    <option value="TYP3">SI</option>
                </select>            
            </td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
    <a href="boardList.php">취소</a>
    <button type="submit">저장</button>
</form>