document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-warning').forEach(button => {
        button.addEventListener("click", function () {
          
            let categoryId = this.getAttribute("data-category-id");
            let categoryName = this.getAttribute("data-category-name");
            let categoryDescription = this.getAttribute("data-category-description");

          
            document.getElementById("updateCategoryId").value = categoryId;
            document.getElementById("updateTitle").value = categoryName;
            document.getElementById("updateDescription").value = categoryDescription;

            
        });
    });
});


//delete category avec fetch 
function deleteCategory(id) {
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: 'Cette catégorie sera supprimée !',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'oui',
        cancelButtonText: 'Annuler',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/category/deleteCategory', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
       
                    document.getElementById('category-row-' + id).remove();
                 
                    Swal.fire(
                        'Succès!',
                        data.message,
                        'success'
                    );
                } else {
              
                    Swal.fire(
                        'Erreur!',
                        'Une erreur est survenue lors de la suppression.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Erreur!',
                    data.message,
                    'success'
                );
            });
        }
    });
}

//update category avec fetch 

document.querySelector("#update-categorie form").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let formData = new FormData(this); 
    console.log([...formData.entries()]);

    fetch('/category/updateCategory', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
           if (data.status === 'success') {
            Swal.fire(
                'Modifié!',
                data.message,
                'success'
            );
            document.getElementById('category-row-' + formData.get('categoryId')).querySelector('td:nth-child(2)').textContent = formData.get('nom');
            document.getElementById('category-row-' + formData.get('categoryId')).querySelector('td:nth-child(3)').textContent = formData.get('description');
       
                document.getElementById('update-categorie').style.display = 'none';
                document.querySelector('.modal-backdrop').style.display = 'none';
        } else {
            Swal.fire(
                'Erreur!',
                data.message,
                'error'
            );
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire(
            'Erreur!',
            'Une erreur est survenue lors de la modification.',
            'error'
        );
    });
});







//insertion avec fetch 

document.querySelector("#add-categorie form").addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('/category/addCategory', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.status === 'success') {
            Swal.fire(
                'Succès!',
                data.message,
                'success'
            );
            this.reset();
            let modal = bootstrap.Modal.getInstance(document.getElementById('add-categorie'));
            modal.hide();
        }
        else {
            Swal.fire(
                'Erreur!',
                data.message,
                'error'
            );
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire(
            'Erreur!',
            'Une erreur est survenue lors de l\'insertion.',
            'error'
        );
    });
});
document.getElementById('add-categorie').addEventListener('show.bs.modal', function () {
    const form = document.querySelector("#add-categorie form");
    form.reset();
});
