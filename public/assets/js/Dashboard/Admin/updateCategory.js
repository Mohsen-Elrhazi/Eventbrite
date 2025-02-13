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
