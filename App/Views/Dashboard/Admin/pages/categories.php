<!-- Button trigger modal -->
<?php require_once dirname(__DIR__) . '../../../Includes/messages.php';  ?>
<?php
        use App\Controllers\CategoryController;

?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-categorie">
    Ajoute Categorie
</button>

<!-- Modal Create Categorie-->

<div class="modal fade" id="add-categorie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModaLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category/addCategory" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">title</label>
                        <input type="text" name="nom" class="form-control" id="title" aria-describedby="emailHelp">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="Leave a comment here"
                            id="Description"></textarea>
                        <label for="Description">Description</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajoute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal update Categorie-->
<!-- Modal update Categorie-->

<div class="modal fade" id="update-categorie" tabindex="-1" aria-labelledby="update-categorie" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category/updateCategory" method="POST">
                    <input type="hidden" name="categoryId" id="updateCategoryId">
                    <div class="mb-3">
                        <label for="updateTitle" class="form-label">Title</label>
                        <input type="text" name="nom" class="form-control" id="updateTitle">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" id="updateDescription" placeholder="Leave a comment here"></textarea>
                        <label for="updateDescription">Description</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
            $objetController->listeCategories();
           ?>

        </tbody>
    </table>
</div>



