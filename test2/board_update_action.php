<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>글 수정하기</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>글 수정하기</h1>
        <?php
            //board_update_form.php에서 POST 방식으로 넘어온 값 저장 및 출력
            $board_no = $_POST["board_no"];
            $board_title = $_POST["board_title"];
            $board_content = $_POST["board_content"];
            echo "board_no : " . $board_no . "<br>";
            echo "board_title : " . $board_title . "<br>";
            echo "board_content : " . $board_content . "<br>";
            //커넥션 객체 생성 및 연결 여부 확인하기
            $conn = mysqli_connect("localhost", "root", "123456","test_db");
            if($conn) {
                echo "연결 성공<br>";
            } else {
                die("연결 실패 : " .mysqli_error());
            }
            //board 테이블의 board_no값이 일치하는 행의 board_title,board_content 값을 입력한 값으로,board_date값을 현재 시간으로 수정하는 쿼리
            $sql = "UPDATE board SET title='".$board_title."',content='".$board_content."',wdate=now() WHERE idx=".$board_no."";
            $result = mysqli_query($conn,$sql);
            //수정 작업의 성공 여부 확인하기
            if($result) {
                echo "수정 성공: ".$result; 
            } else {
                echo "수정 실패: ".mysqli_error($conn);
            }
        
            mysqli_close($conn);
            //헤더를 이용한 리다이렉션 구현
            header("Location: http://localhost/test2/board_list.php"); 
        ?>
    </body>
</html>