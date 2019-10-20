<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>게시판리스트</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>
<body>
	<h1 class="display-4">게시판 리스트</h1>
		<?php
$currentPage = 1;
if (isset($_GET["currentPage"])) { // isset() : 설정된 변수인지 확인(php4 이상부터 확인가능)
    $currentPage = $_GET["currentPage"];
}

$conn = mysqli_connect("localhost", "root", "123456", "test_db");

// 커넥션 객체 생성확인
if ($conn) {
    echo "연결 성공<br>";
} else {
    die("연결실패: " . mysqli_error()); // exit:실행테스트,중지 die:데이터베이스 연결,동작확인. 둘다 중지라는 기능은 같으나 die는 메세지를 보낸다?
}

// 테이블 내 전체행 갯수 조회
$sqlCount = "select count(*) from board";
$resultCount = mysqli_query($conn, $sqlCount);
if ($rowCount = mysqli_fetch_array($resultCount)) { // rowCount : Returns the number of rows affected by the last SQL statement
    $totalRowNum = $rowCount["count(*)"]; // 연관배열 : 인덱스를 문자열로 사용하여 그 값에 의미를 붙여 사용하는 방식.
}

// 전체행 갯수 조회 쿼리 실행 여부
if ($resultCount) {
    echo "행 갯수 조회 성공: " . $totalRowNum . "<br>";
} else {
    echo "결과 없음: " . mysqli_error($conn);
}

$rowPerPage = 5; // 페이지당 보여줄 게시물 행 갯수
$begin = ($currentPage - 1) * $rowPerPage;

// 입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라짐
$sql = "select idx,title,content,writer,wdate,view from board order by idx desc limit ".$begin." , ".$rowPerPage." ";
$result = mysqli_query($conn, $sql);

// 쿼리 조회결과 있는지ㅎ 확인
if ($result) {
    echo "조회 성공";
} else {
    echo "결과 없음: " . mysqli_error($conn);
}

?>	
		
		<table class="table table-bordered">
		<tr>
			<td>번호</td>
			<td>제목</td>
			<td>내용</td>
			<td>글쓴이</td>
			<td>작성일</td>
			<td>조회수</td>
			<td>수정</td>
			<td>삭제</td>
		</tr>
			<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
			
			<tr>
			<td>
					<?php
    echo $row["idx"];
    ?>
				</td>
			<td>
					<?php
    echo $row["title"];
    ?>
				</td>
			<td>
					<?php
					echo "<a href='/test2/board_detail.php?idx=".$row["idx"]."'>";
                    echo $row["content"];
                    echo "</a>";
    ?>
				</td>
			<td>
					<?php

    echo $row["writer"];

    ?>
				</td>
			<td>
					<?php
    echo $row["wdate"];
    ?>
				</td>
				
				<td>
					<?php
    echo $row["view"];
    ?>
				</td>
				<?php
    echo "<td><a href='/test2/board_update_form.php?idx=".$row["idx"]."'>수정</a></td>";
    echo "<td><a href='/test2/board_delete_form.php?idx=".$row["idx"]."'>삭제</a></td>";
    ?>
			</tr>
			<?php
}
?>
		</table>
		&nbsp;&nbsp;&nbsp;&nbsp;
		
		<?php
// currentPage 변수가 1보다 클때만 이전 버튼 활성화
if ($currentPage > 1) {
    // 이전 버튼이 클릭될 때 get방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함.
    echo "<a class='btn btn-primary' href='/test2/board_list.php?currentPage=".($currentPage - 1)."'>이전</a>&nbsp;&nbsp;&nbsp;&nbsp;";
}

$lastPage = ($totalRowNum - 1) / $rowPerPage;

if (($totalRowNum - 1) % $rowPerPage != 0) {
    $lastPage += 1;
}

if ($currentPage < $lastPage) {
    // 다음 버튼이 클릭될 때 get방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함.
    echo "<a class='btn btn-primary' href='/test2/board_list.php?currentPage=".($currentPage + 1)."'>다음</a>";
}
mysqli_close($conn);
?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a class="btn btn-primary" href="/test2/board_add_form.php">글쓰기</a>
	<br>
	<br>
	<br>
	<br>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
