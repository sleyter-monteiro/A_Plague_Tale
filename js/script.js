// MODAL

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})





// CONTRÔLE DU FORMULAIRE REGEX

// alert('coucou');
        // Controle du formulaire avec une fonction 
        // On verifie la longueur des contenus dans les 2 input

        function controleForm() {//event paramètre a enlever également
          //event.preventDefault(); // pour empecher l'envoi du formulaire, à enlever quand le site est terminé

         if (document.form1.pseudo.value.length < 5 || document.form1.pseudo.value.length > 15 ) {
             console.log(document.form1.pseudo.value);    
             console.log(document.form1.pseudo.value.length);
             alert('Votre pseudo dois contenir entre 5 et 15 caractère');
         }

         // mot de passe 
         if (document.form1.mdp.value.length < 8 || document.form1.mdp.value.length > 15 ) {
             console.log(document.form1.mdp.value);
             console.log(document.form1.mdp.value.length);
             alert('Votre Mot de passe dois contenir entre 8 et 15 caractère');
         }
     }

     // controle du formulaire d'inscription avec une fonction

     let formInscrip = document.getElementById('formulaireInscription');
  console.log(formInscrip);

  // écoute de l'envoie du formulaire 
  formInscrip.addEventListener('submit', inscriptionform);
  // cration fonction 
  function inscriptionform (event){
      event.preventDefault();
      //  récupération du contenu des champs du formulaire
      //  on cible dans des variable  les value de tous le chemps du form

      let prenom = event.target.prenom.value;
      let nom = event.target.nom.value;
      let email = event.target.email.value;
      let mdp2 = event.target.mdp2.value;
      let confmdp2 = event.target.confmdp2.value;
     

      
      console.log(prenom,nom,email,mdp2,confmdp2);

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

  if (prenom !== '' || nom !== '') {
      if (prenom.length < 2 ) {
          event.target.prenom.classList.add("error");
          event.target.prenom.classList.remove("valide");
      } else {
          event.target.prenom.classList.add("valide");
          event.target.prenom.classList.remove("error");
      }

      if (nom.length < 4 ) {
          event.target.nom.classList.add("error");
          event.target.nom.classList.remove("valide");
      } else {
          event.target.nom.classList.add("valide");
          event.target.nom.classList.remove("error");
      }
  } // fin condition sur le nom

  //condition 2 l'utilisateur a-t-il saisi le même mot de passe

  if ( confmdp2 !== mdp2 ) {
      event.target.mdp2.classList.add("error");
      event.target.mdp2.classList.remove("valide");
      event.target.confmdp2.classList.add("error");
      event.target.confmdp2.classList.remove("valide");

  } else if ( mdp2.length < 8 || confmdp2.length > 12 ) {
      event.target.mdp2.classList.add("error");
      event.target.mdp2.classList.remove("valide");
      event.target.confmdp2.classList.add("error");
      event.target.confmdp2.classList.remove("valide");

  } else { // et finalement si ils respectent les deux conditions
      event.target.mdp2.classList.add("valide");
      event.target.mdp2.classList.remove("error");
      event.target.confmdp2.classList.add("valide");
      event.target.confmdp2.classList.remove("error");
  }

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

function show() {
  var p = document.getElementById('mdp2');
  p.setAttribute('type', 'text');
}

function hide() {
  var p = document.getElementById('mdp2');
  p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
  if (pwShown == 0) {
      pwShown = 1;
      show();
  } else {
      pwShown = 0;
      hide();
  }
}, false);

// bouton effacer

document.getElementById('resetForm').addEventListener('click', function(event){
  event.target.form.prenom.value = '';
  event.target.form.nom.value = '';
  event.target.form.email.value = '';
  event.target.form.mdp2.value = '';
  event.target.form.confmdp2.value = '';
});




  