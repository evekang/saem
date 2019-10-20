<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <h1 class="display-4">글 삭제하기</h1>
        <?php
            //board_list.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_GET["idx"];
            echo $board_no."번째 글 삭제 페이지<br>";
        ?>
        <!-- board_delete_action.php 페이지로 post방식을 이용하여 값 전송 -->
        <form action="board_delete_action.php" method="post">
            <table class="table table-bordered" style="width:30%">
                <tr>
                    <td>정말 삭제하시겠습니까?</td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" type="submit">삭제</button></td>
                    <td><a class="btn btn-primary" href="board_list.php">취소</a></td>
                </tr>

            </table>
        </form>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>