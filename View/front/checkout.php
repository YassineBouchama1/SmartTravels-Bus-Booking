<script src="https://cdn.tailwindcss.com"></script>

<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="max-w-md w-full bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 w-28 h-28 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-center mb-4">Thank You for Your Purchase!</h2>
        <p class="text-center mb-4">Thank you for purchasing a bus ticket with us. Here are the details of your purchase:</p>
        <div class="border-t border-b py-4">
            <p class="text-sm text-gray-600">Purchase Date &amp; Time: <span class="font-medium text-gray-900" id="date">January 3, 2024, 10:30 AM</span></p>
            <p class="text-sm text-gray-600 mt-2">Route &amp; Destination: <span class="font-medium text-gray-900" id="route">New York to Boston</span></p>
            <p class="text-sm text-gray-600 mt-2">Seat Number(s): <span class="font-medium text-gray-900" id="seat"></span></p>
        </div>
        <div class="flex items-center justify-center mt-4">
            <div class="w-[150px] aspect-[1/1]">
                <div id="qrcode-container"></div>
            </div>
        </div>
        <p class="text-center text-sm text-gray-600 mt-4">Scan the QR code above to access your ticket on your phone.</p>
        <div class="flex items-center justify-center mt-6">
            <button id="downloadButton" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 w-full">Download PDF Ticket</button>
        </div>
    </div>
</div>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        //this function to generate qrcode by passing id reservation
        function generateQRCode(id) {
            let container = document.getElementById('qrcode-container');
            container.innerHTML = '';
            console.log("hola")
            let qrcode = new QRCode(container, {
                text: id,
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#FFFFFF",
            });
        }


        // get information <id ticket, route ...> from url
        const searchParams = new URLSearchParams(window.location.search);
        const ticketId = searchParams.get('trip_Id');
        const route = searchParams.get('route');
        const date = searchParams.get('data');
        const email = searchParams.get('emailClient');
        const seat = searchParams.get('number_seat');

        // Display information in HTML elements

        if (date !== null) {
            document.getElementById('date').textContent = date;
        }

        if (route !== null) {
            document.getElementById('route').textContent = route;
        }

        if (seat !== null) {
            document.getElementById('seat').textContent = seat;
        }
        console.log(ticketId)


        //automaticly generat qrcode
        generateQRCode(`http://localhost/SmartTravels-Bus-Booking/index.php?action=checkout&trip_Id=${ticketId}&route=Safi-Agadir&number_seat=5&data=2023-12-28`);


        // this function for build pdf from this page
        function generatePDFTicket() {
            window.print()
        }

        // Add click event listener to the download button
        const downloadButton = document.getElementById('downloadButton');
        downloadButton.addEventListener('click', generatePDFTicket);
    });
</script>







<?php
