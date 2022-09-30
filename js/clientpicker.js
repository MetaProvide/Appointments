document.addEventListener("DOMContentLoaded", function () {
    const clientPicker = document.getElementById('adminly-client-picker');
    if(clientPicker){
        const clientNameInput = document.getElementById('srgdev-ncfp_fname');
        const clientEmailInput = document.getElementById('srgdev-ncfp_femail');
        const clientPhoneInput = document.getElementById('srgdev-ncfp_fphone');
        let clients = clientPicker.getElementsByClassName('client-list-item');

        clientNameInput.addEventListener("click", ()=>{clientPicker.style.display = 'block'});
        clientNameInput.addEventListener("change", ()=>{
            const searchValue = clientNameInput.value;
            console.log(searchValue);
            clients.forEach( client => {
                const name = client.querySelector('.client-name').innerHTML;
                if(name.includes(searchValue)){
                    client.style.display = 'block';
                }
                else if(searchValue){
                    client.style.display = 'none';
                }
                else{
                    client.style.display = 'block';}
            })
        });


        

        clients.forEach(client => client.addEventListener('click', () => {
            clientNameInput.value = client.querySelector('.client-name').innerHTML;
            clientEmailInput.value = client.querySelector('.client-email').innerHTML;
            client.querySelector('.client-phone') ? clientPhoneInput.value = client.querySelector('.client-phone').innerHTML : clientPhoneInput.value = "";
            clientPicker.style.display = 'none';
        }));


    }
});