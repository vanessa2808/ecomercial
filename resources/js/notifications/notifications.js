// Enable pusher logging - don't include this in production
Pusher.logToConsole = false;

var pusher = new Pusher('b40c01a8b42f7efdca3b', {
    encrypted: true,
    cluster: "ap1"
});


// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('NotificationPusherEvent');

// Bind a function to a Event (the full Laravel class)
channel.bind('send-message', function (data) {
    console.log(data)
    var containner = $("#create-scroll");
    var date = new Date(data.orderDate);
    var newNotificationHtml = `
      <div class="media">
          <div class="media-left">
              <div class="media-object">
                   <img src="` + data.avatar + `" class="img-circle" alt="50x50" id="avatar">
                        </div>
                </div>
                <div class="media-body">
                    <strong class="notification-title">` + data.title + `</strong>
                       <p class="notification-desc">` + data.userName + ' ' + data.body + `</p>
                            <div class="notification-meta">
                                 <small class="timestamp">` + date.toDateString() + ':' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds() + `</small>
                            </div>
                       </div>
                </div>
    `;
    containner.prepend(newNotificationHtml);

    var parent = document.getElementById("create-scroll");
    var notifications = parent.getElementsByClassName("media");

    document.getElementById("notification-count-1").innerHTML = notifications.length;
    document.getElementById("notification-count-2").innerHTML = notifications.length;
});
