// CONTRÔLE DU FORMULAIRE

(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()


// REGEX

// let form = document.querySelector('#contactForm')
// console.log(form.mail);

// // Ecouter la modification de l'email
// form.mail.addEventListener('change', function() {
//     validMail(this);
// });

// const validMail = function(inputemail) {
//     let regex = new RegExp(
//     /([a-z0-9](\.?|\_|\-))*@([a-z0-9]{2,})(\.[a-z]{2,}){1,}/,
//     );

//     let testemail = regex.test(inputemail.value);
// console.log(testemail);
// };
