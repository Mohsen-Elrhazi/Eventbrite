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
        confirmButtonText: 'supprimer',
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
                        'Supprimée!',
                        'La catégorie a été supprimée avec succès.',
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
                    'Une erreur est survenue lors de la suppression.',
                    'error'
                );
            });
        }
    });
}

