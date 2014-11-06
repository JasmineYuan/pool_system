/**
 * Created by Jasmine on 10/17/14.
 */
$(document).ready(function() {
    function jump(count) {
        window.setTimeout(function(){
            count--;
            if(count > 0) {
                $('#show').html(count);
                jump(count);
            } else {
                location.href="/battleman/index.php";
            }
        }, 1000);
    }
    jump(2);
});