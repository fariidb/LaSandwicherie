// $(function (){

//     $('#contact-form').submit(function (e)
//     {
//         e.preventDefault();
//         $('.comments').empty();
//         var postdata = $('#contact-form').serialize();

//         $.ajax
//         ({
//             type: 'POST',
//             url: 'php/contact.php',
//             data: postdata,
//             dataType: 'json',
//             success: function (result)
//             {
//                 if (result.isSuccess)
//                 {
//                     $("#contact-form").append("<p class='thank-you'>Votre message a bien été envoyé. Merci de nous avoir contacté</p>");
//                     $("#contact-form")[0].reset();
//                 }
//                 else
//                 {
//                     $("#firstname + .comments").html(result.firstnameError);
//                     $("#name + .comments").html(result.nameError);
//                     $("#email + .comments").html(result.emailError);
//                     $("#phone + .comments").html(result.phoneError);
//                     $("#message + .comments").html(result.messageError);
//                 }
//             }
//         })
//     })

// }) 



// function total_commande(){

//     var total = 0;
//     var qt = 0;

//     var prix = document.querySelectorAll('.px');
//     var quantite = document.querySelectorAll('.qt');

//     for (var i = 0; i< prix.length; i++){

//         total += parseFloat(prix[i].value) * parseFloat(quantite[i].value);

//         qt += parseFloat(quantite[i].value);

//     }

//     var ttc = document.querySelector('.ttc');
//     ttc.value = total.toFixed(2);
//     ;
// }

// total_commande();

// function supprimer(elem){

//     var panierForm = document.querySelector('.panier-form');
//     var parent = $(elem).parentsUntil("tr");
//     var pr = $(elem).parent();
//     $(pr).parent().remove();
//     total_commande();


// }