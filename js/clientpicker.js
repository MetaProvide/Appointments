// const showClients = (clientNameInput) => {
//     clientPicker.getElementsByClassName('client-list-item')
// }

document.addEventListener("DOMContentLoaded", function () {
    const clientPicker = document.getElementById('adminly-client-picker');
    if(clientPicker){
        const clientNameInput = document.getElementById('srgdev-ncfp_fname');
        const clientEmailInput = document.getElementById('srgdev-ncfp_femail');
        const clientPhoneInput = document.getElementById('srgdev-ncfp_fphone');
        
        clientNameInput.addEventListener("click", ()=>{clientPicker.style.display = 'block'});
        // clientNameInput.addEventListener("change", showClients(clientNameInput));
        clients = clientPicker.getElementsByClassName('client-list-item')

        clients.forEach(client => client.addEventListener('click', event => {
            clientNameInput.value = client.querySelector('.client-name').innerHTML;
            clientEmailInput.value = client.querySelector('.client-email').innerHTML;
            client.querySelector('.client-phone') ? clientPhoneInput.value = client.querySelector('.client-phone').innerHTML : clientPhoneInput.value = "";
            clientPicker.style.display = 'none';
        }));
    }
});