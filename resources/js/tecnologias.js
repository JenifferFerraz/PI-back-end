document.addEventListener("DOMContentLoaded", function () {
    const logoutBtn = document.getElementById("logoutBtn");
    const editProfileBtn = document.getElementById("editProfileBtn");
    const perguntasBtn = document.getElementById("perguntasBtn");
    const technologyForm = document.getElementById("technologyForm");
    const editForm = document.getElementById("editForm");

    if (logoutBtn) {
        logoutBtn.addEventListener("click", function () {
            fetch("/logout", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
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
    }

    if (editProfileBtn) {
        editProfileBtn.addEventListener("click", function () {
            window.location.href = "/perfil";
        });
    }

    if (perguntasBtn) {
        perguntasBtn.addEventListener("click", function () {
            window.location.href = "/perguntas";
        });
    }

    window.showCreateTechnologyForm = function () {
        document.getElementById("createTechnologyForm").classList.remove("hidden");
        document.getElementById("editTechnologyForm").classList.add("hidden");
    };

    window.showEditTechnologyForm = function (id, nome, descricao, nivel) {
        document.getElementById("editId").value = id;
        document.getElementById("editNome").value = nome;
        document.getElementById("editDescricao").value = descricao;
        document.getElementById("editNivel").value = nivel;
        document.getElementById("editTechnologyForm").classList.remove("hidden");
        document.getElementById("createTechnologyForm").classList.add("hidden");
    };

    if (technologyForm) {
        technologyForm.addEventListener("submit", function (event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch("/technology/cadastrar", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
            }).then((response) => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert("Erro ao cadastrar tecnologia");
                }
            });
        });
    }

    if (editForm) {
        editForm.addEventListener("submit", function (event) {
            event.preventDefault();

            var id = document.getElementById("editId").value;
            var formData = new FormData(this);

            fetch(`/technology/atualizar/${id}`, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
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
    }

    window.deleteTechnology = function (id) {
        if (confirm("Você tem certeza que deseja deletar esta tecnologia?")) {
            fetch(`/technology/deletar/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
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

    window.showCreateRecommendationForm = function () {
        document.getElementById("createRecommendationForm").classList.remove("hidden");
        document.getElementById("editRecommendationForm").classList.add("hidden");
    };

    window.showEditRecommendationForm = function (id, recommendation, reason) {
        document.getElementById("editId").value = id;
        document.getElementById("editRecommendation").value = recommendation;
        document.getElementById("editReason").value = reason;
        document.getElementById("editRecommendationForm").classList.remove("hidden");
        document.getElementById("createRecommendationForm").classList.add("hidden");
    };
});