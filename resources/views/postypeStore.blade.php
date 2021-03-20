<!DOCTYPE html>
<html >

<head>
    <title>과일 가격 조회</title>

    <link rel="stylesheet" type="text/css" href="{{asset('/css/postypeFruit.css')}}"></link>
</head>

  <body>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">포스타입 과일가게</div>
        <div class="card-body">

            <div class="form-group">
              <div class="form-label-group">
                <select id="product_kind">
                  <option default>선택하세요</option>
                  <option value="fruit">과일</option>
                  <option value="vegetable">채소</option>
                </select>
              </div>
            </div>
            <input type="text" id="product_name">
            <button type="button" onClick="get_price_info()">조회하기</button>

        </div>
        <div class="card-body">
        <table>
          <tbody id="tbody">

          </tbody>
        </table>
        </div>
      </div>
    </div>

  </body>


  <script src="https://code.jquery.com/jquery-3.6.0.js"
          integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
          crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('js/postypeFruit.js') }}"></script>