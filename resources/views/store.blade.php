<!DOCTYPE html>
<html >

<head>
    <title>과일 가격 조회</title>

    <link rel="stylesheet" type="text/css" href="{{asset('/css/FruitVege.css')}}"></link>
</head>

  <body>

    <div class="container">

        <div class="card-header"><h2>상품 가격 조회</h2></div>
        <div class="card-body">
            <div class="form-group">
              <div class="form-label-group">
                <select class="select_input" id="product_kind">
                  <option value="default" default>선택하세요</option>
                  <option value="fruit">과일</option>
                  <option value="vegetable">채소</option>
                </select>
              </div>
            </div>
            <input type="text" class="select_input" id="product_name" onkeyup="enterButton()" placeholder="품목 이름을 입력하세요.">
            <button type="button" onClick="getPriceInfo()">조회하기</button>
            <div>
              <span id="price_result"></span>
            </div>
        </div>
        <div class="card-body">
          <table class="card-body-table">
            <tbody id="tbody">

            </tbody>
          </table>
        </div>

    </div>

  </body>


  <script src="https://code.jquery.com/jquery-3.6.0.js"
          integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
          crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('js/FruitVege.js') }}"></script>