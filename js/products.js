(function($){
  $(document).ready(function(){
    var url = window.location.pathname.split('/'),
        pid = url[ url.length -1 ],
        handleSuccess = function (data) {
          if (data.status == "success"){
            $('<p class="alert-message success">Thanks for voting!</p>')
              .prependTo('#main')
              .delay(2000)
              .fadeOut(2000,function(){$(this).remove();});
          } else if (data.status=="error" && data.message == "already voted") {
            $('<p class="alert-message warning">You\'ve alreaday voted on this item</p>')
              .prependTo('#main')
              .delay(2000)
              .fadeOut(2000,function(){$(this).remove();});
          } else if (data.status=="error" && data.message == "not logged in") {
            $('<p class="alert-message warning">You must log in to vote</p>')
              .prependTo('#main')
              .delay(2000)
              .fadeOut(2000,function(){$(this).remove();});
          }
        };

    $('#vote-up-button').one('click',function(){
      $.ajax({
        type:'get',
        url:'/products/voteup/'+pid,
        dataType:'json',
        success: handleSuccess,
        error: function(data){alert('whoops, something broke!'); }
      });
    });

    $('#vote-down-button').one('click',function(){
      $.ajax({
        type:'get',
        url:'/products/votedown/'+pid,
        dataType:'json',
        success: handleSuccess,
        error: function(){ alert('whoops, something broke!'); }
      });
    });

    $('.delete-comment').click( function(e){
      e.preventDefault();
      $this = $(this);
      $.ajax({
        type:'get',
        url:$this.attr('href')+'&ajax=true',
        dataType:'json',
        success: function(data){
          if (data.status == "success"){
            $this.parent().remove();
          }
        },
        error: function(){ alert('whoops, something broke!'); }
      });
    });

    $('.alt-images img').click(function(){
      $('#product-image').attr( 'src', $(this).attr('src') )
    });
  });
})(jQuery)