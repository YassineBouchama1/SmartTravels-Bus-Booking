<?php ob_start();
?>

<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>


                </div>
            </div>

        </div>
    </div>
</div>



<div class="container ">

    <script src="https://cdn.tailwindcss.com"></script>

    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <h1 class="text-4xl font-medium">Reset password</h1>
        <p class="text-slate-500">Fill up the form to reset the password</p>
        <p class="text-green-500" id="successMSG"></p>

        <form class="my-10">
            <div class="flex flex-col space-y-5">
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">Email address</p>
                    <input id="email" name="email" type="email" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter email address">
                </label>


            </div>
        </form>
        <button id="sendpassword" class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
            </svg>

            <span>Reset password</span>
        </button>
        <p class="text-center">Not registered yet? <a href="./index.php?action=registerClient" class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Register now </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg></span></a></p>
        <p class="text-center">Already Login? <a href="./index.php?action=loginClient" class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Login now </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg></span></a></p>
    </div>

</div>


<script src="https://cdn.emailjs.com/dist/email.min.js"></script>


<script>
    let restBtn = document.getElementById('sendpassword');
    let successMSG = document.getElementById('successMSG');

    restBtn.addEventListener('click', function() {

        let email = document.getElementById('email').value;
        let password = null
        if (email === '') {
            console.log('pb need email')
            return
        } else {
            // Create a FormData object and append data to it
            const formData = new FormData();
            formData.append('email', email);
            console.log(email)

            const data = fetch('index.php?action=getPasswordClient', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(result => {
                    // Handle the result from the backend
                    console.log(result);
                    password = result.password
                    sendEmail();
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                })

        }


        async function sendEmail() {
            console.log('clicked');
            (function() {
                emailjs.init("ns-vZ5YbgEIulsOSI");
            })();

            const templateParams = {
                email_to: 'sisko9me@gmail.com',
                password: password,
            };

            console.log('clicked');
            emailjs.send("service_xjcjfrp", "template_rmc7sd2", templateParams)
                .then((response) => {
                    console.log("Email sent successfully", response);
                    successMSG.textContent = 'we send your password to your email'
                    email.value = ''
                })
                .catch((error) => {
                    console.error("Error sending email", error);
                    successMSG.textContent = 'errors '

                });
        }
    });
</script>
<?php $contant =  ob_get_clean();
include_once "View\layout.php";


?>