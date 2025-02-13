<!-- Button trigger modal -->
<?php
        use App\Controllers\CategoryController;
        use App\Core\Session; 
        if(Session::hasSession('error')){
            echo "<div class='alert alert-danger text-center'>". Session::getSession('error') ."</div>";
            Session::removeSession('error');
        }
        if(Session::hasSession('success')){
            echo "<div class='alert alert-success text-center'>". Session::getSession('success') ."</div>";
            Session::removeSession('success');
        }
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajoute Categorie
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/category/addCategory" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="nom" class="form-control" id="title" aria-describedby="emailHelp">
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="Description"></textarea>
                    <label for="Description">Description</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="supmit" class="btn btn-primary">Ajoute</button>
                </div>
                
        </form>
      </div>

    </div>
  </div>
</div>
 <!--Liste des Catégories-->
 <div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Catégories</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $objetController= new CategoryController();
           $categories= $objetController->listeCategories();
           ?>
                <?php foreach ($categories as $category): ?>
                   <?php echo $objetController->renderRow($category); ?>
                <?php endforeach; ?>
           
        </tbody>
    </table>
</div>


