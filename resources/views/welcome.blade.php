<!DOCTYPE html>
<html >

<head>
    <title>과일 가격 조회</title>

    <link href="../css/fruit.css" rel="stylesheet" type="text/css">

</head>

  <body>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">포스타입 과일가게</div>
        <div class="card-body">
          <form method="POST" action="">
				@csrf
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail"></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword"></label>
              </div>
            </div>
        
            <button type="submit">조회하기</button>
          </form>
        </div>
      </div>
    </div>

  </body>