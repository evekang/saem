<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>게시글 작성</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1 class="display-4">글 작성하기</h1>
		<!-- board_add_action.php로 넘기는 폼양식 -->
		<form class="form-horizontal" action="board_add_action.php" method="post">
<!-- 			<div class="form-group"> -->
<!-- 				<label for="exampleInputPassword" class="col-sm-2 control-label">: </label> -->
<!-- 				<div class="col-sm-10"> -->
					<!-- 비밀번호 입력상자 -->
<!-- 					<input class="form-control" name="boardPW" id="password" type="password" placeholder="비밀번호를 입력하세요." /> -->
<!-- 				</div> -->
<!-- 			</div> -->
			<div class="form-group">
				<label for="exampleInputTitle" class="col-sm-2 control-label">글 제목 : </label>
				<div class="col-sm-10">
					<!-- 글 제목 입력상자 -->
					<input class="form-control" name="boardTitle" id="title" type="text" placeholder="제목을 입력하세요." />
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputContent" class="col-sm-2 control-label">글 내용 : </label>
				<div class="col-sm-10">
					<!-- 글 내용 입력 textarea -->
					<textarea class="form-control" name="boardContent" id="content" rows="5" cols="50" placeholder="내용을 입력하세요."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputName" class="col-sm-2 control-label">작성자명 : </label>
				<div class="col-sm-10">
					<!-- 작성자명 입력상자 -->
					<input class="form-control" name="writer" id="name" type="text" placeholder="이름을 입력하세요." />
				</div>
			</div>
			<div>
				&nbsp;&nbsp;&nbsp;
				<!-- 글입력버튼 -->
				<button class="btn btn-primary" type="submit" value="글 입력" >글 입력</button>
				&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary" type="reset" value="초기화">초기화</button>
				&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary" href="/test2/board_list.php">목록보기</a>
			</div>
		</form>
		
		<script type="text/javascript">
			//id가 xx인 객체에 변화가 생기면 checkXX함수를 변화된 객체의 값을 매개로 호출한다.
			$("#password").change(function(){
				checkPassword($('#password').val());
			});
			$("#title").change(function(){
				checkTitle($('#title').val());
			});
			$("#content").change(function(){
				checkContent($('#content').val());
			});
			$("#name").change(function(){
				checkName('#name').val();
			});

			//입력된 변수 길이를 참고하여 조건문으로 최소입력길이 유효성 검사
			function checkPassword(password){
				if(password.length < 4){
					alert("비밀번호는 최소 4자 이상 입력해야 합니다.");
					$('#password').val('').focus();
					return false;
				}else{
					return true;
				}
			}

			function checkTitle(title){
				if(title.length < 2) {
					alert("제목은 2자 이상 입력해야 합니다.");
					$('#title').val('').focus();
					return false;
				}else{
					return true;
				}
			}

			function checkContent(content){
				if(content.length < 2){
					alert("내용은 2자 이상 입력해야 합니다.");
					$('#content').val('').focus();
					return false;
				}else{
					return true;
				}
			}

			function chechName(name){
				if(name.length < 2){
					alert("작성자 명은 2자리 이상 입력해야 합니다.");
					$('#name').val('').focus();
					return false;
				}else{
					return true;
				}
			}
		</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	
	</body>
</html>
