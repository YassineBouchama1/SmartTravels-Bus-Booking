<?php
ob_start(); 


?>

<?php

$array = array();

foreach ($reservation as  $value) {
    $array[] = $value["number_seat"];
}



?>
<?php
 


?>

    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
    <a href="#" class="text-2xl font-bold text-gray-800"><?= $horaire["Ville_depart"]?> - <?= $horaire["Ville_destination"]?></a>

        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
            <div class="relative">
                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg></a>
                        <span class="font-semibold text-gray-900">Select Trip</span>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">3</a>
                        <span class="font-semibold text-gray-500">Checkout</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Choose Seat</p>
            <img src="public/seat/volant.png" alt="smarttravel" class=" p-4">

            <div class="flex flex-wrap gap-10 p-4 wrap-4  justify-between mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6" id="seatContainer">

            </div>
        </div>
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Payment Details</p>
            <p class="text-gray-400">Complete your order by providing your payment details.</p>
            <div class="">
                <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                <div class="relative">
                <input value="<?php echo (isset($_SESSION["emailClient"])) ? $_SESSION["emailClient"] : ""; ?>" type="text" id="inputEmail" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                </div>





                <!-- Total -->
                <div class="mt-6 border-t border-b py-2">
                
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900"><?= $horaire["price"]?> MAD</p>
                </div>
            </div>
            <button id="submitBtn" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
            <p id="errorCheckout" class="text-red-300 text-center py-2"></p>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {



            let seatContainer = document.getElementById('seatContainer');
            let selectedSeat = null;


            // let numberOfSeats = 20;
            let numberOfSeats = <?php echo $CapaciteBus["Capacite"] ?>;;
console.log(numberOfSeats )
            let unavailableSeats = <?php echo json_encode($array); ?>;

            // let unavailableSeats = [2, 10];

            for (let i = 1; i <= numberOfSeats; i++) {
                let seat = document.createElement('div');
                seat.classList.add('w-2/4', 'p-2', 'w-20', 'h-auto', 'flex', 'items-center', 'justify-center', 'font-bold', 'cursor-pointer', 'select-none', 'relative');

                // Check if the seat is unavailable
                if (unavailableSeats.includes(i)) {
                    seat.classList.add('cursor-not-allowed');
                    seat.innerHTML = `
               <img class="w-full h-full filter grayscale text-gray-500" src='public/seat/blocked.svg'>
                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white">${i}</span>
                    
                    `;
                } else {
                    seat.innerHTML = `
                      <img class="w-full h-full filter text-green-500" src='public/seat/unselected.svg'>

                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white">${i}</span>
                   
                    `;

                    // Add click event to toggle seat selection
                    seat.addEventListener('click', function() {
                        if (selectedSeat) {
                            // selectedSeat.classList.remove('bg-blue-500');
                            selectedSeat.querySelector('img').src = 'public/seat/unselected.svg'; // Change to the appropriate unselected image source

                        }

                        this.querySelector('img').src = 'public/seat/selected.svg'; // Change to the appropriate selected image source

                        // this.classList.add('bg-blue-500');

                        selectedSeat = this;
                        console.log(selectedSeat.querySelector('span').textContent)
                    });
                }

                seatContainer.appendChild(seat);
            }


            //on click submit 
            let submitBtn = document.getElementById('submitBtn')
            submitBtn.addEventListener('click', async function() {

                let email = `<?php echo isset($_SESSION['emailClient']) ? $_SESSION['emailClient'] : "" ?>`;
                
                email = document.getElementById('inputEmail').value;
                console.log(email)
                if (selectedSeat != null && email) {

                    window.location.replace(`index.php?action=addReservation&trip_Id=<?= $horaire["ID"]?>&route=<?= $horaire["Ville_depart"]?>-<?= $horaire["Ville_destination"]?>&number_seat=${selectedSeat.querySelector('span').textContent}&data=<?= $horaire["Date"]?>&emailClient=${email}`)
                } else {              
                    document.getElementById('errorCheckout').textContent = 'select seat first or email'
                }
            })

        });
    </script>


<?php

$contant =  ob_get_clean();

 include_once "View\layout.php" ; 