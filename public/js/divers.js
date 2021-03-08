$(document).ready(function() {
    let current;
    var audio = $('#audio')[0]

    allsongs = $('a.song');

    $("#pjax-container").on('click', "a.song", function(e) {
         e.preventDefault();
         audio.src =  $(this).attr('data-file')
         audio.play();
         current = $(this).attr("data-nb")
    })

    audio.addEventListener('ended',function(){

        current++
        if(current == allsongs.length)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        audio.play()
    });

    document.getElementById("previous").addEventListener("click", function() {
        current--
        if(current == allsongs.length)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        audio.play()
      }); 

      document.getElementById("next").addEventListener("click", function() {
        current++
        if(current == allsongs.length)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        audio.play()
      }); 

      var checkbox = document.querySelector("input[name=checkbox]");

      checkbox.addEventListener('change', function() {
        if (this.checked) {
            current = Math.floor(Math.random() * 10)
        } else {
            current = current;
        }
      });

      $('#search').submit(function (e) {
        e.preventDefault();
        if ($.support.pjax)
            $.pjax({url: "/search/" + e.target.elements[0].value, container: '#pjax-container'});
        else
            window.location.href = "/search/" + e.target.elements[0].value;
    });
    
    
      $(document).on('submit', 'form[data-pjax]', function(event) {
        $.pjax.submit(event, '#pjax-container')
      })

    $(document).pjax('a:not(.song)', '#pjax-container')
      
});
