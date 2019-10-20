<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>글 삭제페이지</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>       
    </head>
    <body>
        <h1>게시글 삭제</h1>
        <?php
            //board_delete_form.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_POST["board_no"];

            echo "board_no : " . $board_no . "<br>";

            //mysql 커넥션 객체 생성
            $conn = mysqli_connect("localhost", "root", "123456","test_db");
            //커넥션 객체 생성 여부 확인
            if($conn) {
                echo "연결 성공<br>";
            } else {
                die("연결 실패 : " .mysqli_connect_error());
            }
            //board테이블에서 입력된 글 번호와, 글 비밀번호가 일치하는 행 삭제 쿼리
            $sql = "DELETE FROM board WHERE idx=".$board_no."";
            //쿼리 실행 여부 확인
            if(mysqli_query($conn,$sql)) {
                echo "삭제 성공: ".$result; //과제 작성시 에러메시지 출력하게 만들기
            } else {
                echo "삭제 실패: ".mysqli_error($conn);
            }
        
            mysqli_close($conn);
            //헤더함수를 이용하여 리스트 페이지로 리다이렉션
            header("Location: http://localhost/test2/board_list.php");
        ?>
    </body>
</html>