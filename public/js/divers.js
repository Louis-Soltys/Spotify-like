$(document).ready(function() {
    let current;
    var audio = $('#audio')[0]

    allsongs = $('a.song');

    $("a.song").click(function(e) {
         e.preventDefault();
         audio.src =  $(this).attr('data-file')
         audio.play();
         current = $(this).attr("data-nb")
    })

    $("#search").submit(function(e) {
        e.preventDefault();
        let s = e.target.elements[0].value;
        window.location.href = '/search/'+ s;
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

      $('a').on("click",function(e){ 
        e.preventDefault(); // cancel click
        var page = $(this).attr('href');   
        $('#container').load(page);
      });
      
});

history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};