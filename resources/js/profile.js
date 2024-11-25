document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("logoutBtn").addEventListener("click", function () {
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

  document.getElementById("profileForm").addEventListener("submit", function (event) {
      event.preventDefault();

      var formData = new FormData(this);

      fetch(`/atualizar/${document.getElementById("editId").value}`, {
          method: "POST",
          body: formData,
          headers: {
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
              "X-HTTP-Method-Override": "PUT",
          },
      }).then((response) => {
          if (response.ok) {
              window.location.href = "/home";
          } else {
              alert("Erro ao atualizar perfil");
          }
      });
  });
});