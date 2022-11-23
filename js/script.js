// CONTRÔLE DU FORMULAIRE REGEX

// alert('Test de liaison JS');

     // controle du formulaire d'inscription avec une fonction

     let controlForm = document.getElementById('contactForm');
  console.log(controlForm);

  // écoute de l'envoie du formulaire 
  controlForm.addEventListener('submit', securityform);
  // cration fonction 
  function securityform (event) {
      event.preventDefault();
      //  récupération du contenu des champs du formulaire
      //  on cible dans des variable  les value de tous le chemps du form

      let nom = event.target.nom.value;
      let objet = event.target.objet.value;
      let email = event.target.email.value;
      let telephone = event.target.telephone.value;
      let message = event.target.message.value;
     

      
      console.log(nom,objet,email,telephone,message);

      let regex = /([a-z0-9](\.?|\_|\-))*@([a-z0-9]{2,})(\.[a-z]{2,}){1,}/;
      // avant le @ on a le droit de mettre de a à z de 0 à 9 un . et _ et - 
      //après @ il faut au minimun 2 caractères puis un . et de à a z et au minimum 2 caractères

  // let regex = new RegExp("([a-z0-9](\.?|\_|\-))*@([a-z0-9]{2,})(\.[a-z]{2,}){1,}");

  console.log(regex);

  //prenom et nom ne sont pas vides
  // classList représente toute les classes de l'élément event.target
  // add ajoute une class à l'élément event.target
  // console.log(event.target.prenom.classList);
  // remove supprime la class

  if (nom !== '' || objet !== '') {
      if (nom.length < 2 ) {
          event.target.nom.classList.add("error");
          event.target.nom.classList.remove("valide");
      } else {
          event.target.nom.classList.add("valide");
          event.target.nom.classList.remove("error");
      }

      if (objet.length < 6 ) {
          event.target.objet.classList.add("error");
          event.target.objet.classList.remove("valide");
      } else {
          event.target.objet.classList.add("valide");
          event.target.objet.classList.remove("error");
      }
  } // fin condition sur le nom et l'objet

  //condition téléphone

  if (telephone.length !== 10) {
    if (nom.length < 2 ) {
      event.target.telephone.classList.add("error");
      event.target.telephone.classList.remove("valide");
    } else {
      event.target.telephone.classList.add("valide");
      event.target.telephone.classList.remove("error");
    }
  }

  // Condition message textaréa
  if (message !== '') {
    if (message.length < 15 ) {
        event.target.message.classList.add("error");
        event.target.message.classList.remove("valide");
    } else {
        event.target.message.classList.add("valide");
        event.target.message.classList.remove("error");
    }
 } // fin condition sur les messages et textaréa


  // utilisation de l'expression régulière
  // vérification si les caractère de l'email sont autorisé par l'expression régulière

  console.info(regex.test(email));

  if (regex.test(email) === false) {
      event.target.email.classList.add("error");
      event.target.email.classList.remove("valide");

  } else {
      event.target.email.classList.remove("error");
      event.target.email.classList.add("valide");
  }

}

// // bouton effacer

// document.getElementById('resetForm').addEventListener('click', function(event){
//   event.target.form.prenom.value = '';
//   event.target.form.nom.value = '';
//   event.target.form.email.value = '';
//   event.target.form.mdp2.value = '';
//   event.target.form.confmdp2.value = '';
// });




  