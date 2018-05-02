$('.spinner').spinner({ min: 0});



$('#spinner_1').spinner('option', 'min', 0);
$('#spinner_1').spinner('option', 'max', 3);
$('#spinner_1').spinner('option', 'step', 3);

$('#spinner_2').spinner('option', 'min', 0);
$('#spinner_2').spinner('option', 'max', 5);
$('#spinner_2').spinner('option', 'step', 5);

$('#spinner_3').spinner('option', 'min', 0);
$('#spinner_3').spinner('option', 'max', 5);
$('#spinner_3').spinner('option', 'step', 5);

$('#spinner_4').spinner('option', 'min', 0);
// $('#spinner_4').spinner('option', 'max', 3);
$('#spinner_4').spinner('option', 'step', 2);

$('#spinner_5').spinner('option', 'min', 0);
// $('#spinner_5').spinner('option', 'max', 3);
$('#spinner_5').spinner('option', 'step', 5);

$('#spinner_6').spinner('option', 'min', 0);
$('#spinner_6').spinner('option', 'max', 2);
$('#spinner_6').spinner('option', 'step', 2);

$('#spinner_7').spinner('option', 'min', 0);
// $('#spinner_7').spinner('option', 'max', 5);
$('#spinner_7').spinner('option', 'step', 5);

$('#spinner_8').spinner('option', 'min', 0);
// $('#spinner_8').spinner('option', 'max', 3);
$('#spinner_8').spinner('option', 'step', 5);

$('#spinner_9').spinner('option', 'min', 0);
$('#spinner_9').spinner('option', 'max', 5);
$('#spinner_9').spinner('option', 'step', 5);

$('#spinner_10').spinner('option', 'min', 0);
// $('#spinner_11').spinner('option', 'max', 3);
$('#spinner_10').spinner('option', 'step', 10);

$('#spinner_11').spinner('option', 'min', 0);
$('#spinner_11').spinner('option', 'max', 10);
$('#spinner_11').spinner('option', 'step', 10);

$('#spinner_12').spinner('option', 'min', 0);
// $('#spinner_12').spinner('option', 'max', 2);
$('#spinner_12').spinner('option', 'step', 2);

$('#spinner_13').spinner('option', 'min', 0);
// $('#spinner_13').spinner('option', 'max', 3);
$('#spinner_13').spinner('option', 'step', 2);

$('#spinner_14').spinner('option', 'min', 0);
// $('#spinner_14').spinner('option', 'max', 3);
$('#spinner_14').spinner('option', 'step', 5);

$('#spinner_15').spinner('option', 'min', 0);
// $('#spinner_15').spinner('option', 'max', 3);
$('#spinner_15').spinner('option', 'step', 5);

$('#spinner_16').spinner('option', 'min', 0);
$('#spinner_16').spinner('option', 'max', 10);
$('#spinner_16').spinner('option', 'step', 10);

$('#spinner_17').spinner('option', 'min', 0);
$('#spinner_17').spinner('option', 'max', 10);
$('#spinner_17').spinner('option', 'step', 10);

$('#spinner_18').spinner('option', 'min', 0);
// $('#spinner_18').spinner('option', 'max', 3);
$('#spinner_18').spinner('option', 'step', 5);

$('#spinner_19').spinner('option', 'min', 0);
// $('#spinner_19').spinner('option', 'max', 3);
$('#spinner_19').spinner('option', 'step', 5);

$('#spinner_20').spinner('option', 'min', 0);
$('#spinner_20').spinner('option', 'max', 5);
$('#spinner_20').spinner('option', 'step', 5);

$('#spinner_21').spinner('option', 'min', 0);
$('#spinner_21').spinner('option', 'max', 5);
$('#spinner_21').spinner('option', 'step', 5);

$('#spinner_22').spinner('option', 'min', 0);
$('#spinner_22').spinner('option', 'max', 10);
$('#spinner_22').spinner('option', 'step', 10);



$(".spinner").bind("keydown", function (event) {
    event.preventDefault();
});

$( ".spinner" ).on( "spinstop", function( event, ui ) {
    // console.log("sd");
    // $(".spinner").spinner({change: function() {
        update_view();
} );

$("input[type='checkbox']").change(function() {
    update_view();
});
function sum_value(params) {
    var sum = 0;
        $(params).each(function(){
        sum += parseFloat(this.value);  // Or this.innerHTML, this.innerText
    });
    return sum;
}

function sum_text(params) {
    var sum = 0;
        $(params).each(function(){
        sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    });
    return sum;
}

function sum_checkbox(params) {
    var sum = 0;
        $(params).each(function(){
            if(this.checked) {
                //Do stuff
                sum += parseFloat(this.value);
            }
          // Or this.innerHTML, this.innerText
    });
    return sum;
}

function update_view() {

    // update muc 1
    var sum_m1 = sum_value('.m1');
    sum_m1 = 30-sum_m1;
    if(sum_m1 <=0 ) sum_m1 = 0; 
    $("#m_sum1").text(sum_m1);
    var sum_1 = sum_m1 - 0.25*sum_m1*sum_checkbox('.cb1');
    if(sum_1 <= 0) sum_1 = 0;
    $('#sum_1').text(sum_1);

    //update muc 2
    var sum_m2 = sum_value('.m2');
    sum_m2 = 25-sum_m2;
    if(sum_m2 <=0 ) sum_m2 = 0;
    $("#m_sum2").text(sum_m2);
    var sum_2 = sum_m2 - 0.25*sum_m2*sum_checkbox('.cb2');
    if(sum_2 <= 0) sum_2 = 0;
    $('#sum_2').text(sum_2);

    // update muc 3
    var sum_3 = sum_value('.m3');
    sum_3 = sum_3 - sum_value('.m_3');
    if(sum_3 <=0 ) sum_3 = 0;
    if(sum_3 >=20 ) sum_3 = 20;
    $("#sum_3").text(sum_3);

    // update muc 4
    var sum_4 = 15 - sum_value('.m_4');
    // sum_3 = sum_3 - sum_value('.m_3');
    if(sum_4 <=0 ) sum_4 = 0;
    if(sum_4 >=15 ) sum_4 = 15;
    $("#sum_4").text(sum_4);


    // update muc 5
    var sum_5 = sum_value('.m5');
    
    if(sum_5 <=0 ) sum_5 = 0;
    if(sum_5 >=10 ) sum_5 = 10;
    $("#sum_5").text(sum_5);
    var sum = sum_text('.sum');
    // update tong
    $("#sum").text(sum);
    $("#ip_sum").val(sum);
    // update xep loai
    if (sum >=90) {
        $("#xl").text("Xuất sắc");
    } else if (sum >= 80 && sum <90) {
        $("#xl").text("Tốt");
    } else if(sum >= 65 && sum <80){
        $("#xl").text("Khá");
    } else if(sum >= 50 && sum <65){
        $("#xl").text("Trung bình");
    } else if(sum >= 35 && sum <50){
        $("#xl").text("Yếu");
    } else{
        $("#xl").text("Kém");
    }
}

$(".spinner").width(50);

window.onload = function() {
    //whatever you like to do now, for example hide the spinner in this case
update_view();
    
  };
//     console.log("sds");
// }
// });
