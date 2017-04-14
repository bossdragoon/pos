$(function () {

    function testIIFE() {
        for (var i = 0; i <= 3; i++) {
            console.log('outer loop : ' + i);

            //ทดสอบ การใช้ Immediately-Invoked Function Expressions (IIFEs) สำหรับส่งค่า loop index ใส่ Ajax call
            (function (index) {
                $.get('kpip/getDataListings', {}, function (o) {
                    console.log('inner loop : ' + index);
                });
            }(i));



        }

    }


});