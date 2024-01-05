<?php
if (isset($_SESSION["Admin"])) {
  $admin = "admin";


  ob_start(); ?>




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


    <div class=" text-center ">
      <div class="row">
        <div class="col-sm-12 bg-black p-4 ">


          <a class="mb-5 chose active" href="index.php?action=CreateCompany">Ajouter Company</a>


          <!-- <a class="mb-5 chose"  href="index.php?action=affichBus" >Ajouter Bus</a> -->


          <a class="mb-5 chose" href="index.php?action=route">Ajouter Un Route</a>

          <a class="mb-5 chose " href="index.php?action=Operateur">Ajouter Opérateur</a>


          <!-- <a class="mb-5 chose"  href="index.php?action=Horaire" >Ajouter Un Horaire</a> -->








        </div>
        <div class="col-sm-12 form">
          <div class="row">
            <form method="post" enctype="multipart/form-data" action="index.php?action=CreateCompany">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label ">Nom de Company</label>
                  <input name="name" required value="" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                  <textarea name="Bio" required placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $Description ?? '';  ?></textarea>
                </div>
                <label class="mb-2" for="">add img</label>
                <div class="row g-0 text-center  ms-1">
                  <div class="col-6 col-xl-4"> <label class="label_file col-sm-4" for="apply"><input required type="file" name="image" id="apply" accept="image/*">Get file</label></div>
                </div>

                <div class="mt-5">
                  <button type="submit" name="submit" class="btn btn-success">Ajouter Catégories</button>
                  <?php if (!empty($error)) {  ?>
                    <div class=" alert-danger "><?= $error ?></div>

                  <?php } ?>


                </div>

            </form>
          </div>

        </div>

        <div class="row">
          <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Catégories : </label>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th scope="col">photo</th>
                  <th scope="col">Nom de Company</th>
                  <th scope="col">Description</th>

                  <th scope="col">Opérations</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php foreach ($Company as  $value) {   ?>


                  <tr>
                    <td><img src="<?= $value->getimg() ?>" alt="" width="150px" height="154px"></td>
                    <th scope="row"><?= $value->getName()  ?></th>
                    <td><?= $value->getBio() ?></td>

                    <td>
                      <a class="btn btn-success mb-2 ms-2" href="index.php?action=updateCompany&id=<?= $value->getId() ?>">update</a>

                      <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value->getId() ?>" data-bs-name="<?= $value->getName()  ?>" href="#">delete</a>

                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
            <div id="rebons"></div>


          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
        </div>
        <div class="modal-body">


        </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>



  <script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
      trigger.addEventListener('click', (event) => {
        event.preventDefault();
        const id = trigger.getAttribute('data-bs-id');
        const nom = trigger.getAttribute('data-bs-name');
        const modal = document.getElementById('exampleModal');
        const body = modal.querySelector('.modal-body');
        const modalTrigger = modal.querySelector('.modal-footer');
        // Use the fetched 'id' to perform further actions or data retrieval
        modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=destroCompany&id=${id}">delete</a>
`;
        body.innerHTML = `Do you want to delete : ${nom}`;
        // Set the 'data-bs-target' attribute of the modal dynamically
        modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
        // Show the modal
        const myModal = new bootstrap.Modal(modal);
        myModal.show();
      });
    });
  </script>

<?php $contant =  ob_get_clean();
  include_once "View\layout.php";
} else {
  header("Location: index.php?action=login_Admin");
}
?>