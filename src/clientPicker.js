const updateClientList = (clientPicker, clientNameInput, clients) => {
  clientPicker.style.display = "block";
  const searchValue = clientNameInput.value.toLowerCase();
  let results = 0;
  clients.forEach((client) => {
    const name = client.querySelector(".client-name").innerHTML.toLowerCase();
    if (name.includes(searchValue)) {
      client.style.display = "block";
      results++;
    } else if (searchValue) {
      client.style.display = "none";
    } else {
      client.style.display = "block";
    }
  });
  if (searchValue && results === 0) {
    clientPicker.style.display = "none";
  } else {
    clientPicker.style.display = "block";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const clientPicker = document.getElementById("adminly-client-picker");
  if (clientPicker) {
    const clientNameInput = document.getElementById("srgdev-ncfp_fname");
    const clientEmailInput = document.getElementById("srgdev-ncfp_femail");
    const clientPhoneInput = document.getElementById("srgdev-ncfp_fphone");
    let clients = clientPicker.getElementsByClassName("client-list-item");

    clientNameInput.addEventListener("click", (event) => {
      updateClientList(clientPicker, clientNameInput, clients);
      event.stopPropagation();
    });
    clientNameInput.addEventListener("input", () => {
      updateClientList(clientPicker, clientNameInput, clients);
    });

    clients.forEach((client) =>
      client.addEventListener("click", () => {
        clientNameInput.value = client.querySelector(".client-name").innerHTML;
        clientEmailInput.value =
          client.querySelector(".client-email").innerHTML;
        client.querySelector(".client-phone")
          ? (clientPhoneInput.value =
              client.querySelector(".client-phone").innerHTML)
          : (clientPhoneInput.value = "");
        clientPicker.style.display = "none";
      })
    );

    window.addEventListener("click", function () {
      //Hide the menus if visible
      console.log("oioi");
      clientPicker.style.display = "none";
    });
  }
});
