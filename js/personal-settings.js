function delay(delayInms) {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(2);
    }, delayInms);
  });
}

document.getElementById("appointments-save-settings").onclick = function () {
  const name = document.getElementById("name");
  const phone = document.getElementById("phone");
  const email = document.getElementById("email");

  const savedLabel = document.getElementById("saved");

  const emailFormat =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  const phoneFormat = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
  var invalid = false;
  const dafeaultBorderColor = name.style.borderColor;

  savedLabel.style.display = "none";

  if (!email.value.match(emailFormat)) {
    invalid = true;
    email.style.borderColor = "red";
  } else {
    email.style.borderColor = dafeaultBorderColor;
  }

  if (!phone.value.match(phoneFormat)) {
    invalid = true;
    phone.style.borderColor = "red";
  } else {
    phone.style.borderColor = dafeaultBorderColor;
  }

  if (!invalid) {
    const payload = {
      a: "set_uci",
      d: `{\"organization\":\"${name.value}\",\"email\":\"${email.value}\",\"address\":\"\",\"phone\":\"${phone.value}\",\"confirmedRdrUrl\":\"\",\"confirmedRdrId\":false,\"confirmedRdrData\":false}`,
      p: "p0",
    };

    $.post(OC.generateUrl("apps/appointments/state"), payload)
      .done(async function () {
        savedLabel.style.display = "unset";
        await delay(3000);
        savedLabel.style.display = "none";
      })
      .fail(function () {
        alert("Error Saving");
      });
  }
};
document.getElementById("copyPubUrl").onclick = function () {
  const cb = navigator.clipboard;
  const pubUrl = document.getElementById("pubUrl");
  const pubUrlCopiedLabel = document.getElementById("pubUrlLabel");

  cb.writeText(pubUrl.innerText).then(async () => {
    pubUrlCopiedLabel.style.display = "unset";
    await delay(3000);
    pubUrlCopiedLabel.style.display = "none";
  });
};
