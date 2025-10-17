import {get_notify} from "./helpers/notify";

$(function (){
    let success = $('#notify_success');
    if(success.length){
        get_notify('success',{
            message: success.val(),
        });
    }

    let danger = $('#notify_danger');
    if(danger.length){
        get_notify('error',{
            message: danger.val(),
        });
    }
});
