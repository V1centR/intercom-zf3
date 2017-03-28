/**
 * Created by vicentcdb@gmail.com on 3/27/17.
 */
angular.module('ui.bootstrap.app', ['ui.bootstrap']);
$(document).ready(function () {
    $('button.close').click(function () {
        $('form').trigger("reset");
        document.getElementById("messageLogin").textContent = "";
    });

    $('input#loginInput').focus(function(){
        document.getElementById("messageLogin").textContent = "";
    });
});

function resetMsg(){
    document.getElementById("messageLogin").textContent = "";
}

function resetMsgCadastro(){
    //document.getElementById("messageCadastro").textContent = "";
    //  document.getElementById("messageCadastrar1").textContent = "";
}
