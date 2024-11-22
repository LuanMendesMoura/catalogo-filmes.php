const parametros = new URLSearchParams(window.location.search)
const tipoMensagem = parametros.get("msg")
const notificacao = document.createElement("div")

if (tipoMensagem === "sucesso") {
    notificacao.innerHTML = "Operação realizada com sucesso"
    notificacao.className = "notificacao sucesso"
} else if (tipoMensagem === "erro") {
    notificacao.innerHTML = "Erro ao realizar operação"
    notificacao.className = "notificacao erro"
}

document.body.appendChild(notificacao)

// Serve para apagar os parametros da url, voltando para o pathname (url sem parametro)
const urlSemParametro = window.location.pathname
window.history.replaceState(null, "", urlSemParametro)

// Serve para apagar a notificacao após 2 segundos
setTimeout(function () {
notificacao.remove()
} , 2000)

        