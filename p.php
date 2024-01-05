<!-- HTML structure -->
<li>
    <div class="dropdown">
        <sub data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bell"></i></sub>
        <span id="noti_number">0</span>
        <ul style="height: 300px;" class="dropdown-menu dropdown-menu-dark custom-notifications overflow-scroll">
            <!-- Notifications will be dynamically added here -->
        </ul>
    </div>
</li>

<!-- JavaScript -->
<script>
function formatDate(date) {
    const currentDate = new Date();
    const yourDate = new Date(date);
    const difference = currentDate.getTime() - yourDate.getTime();

    const daysDifference = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hoursDifference = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutesDifference = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));

    if (difference < 1000) {
        return "Just now";
    } else if (daysDifference > 0) {
        return daysDifference + " days ago";
    } else if (hoursDifference > 0) {
        return hoursDifference + " hours ago";
    } else if (minutesDifference > 0) {
        return minutesDifference + " minutes ago";
    } else {
        return "Just now";
    }
}

function updateNotifications() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const response = JSON.parse(this.responseText);
            document.getElementById("noti_number").innerHTML = response.num_rows;
            console.log(document.getElementById("noti_number").innerHTML)
            const notificationsList = document.querySelector(".custom-notifications");
            notificationsList.innerHTML = '';

            response.data.forEach(element => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<hr class="dropdown-divider">
                    <a class="dropdown-item" href="#">${element.content}</a>
                    <a class="dropdown-item" href="#">${formatDate(element.time_created)}</a>`;

                notificationsList.appendChild(listItem);
            });
        }
    };
    xhttp.open("GET", "View/AjaxNotification.php", true);
    xhttp.send();
}

updateNotifications();

setInterval(updateNotifications, 1000);
</script>
