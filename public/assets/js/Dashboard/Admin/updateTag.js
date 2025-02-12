document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-warning').forEach(button => {
        button.addEventListener("click", function () {
          
            let tagId = this.getAttribute("data-tag-id");
            let tagName = this.getAttribute("data-tag-name");
            document.getElementById("updatetagId").value = tagId;
            document.getElementById("updateTitle").value = tagName;
        });
    });
});
