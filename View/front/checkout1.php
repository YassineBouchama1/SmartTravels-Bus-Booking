<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Design with Tailwind CSS</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-20 flex gap-10 ">

    <div class="w-full" id="card">
        <div id="ticket-wrapper2" class=" flex  gap-x-2 p-4 flex-col lg:flex-row mx-auto justify-between  h-[150px] items-center border-2  ">
            <div class=" ticket-wrapper-info flex-col lg:justify-between justify-center items-center gap-y-6 ">
                <h3 class="font-bold text-lg  leading-7 text-[#424248]"> safi - Marakkech</h3>
                <img src="ctm.png" class=" w-auto h-28 bg-cover bg-center">

            </div>
            <div class="ticket-wrapper-cities flex justify-between gap-x-4  items-center">

                <div>
                    <h4 class="font-semibold text-lg  leading-7 text-[#424248]">08:00AM</h4>
                    <p>Safi</p>
                </div>

                <div class="text-center ">
                    <i class="fa-solid fa-arrow-right-long text-green-700"></i>
                    <p>200 min</p>
                </div>

                <div>
                    <h4 class="font-semibold text-lg  leading-7 text-[#424248]">09:30AM</h4>
                    <p>Markkech</p>
                </div>

            </div>
            <div class="ticket-wrapper-price text-center flex flex-col gap-4">
                <h3 class="text-green-600 text-bold text-2xl">$250.00</h3>



            </div>
        </div>
        <hr>
        <div class="flex  gap-x-2 p-4 mx-auto justify-start basis-4/6 items-center">
            <p class="font-bold text-[#777]">Facilities-</p> <span class="bg-[#f7f7f7] text-[#777] p-1 rounded-sn">Water Bottle</span>
            <span class="bg-[#f7f7f7] text-[#777] p-1 rounded-md">Pillow</span>
            <span class="bg-[#f7f7f7] text-[#777] p-1 rounded-md">Wifi</span>
        </div>




        <div class="flex flex-wrap gap-10 p-4 wrap-4 w-[500px]" id="seatContainer"></div>
    </div>

    <div id='summery' class="w-[150px] h-[300px]">
        hello
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let seatContainer = document.getElementById('seatContainer');
            let selectedSeat = null;


            let numberOfSeats = 20;


            let unavailableSeats = [2, 10];

            for (let i = 1; i <= numberOfSeats; i++) {
                let seat = document.createElement('div');
                seat.classList.add('w-1/4', 'p-2', 'w-20', 'h-auto', 'flex', 'items-center', 'justify-center', 'font-bold', 'cursor-pointer', 'select-none', 'relative');

                // Check if the seat is unavailable
                if (unavailableSeats.includes(i)) {
                    seat.classList.add('bg-gray-300', 'cursor-not-allowed');
                    seat.innerHTML = `
               <img class="w-full h-full filter grayscale text-gray-500" src='seat-icon.svg'>
                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white">${i}</span>
                    
                    `;
                } else {
                    seat.innerHTML = `
                                                <img class="w-full h-full filter text-green-500" src='seat-icon.svg'>

                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white">${i}</span>
                   
                    `;

                    // Add click event to toggle seat selection
                    seat.addEventListener('click', function() {
                        if (selectedSeat) {
                            selectedSeat.classList.remove('bg-blue-500');

                        }

                        this.classList.add('bg-blue-500');
                        selectedSeat = this;
                        console.log(selectedSeat.getElementsByTagName('span'))
                    });
                }

                seatContainer.appendChild(seat);
            }
        });
    </script>



</body>

</html>