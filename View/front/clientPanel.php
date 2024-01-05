<script src="https://cdn.tailwindcss.com"></script>

<div class="flex flex-col items-center justify-center min-h-screen py-2">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
        <div class="flex-1 flex flex-col">
            <form action="index.php?action=SignOutClient" method="post">
                <button name="submit" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">SignOut</button>
            </form>
            <a href="./index.php">
                <button name="submit" type="submit" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Home</button>
            </a>
            <div class="w-full px-4 py-6 flex justify-center">

                <div class="flex  justify-center">

                    <div class="w-full">
                        <div class="sm:text-3xl text-2xl font-bold title-font mb-2 text-gray-900">
                            Points:<span class="font-xl"><?php echo  $clinetData['points'] ?></span>
                        </div>
                        <p class="leading-relaxed"><strong>Email:</strong> <?php echo  $clinetData['email'] ?></p>

                    </div>
                </div>
            </div>
            <div class="lg:w-2/4 w-full px-4 py-6 mx-auto">
                <div class="text-2xl font-bold mb-2 text-gray-900">
                    Change Password
                </div>
                <?php if (isset($_GET["good"])) {   ?>
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                        <?= $_GET["good"] ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET["error"])) {   ?>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <?= $_GET["error"] ?>
                    </div>
                <?php } ?>

                <form class="space-y-4" action="index.php?action=changePassword" method="post">
                    <input name="Password" type="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" placeholder="Current Password">
                    <input name="newPassowrd" type="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" placeholder="New Password">
                    <input name="newPassowrd" type="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" placeholder="Confirm New Password">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-blue-500 text-white" type="submit">Update Password</button>
                </form>
            </div>
            <?php if (isset($_GET["goodReservation"])) {   ?>
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <?= $_GET["goodReservation"] ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET["errorReservation"])) {   ?>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <?= $_GET["errorReservation"] ?>
                </div>
            <?php } ?>
            <div class="w-full overflow-x-auto">
                <div class="relative w-full overflow-auto">
                    <table class="w-full caption-bottom text-sm">
                        <thead class="[&amp;_tr]:border-b">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">ROUTE</th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Amount</th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Seat</th>
                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="[&amp;_tr:last-child]:border-0">
                            <?php
                            foreach ($clientReservation as $value) {
                                echo '<tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">';
                                echo '<td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">' . $value['Ville_depart'] . ' to ' . $value['Ville_destination'] . '</td>';
                                echo '<td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">' . 'MAD' . $value['price'] . '</td>';
                                echo '<td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">' . $value['number_seat'] . '</td>';
                                echo '<td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">';
                                echo '<form action="index.php?action=delete_reservation_clinet" method="post"> 
                    <input type="hidden" name="number_seat" value="' . $value['number_seat'] . '">
                    <button type="submit" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2>Delete</button>
                  </form>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>