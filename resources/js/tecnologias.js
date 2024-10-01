document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("logoutBtn").addEventListener("click", function () {
        fetch("/logout", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
            },
        }).then((response) => {
            if (response.ok) {
                window.location.href = "/";
            } else {
                return response.json().then((data) => {
                    alert(data.message || "Erro ao fazer logout");
                });
            }
        });
    });

    window.showCreateTechnologyForm = function () {
        document
            .getElementById("createTechnologyForm")
            .classList.remove("hidden");
        document.getElementById("editTechnologyForm").classList.add("hidden");
    };

    window.showEditTechnologyForm = function (id, nome, descricao, nivel) {
        document.getElementById("editId").value = id;
        document.getElementById("editNome").value = nome;
        document.getElementById("editDescricao").value = descricao;
        document.getElementById("editNivel").value = nivel;
        document
            .getElementById("editTechnologyForm")
            .classList.remove("hidden");
        document.getElementById("createTechnologyForm").classList.add("hidden");
    };

    document
        .getElementById("technologyForm")
        .addEventListener("submit", function (event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch("/technologies", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            }).then((response) => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert("Erro ao cadastrar tecnologia");
                }
            });
        });

    document
        .getElementById("editForm")
        .addEventListener("submit", function (event) {
            event.preventDefault();

            var id = document.getElementById("editId").value;
            var formData = new FormData(this);

            fetch(`/technologies/${id}`, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                    "X-HTTP-Method-Override": "PUT",
                },
            }).then((response) => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert("Erro ao atualizar tecnologia");
                }
            });
        });

    window.deleteTechnology = function (id) {
        if (confirm("Você tem certeza que deseja deletar esta tecnologia?")) {
            fetch(`/technologies/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                    "Content-Type": "application/json",
                },
            }).then((response) => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert("Erro ao deletar a tecnologia");
                }
            });
        }
    };
});
