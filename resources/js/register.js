document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("registerForm");

    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            var formData = new FormData(form);

            fetch("/api/cadastrar", {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((result) => {
                    if (result.status === 200) {
                        window.location.href = "/";
                    } else {
                        alert(result.message);
                    }
                })
                .catch((error) => console.error("Fetch error:", error));
        });
    } else {
        console.error("Form with ID registerForm not found.");
    }
});
