window.userId = window.userName = window.userPicture = "";
function setUserToMessenger(id, name, picture, threadId, threadType) {
    $('#chat_container').html('');
    $('.added-loader').css({'display': 'block'});
    $('.profile-image').css({'background-image': 'url('+ picture +')'})
    $('.chated-user').html(name)
    $('.chated-user').attr('user-id', id)
    $('.chated-user').attr('thread-id', threadId)
    $('.chated-user').attr('thread-type', threadType)
    $('.d-flex').css({'display' : 'flex'});
    if (threadId != null)
        getMessage(threadId, () => {
            $('.added-loader').css({'display': 'none'});
        })
}
function showContactList() {
    $('.message-contact').css({'display': 'block'})
    $('.message-thread').css({'display': 'none'})
}

function showThreadList() {
    $('.message-contact').css({'display': 'none'})
    $('.message-thread').css({'display': 'block'})
}

$('body').on('click', '#sendMessage', function(){
    if ( $('.chated-user').attr('user-id') != "" || $('.chated-user').attr('thread-id') != "" ) {
        sendMessage($('#msgr_input').html(),
            $('.chated-user').attr('user-id'),
            $('.chated-user').attr('thread-id'),
            $('.chated-user').attr('thread-type')
        );
        $('#chat_container').html('');
    }
    $("#msgr_input").html('');
})


function getLastMessages(threadId = null, SUCCESS) {
    $.ajax({
        url: '/message/last/get',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'thread_id': threadId
        },
        async: true,
        success(data) {
            makeMessage(data);
            $("#chat_container").animate({ scrollTop: $('#chat_container').prop("scrollHeight")}, 100);
            SUCCESS();
        }
    });
}

function getMessage(threadId = null, SUCCESS) {
    $.ajax({
        url: '/message/get',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'thread_id': threadId
        },
        async: true,
        success(data) {
            makeMessage(data);
            $("#chat_container").animate({ scrollTop: $('#chat_container').prop("scrollHeight")}, 100);
            SUCCESS();
        }
    });
}

function makeMessage(data){
    loginUserId = data.logged_in_user;
    messages = data.messages;
    $('#chat_container').html("");
    var arrayMessages = $.map(messages, function(value, index) {
        return [value];
    })
    var messagesGroup = sortMessageByDate(arrayMessages);
    messagesGroup.forEach(function(messages) {
        var string = ``;
        messages.forEach(function(message, index){
            var start, end = "";
            if (index == 0)
                start = "chat-start";
            if (messages.length-1 == index)
                end = "chat-end";
            if (message.user_id == loginUserId) {
                string += makeMessageSent(message, start, end, index)
            } else {
                string += makeMessageGet(message, start, end, index)
            }
        });
        $('#chat_container').append(string);
    });
}

function sortMessageByDate(messages) {
    var afterMessage = "";
    var sortedMessages = [];
    messages.forEach(function(message) {

        if (afterMessage == "") {
            if (sortedMessages[uniqueTime(message.created_at)] === undefined)
                sortedMessages[uniqueTime(message.created_at)] = [];
            sortedMessages[uniqueTime(message.created_at)].push(message);
            afterMessage = message;
            return;
        } else {
            if (inAMinute(message.created_at, afterMessage.created_at)) {
                if (sortedMessages[uniqueTime(message.created_at)] === undefined)
                    sortedMessages[uniqueTime(message.created_at)] = [];
                if (sortedMessages[uniqueTime(message.created_at)].lenght === undefined)
                    sortedMessages[uniqueTime(message.created_at)].push(afterMessage);
                sortedMessages[uniqueTime(message.created_at)].push(message);
            } else {
                if (sortedMessages[uniqueTime(message.created_at)] === undefined)
                    sortedMessages[uniqueTime(message.created_at)] = [];
                sortedMessages[uniqueTime(message.created_at)].push(message);
            }
        }
    });
    array = [];
    for (var key in sortedMessages) {
        array.push(sortedMessages[key]);
    }
    return array;
}

function inAMinute (fromDate, destDate) {
    if (
        moment(fromDate).minute() == moment(destDate).minute() &&
        moment(fromDate).hour() == moment(destDate).hour() &&
        moment(fromDate).dayOfYear() == moment(destDate).dayOfYear() &&
        moment(fromDate).year() == moment(destDate).year()
    ) {
        return true;
    }
    return  false;
}
function uniqueTime(date) {
    return moment(date).year() + '-' + moment(date).dayOfYear() + '-' + moment(date).hour() + '-' + moment(date).minute();
}

function makeMessageSent(message, start = "", end = "", index) {
    var dateString = "";
    if (start  != "" && end != ""){
        start = ""; end = "";
        dateString = timeStatus(moment(message.created_at).format('HH:mm'));
    }
    if (end != "" && index != 0)
        dateString = timeStatus(moment(message.created_at).format('HH:mm'));
    return `
        <div class="chat-segment chat-segment-sent ${start}${end}">
            <div class="chat-message">
                ${message.body}
            </div>
            ${dateString}
        </div>`;
}

function makeMessageGet(message, start = "", end = "", index) {
    var dateString = "";
    if (start  != "" && end != ""){
        start = ""; end = "";
        dateString = timeStatus(moment(message.created_at).format('HH:mm'));
    }
    if (end != "" && index != 0)
        dateString = timeStatus(moment(message.created_at).format('HH:mm'));
    return `
    <div class="chat-segment chat-segment-get ${start}${end}">
        <div class="chat-message">
            ${message.body}
        </div>
        ${dateString}
    </div>`;
}

function timeStatus (date) {
    return `
        <div class="fw-300 text-muted mt-1 fs-xs">
            ${date}
        </div>`;
}

function sendMessage(message, userId = null, threadId = null, threadType = null) {
    $.ajax({
        url: '/message/send',
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'user_id': userId,
            'message': message,
            'thread_type': threadType,
            'thread_id': threadId
        },
        async: false,
        success(data) {

        }
    });
}

