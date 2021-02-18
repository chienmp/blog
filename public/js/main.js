// const { default: Swal } = require("sweetalert2");

function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
        return false;
}

$(document).on("click", "#save", function(){
    let url =document.querySelector('#save').dataset.url;
    // $('.ion-ios-heart').removeClass("ion-ios-heart").addClass("ion-ios-heart-outline");
    $(document).on("click", ".ion-ios-heart", function(){
        $('.ion-ios-heart').removeClass("ion-ios-heart").addClass("ion-ios-heart-outline");
    });

    $(document).on("click", ".ion-ios-heart-outline", function(){
        console.log(2);
        $('.ion-ios-heart-outline').removeClass("ion-ios-heart-outline").addClass("ion-ios-heart");
    });
    $.ajax({
            url: url,
            type: "GET",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),  
            },
            success:function(response)
            {
                // Swal.fire({
                //     icon : 'success',
                //     title : 'Bravo',
                //     text : 'You have saved to your favorite list',
                //     showConfirmButton: true
                // });
            },
        });
});

// $(document).on("click", "#form-submit", function() {
//     let comment = $('#comment').val();
//     let message = $('#message').val();
//     let url = document.querySelector('#ajaxform').dataset.url;
//         console.log(comment, message, url);
//     $.ajax({
//       url: url,
//       type:"POST",
//       data:{
//         "_token": $('meta[name="csrf-token"]').attr('content'), 
//         comment:comment,
//       },
//       success:function(response){
//         Swal.fire({
//             position: 'top-end',
//             icon: 'success',
//             title: 'Comment success',
//             showConfirmButton: false,
//             timer: 1500
//           })
//       },
//       error: function(message) {
//           console.log(message);
//       }
//      }); 
//     });

      $(document).on("click", "#form-submit", function() {
        let comment = $('#comment').val();
        let message = $('#message').val();
        let url = document.querySelector('#ajaxform').dataset.url;
        let urlImage = window.location.hostname;
        $.ajax({
          url: url,
          type:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          data:{
            "_token": "",
            comment:comment,
          },
          success:function(response){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Comment success',
                showConfirmButton: false,
                timer: 1500,
                toast: true,
            });
            document.querySelector('.total-comments').innerHTML = "";
            document.querySelector('.total-comments').innerHTML = `${response.total} Comments`;
          },
         }); 
        });

       var route = "{{ route('search') }}";
       $('#search').typeahead({
           source: function (query, process) {
               return $.get(route, {query : query}, function (data) {
                   return process(data);
               });
           }
       });