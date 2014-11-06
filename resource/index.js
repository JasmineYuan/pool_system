/**
 * Created by Jasmine on 10/17/14.
 */
$(document).ready(function(){
    var $createUser = $('#addUserForm');
    var $trigger = $('#addUserDiv');
    var $createUserSubmit = $('#addUserSubmit');

    $trigger.on('click', showCreateUserForm);

    $createUserSubmit.on('click', createUser);
    function showCreateUserForm() {
        $createUser.toggleClass('comeout');
        $("#newname").focus();
    }
    function createUser(e) {
        $createUser.toggleClass('comeout');
        var newName = $("#newname").val();
        if(!!newName){
            //write new name to player file
            $.post("addUser.php",{name:newName},function(data){
                var newOption = "<option>"+newName+"</option>"
                $("#playerA").append(newOption);
                $("#playerB").append(newOption);
                $("#newname").val("");
            });
        }
        e.preventDefault();
    }
});
function validateForm(){
    var playerA = $("#playerA").val();
    var playerB = $("#playerB").val();
    if(playerA=="Choose Player A"){
        alert("Please choose Player A");
        return false;
    }else if(playerB=="Choose Player B"){
        alert("Please choose Player B");
        return false;
    }
    else if(playerA==playerB){
        alert("You can not beat yourself!");
        return false;
    }
    else return true;
};