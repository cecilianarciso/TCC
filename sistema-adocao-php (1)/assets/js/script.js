// Função para toggle de modais
function toggleModal(modalId) {
  const modal = document.getElementById(modalId)
  if (modal.style.display === "block") {
    modal.style.display = "none"
  } else {
    modal.style.display = "block"
  }
}

// Fechar modal clicando fora dele
window.onclick = (event) => {
  const modals = document.querySelectorAll(".modal")
  modals.forEach((modal) => {
    if (event.target === modal) {
      modal.style.display = "none"
    }
  })
}

// Máscaras para campos
document.addEventListener("DOMContentLoaded", () => {
  // Máscara para CPF
  const cpfInputs = document.querySelectorAll('input[name="cpf"]')
  cpfInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\D/g, "")
      value = value.replace(/(\d{3})(\d)/, "$1.$2")
      value = value.replace(/(\d{3})(\d)/, "$1.$2")
      value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
      e.target.value = value
    })
  })

  // Máscara para telefone
  const telefoneInputs = document.querySelectorAll('input[name="telefone"]')
  telefoneInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\D/g, "")
      value = value.replace(/(\d{2})(\d)/, "($1) $2")
      value = value.replace(/(\d{4})(\d)/, "$1-$2")
      value = value.replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3")
      e.target.value = value
    })
  })

  // Validação de idade preferida
  const idadeMinInputs = document.querySelectorAll('input[name="idade_preferida_min"]')
  const idadeMaxInputs = document.querySelectorAll('input[name="idade_preferida_max"]')

  idadeMinInputs.forEach((input) => {
    input.addEventListener("change", function () {
      const idadeMax = document.querySelector('input[name="idade_preferida_max"]')
      if (idadeMax && Number.parseInt(this.value) > Number.parseInt(idadeMax.value)) {
        idadeMax.value = this.value
      }
    })
  })

  idadeMaxInputs.forEach((input) => {
    input.addEventListener("change", function () {
      const idadeMin = document.querySelector('input[name="idade_preferida_min"]')
      if (idadeMin && Number.parseInt(this.value) < Number.parseInt(idadeMin.value)) {
        idadeMin.value = this.value
      }
    })
  })
})

// Confirmação para ações importantes
function confirmarAcao(mensagem) {
  return confirm(mensagem)
}

// Auto-hide alerts
document.addEventListener("DOMContentLoaded", () => {
  const alerts = document.querySelectorAll(".alert")
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.style.opacity = "0"
      setTimeout(() => {
        alert.style.display = "none"
      }, 300)
    }, 5000)
  })
})

// Smooth scroll para links internos
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// Validação de formulários
function validarFormulario(formId) {
  const form = document.getElementById(formId)
  const inputs = form.querySelectorAll("input[required], select[required], textarea[required]")
  let valido = true

  inputs.forEach((input) => {
    if (!input.value.trim()) {
      input.style.borderColor = "#f44336"
      valido = false
    } else {
      input.style.borderColor = "#ddd"
    }
  })

  return valido
}

// Busca em tempo real (para futuras implementações)
function buscarEmTempo(inputId, targetId) {
  const input = document.getElementById(inputId)
  const target = document.getElementById(targetId)

  input.addEventListener("input", function () {
    const termo = this.value.toLowerCase()
    const items = target.querySelectorAll("[data-searchable]")

    items.forEach((item) => {
      const texto = item.textContent.toLowerCase()
      if (texto.includes(termo)) {
        item.style.display = ""
      } else {
        item.style.display = "none"
      }
    })
  })
}
