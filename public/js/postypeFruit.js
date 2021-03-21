
//과일, 야채 선택 및 리스트 불러오기
$('#product_kind').on('change', function(){

    var product_kind = $(this).val();

    $.ajax({
        url: "/get_kind_info",
        type: "get",
        data: {product_kind : product_kind},
        dataType: 'JSON',
        success: function (data) {

            $("#tbody").children().remove();

            var list = data['original'];
            var trans = "";

            if(product_kind == "fruit"){
                trans = "과일";
            }else{
                trans = "야채";
            }

            var str = '<tr><td> '+trans+'목록 </td></tr>';

            for (var item in list) {
                str +='<tr><td> '+list[item]+' </td></tr>';
              }

            $("#tbody").append(str);
            $(".card-body-table").css("display","table");
        }
    })
});

//가격 조회
function getPriceInfo(){

    var product_kind = $("#product_kind").val();
    var product_name = $("#product_name").val();
    if(product_name ==""){
        alert("물품 이름을 입력해주세요.");
        return;
    }
    $.ajax({
        url: "/get_price_info",
        type: "get",
        data: {product_kind : product_kind, product_name : product_name},
        dataType: 'JSON',
        success: function (data) {

            $("#price_result").html("");
            var str = "";
           
            if(data['http_status'] !== 200){
                
                str = "해당 물품은 리스트에 없습니다.";
            }else{
                var price = data['array_res']['price'];
                str = "검색하신 "+product_name+"의 가격은 "+ price+"원 입니다.";
            }
           
            $("#price_result").html(str);
            $("#product_name").val("");
            $("#product_kind option:eq(0)").prop("selected", true);

        }
    })
}

function enterButton(){
    if (window.event.keyCode == 13) {
        getPriceInfo();
    }
}







