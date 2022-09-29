const showClients = (clientNameInput) => {
    clientPicker.getElementsByClassName('client-list-item')
}

document.addEventListener("DOMContentLoaded", function () {
    const clientPicker = document.getElementById('adminly-client-picker');
    if(clientPicker){
        const clientNameInput = document.getElementById('srgdev-ncfp_fname');
        
        clientNameInput.addEventListener("click", ()=>{clientPicker.style.display = 'block'});
        clientNameInput.addEventListener("change", showClients(clientNameInput));
    }
});