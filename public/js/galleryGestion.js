document.addEventListener("DOMContentLoaded", function () {
    const modalImage = document.getElementById("modalImage");

    document.querySelectorAll(".gallery .photo").forEach((img) => {
        img.addEventListener("click", function () {
            modalImage.src = this.src;
            modalImage.alt = this.alt;
        });
    });

    document.querySelectorAll(".tagService-badge").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            const imageId = this.dataset.id;
            const service = this.dataset.service;

            fetch("../../model/ImageModel/setSectionImage.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    imageId,
                    service,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Image définie comme image de section !");
                        location.reload();
                    } else {
                        alert("Erreur : " + data.message);
                    }
                })
                .catch((err) => {
                    console.error(err);
                    alert("Erreur serveur");
                });
        });
    });
});
