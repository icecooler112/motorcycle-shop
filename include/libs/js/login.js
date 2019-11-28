$('.account_info').on("click",function(){
    var key = $(this).data("key");
    var username = $(this).data("username");
    if($('.card-user-choose').hasClass("d-none")){
      $('.card-user-choose').removeClass("d-none");
    }
    $('.card-user-choose').addClass("d-block");
    $('.card-user-choose p').html(username);
    $('.card-user-cookie').addClass("d-none");
    if($('.card-user-cookie').hasClass("d-inline-block")){
        $('.card-user-cookie').removeClass("d-inline-block");
    }

    $('div.username').addClass("d-none");
    if($('div.username').hasClass("d-block")){
        $('div.username').removeClass("d-block");
    }
    

    $('#username').val(username);

    $('button.close').attr("data-key",key);
  });
  $('.notme').on("click",function(){
    $('.card-user-choose').addClass("d-none");
    $('.card-user-choose').removeClass("d-block");
    if($('div.username').hasClass("d-none")){
        $('div.username').removeClass("d-none");
      }
      $('div.username').addClass("d-block");
      $('.card-user-cookie').addClass("d-inline-block");
      if($('.card-user-cookie').hasClass("d-none")){
        $('.card-user-cookie').removeClass("d-none");
      }
      $("form")[0].reset();
  })
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var key = button.data('key'); 
    $('.btn-delete').on("click",function(){
      $.ajax({
        url: "ajax_function.php?obj=delete_account_cookie",
        method: "POST",
        data: {key: key},
      }).done(function(result){
        if(result == "success"){
          $('#deleteModal').modal('hide');
          $('.card-user-'+key).addClass("d-none");
          $('.card-user-'+key).remove();
          $('.card-user-choose').addClass("d-none");
          if($('.card-user-choose').hasClass("d-block")){
            $('.card-user-choose').removeClass("d-block");
          }

          if($('div.username').hasClass("d-none")){
            $('div.username').removeClass("d-none");
          }
          if($('.card-user-cookie').hasClass("d-none")){
            $('.card-user-cookie').removeClass("d-none");
          }
          $('div.username').addClass("d-block");
          $('.card-user-cookie').addClass("d-inline-block");
          $("form")[0].reset();
        }
      });
    })
    var modal = $(this);
    // modal.find('.account_id').text('account ' + key);
    // modal.find('.modal-body input').val(recipient)
  });
  function check_username(){
    var username = $('#username').val();
    if(username == "" || username.length <= 0){
      $('#username').addClass('is-invalid');
      $('#error-username').text('Username is a required field');
    }else{
      if($('#username').hasClass('is-invalid')){
        $('#username').removeClass('is-invalid');
        $('#error-username').text('');
      }
    }
  }

  function check_password(){
    var password = $('#password').val();
    if(password == "" || password.length <= 0){
      $('#password').addClass('is-invalid');
      $('#error-password').text('password is a required field');
    }else if(password.length < 6){
      $('#password').addClass('is-invalid');
      $('#error-password').text('Enter password at least 6 Characters!');
    }else{
      if($('#password').hasClass('is-invalid')){
        $('#password').removeClass('is-invalid');
        $('#error-password').text('');
      }
    }
  }

  $('#username').on("keyup blur keypress", function(){
    check_username();
  });

  $('#password').on("keyup blur keypress", function(){
    check_password();
  });

    $('form').on("submit", function(e){
      e.preventDefault();
      var username = $('#username').val();
      var frmdata = $("form").serialize();
      var password = $('#password').val();
      check_username();
      check_password();

      if((username != '' && username.length > 0) && (password != '' && password.length >= 6)){
      /*start ajax*/
      $.ajax({
          url: 'ajax_function.php?obj=check_login',
          type: "POST",
          data: frmdata,
          beforeSend: function() {
            $('.btn-login').css("display","none");
            $('.btn-loading').removeClass("d-none");
          }
      }).done(function(result, textStatus, xhr){
              if(result == "success"){
                  window.location.href = "index.php";
              }else{
                  $('.alert-incorrect').removeClass('d-none').text('Username or password is incorrect.');
                  $('#username').addClass('is-invalid');
                  $('#password').addClass('is-invalid');
                  $("form")[0].reset();

                  $('.btn-login').css("display","block");
                  $('.btn-loading').addClass("d-none");
              }
          });
      /*end ajax*/
      }else{
        
      }
    })