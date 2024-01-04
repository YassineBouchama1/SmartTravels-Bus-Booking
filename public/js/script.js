let notification_icon = document.getElementById('notificationIcon');
        let notification_table = document.getElementById('notification');
        notification_table.style.left = (notification_icon.offsetLeft - 400) + "px";

        notification_icon.addEventListener('click', function() {


            if (notification.style.display === 'none') {
                notification.style.display = 'block';
            } else {
                notification.style.display = 'none';
            }
        });