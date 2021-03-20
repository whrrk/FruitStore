
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
        }
    })
});

//가격 조회
function get_price_info(){

    var product_kind = $("#product_kind").val();
    var product_name = $("#product_name").val();
    console.log(product_name);
    $.ajax({
        url: "/get_price_info",
        type: "get",
        data: {product_kind : product_kind, product_name : product_name},
        dataType: 'JSON',
        success: function (data) {
            console.log("성공??");
            console.log(data);
        }
    })
}








