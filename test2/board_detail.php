<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>상세보기</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
		  
		</style>
	</head>
	<body>
		<h1 class="display-4">상세보기</h1>
		<?php 
		      $conn = mysqli_connect("localhost","root","123456","test_db");
		      if($conn){
		          echo "연결 성공<br>";
		      }else {
		          die("연결 실패: ".mysqli_error());
		      }
		      
		      //board_list.php에서 넘어온 글 번호 저장 및 출력
		      $board_no = $_GET["idx"];
		      echo $board_no."번 째 글 내용<br>";
		      $sql = "select idx,title,content,writer,wdate,view from board where idx ='".$board_no."'";
		      $result = mysqli_query($conn, $sql);
		      
		      if($result){
		          echo "조회 성공";
		      }else{
		          echo "결과 없음: ".mysqli_error($conn);
		      }
		?>
		
		<table class="table table-bordered" style="width:50%">
			<?php 
			     //result 변수에 담긴 값을 row 변수에 저장해서 테이블 출력
			if($row = mysqli_fetch_array($result)){
			?>
			<tr>
				<td style="width:15%">작성자</td>
				<td style="width:35%">
					<?php 
					       echo $row["writer"];
					?>
				</td>
			</tr>
			<tr>
				<td style="width:10%">글 제목</td>
				<td style="width:15%">
					<?php 
					       echo $row["title"];
					?>
				</td>
				<td style="width:5%">글 번호</td>
				<td style="width:3%">
					<?php 
					       echo $row["idx"];
					?>			
				</td>
				<td style="width:5%">작성일자</td>
				<td style="width:3%">
					<?php 
					       echo $row["wdate"];
					?>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<?php 
					       echo $row["content"];
					?>
				</td>
			</tr>
			<?php 
			}
			?>		
		</table>	
		<br>
		&nbsp;&nbsp;&nbsp;
		<a class="btn btn-primary" href="board_list.php">목록 보기</a>
		<script type="text/javascript" src=js/bootstrap.js></script>		
	</body>
</html>

