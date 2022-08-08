Echo.private('App.Models.User.' + window.user.id)
    .notification((notification) => {
        Notification.requestPermission(notification => {

            let notify = new Notification("ABC Recruitment", {
                body: "Your post was ...."
            });

            notify.onclick = () => {
                window.open(window.location.href)
            };
        });
    });