<!doctype html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
	<body>
		<h1>글 등록페이지</h1>
		<?php 
		      //board_add_form.php에서 넘어온 글 번호값 저장 및 출력

		$board_title = $_POST["boardTitle"];
		$board_content = $_POST["boardContent"];
		$board_user = $_POST["writer"];
		$date = date('Y-m-d');
		$view = 0;
		
		echo "boardTitle: " . $board_title . "<br>";
		echo "boardContent: " . $board_content . "<br>";
		echo "writer: " . $board_user . "<br>";
		echo "view:".$view;
		
		$conn = mysqli_connect("localhost","root","123456","test_db");
		if($conn){
		    echo "연결 성공<br>";
		}else{
		    die("연결 실패: ".mysqli_error());
		}
		


		//board 테이블에 입력된 값을 1행에 넣고, wdate 필드에 현재시간을 입력
		$sql = "insert into board (title,content,writer,wdate,view) values ('".$board_title."','".$board_content."','".$board_user."','".$date."','".$view."')";
		$result = mysqli_query($conn, $sql);
		
		if($result){
		    echo "입력 성공: ".$result;
		}else{
		    echo "입력 실패: ".mysqli_error($conn);
		}
		mysqli_close($conn);
		header("location: http://localhost/test2/board_list.php"); //헤더 함수로 리다이렉션
		?>
	</body>
	<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>