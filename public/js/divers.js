$(document).ready(function() {
    let current;
    var audio = $('#audio')[0]

    allsongs = $('a.song');

    $("#pjax-container").on('click', "a.song", function(e) {
         e.preventDefault();
         document.getElementById('play').src = '/css/img/pause.png';
         audio.src =  $(this).attr('data-file')
         audio.play();
         current = $(this).attr("data-nb")
         document.getElementById('title').innerHTML = $(this).attr('data-title')
         document.getElementById('artist').innerHTML = $(this).attr('data-artist')
         document.getElementById('like-btn').href = "/changeSongLike/"+$(this).attr('data-like')
    })

    let music = document.getElementById('audio')
    let totalDuration = document.getElementById('duration')
    let currentTime = document.getElementById('currentTime')

    music.addEventListener("durationchange", function(){
      var s = parseInt(music.duration % 60);
      var m = parseInt((music.duration / 60) % 60);
      totalDuration.innerHTML = m + ':' + s ;

    });

    var myAudio = document.getElementById('audio');

    myAudio.addEventListener('progress', function() {
      var duration =  myAudio.duration;
      if (duration > 0) {
        for (var i = 0; i < myAudio.buffered.length; i++) {
              if (myAudio.buffered.start(myAudio.buffered.length - 1 - i) < myAudio.currentTime) {
                  document.getElementById("buffered-amount").style.width = (myAudio.buffered.end(myAudio.buffered.length - 1 - i) / duration) * 100 + "%";
                  break;
              }
          }
      }
    });

    myAudio.addEventListener('timeupdate', function() {
      var duration =  myAudio.duration;
      var s = parseInt(music.currentTime % 60);
        var m = parseInt((music.currentTime / 60) % 60);
        if(s < 10){
          currentTime.innerHTML = m + ':0' + s ;
        }else{
          currentTime.innerHTML = m + ':' + s ;
        }
      if (duration > 0) {
        document.getElementById('progress-amount').style.width = ((myAudio.currentTime / duration)*100) + "%";
      }
    });
    
    let play = true;
    document.getElementById("play-btn").addEventListener("click", function() {
      if(play == true){
        document.getElementById('play').src ='/css/img/play-lecteur.svg';
        audio.pause()
        play = false;
      }else{
        document.getElementById('play').src = '/css/img/pause.png';
        audio.play()
        play = true;
      }
    }); 

    $(audio).on("canplay",function(){
      document.onkeyup = function(e){
        if(e.keyCode == 32){
            console.log('hey');
            if(play == true){
              document.getElementById('play').src ='/css/img/play-lecteur.svg';
              audio.pause()
              play = false;
            }else{
              document.getElementById('play').src = '/css/img/pause.png';
              audio.play()
              play = true;
            }
          }
        }
      });

    $('.progress').on('click', function(e) {
      // e = Mouse click event.
      var rect = e.target.getBoundingClientRect();
      var x = e.clientX - rect.left; //x position within the element.
      var y = e.clientY - rect.top;  //y position within the element.
      console.log("Left? : " + x + " ; Top? : " + y + ".");
      var duration = audio.duration;
      var ratio = x / $('.progress').width(); 
      var newCurrentTime = ratio * duration
      audio.currentTime = newCurrentTime;
    })


    audio.addEventListener('ended',function(){
        current++
        if(current == allsongs.length)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        title = $("a.song[data-nb='"+current+"']").attr('data-title');
        document.getElementById('title').innerHTML = title
        like = $("a.song[data-nb='"+current+"']").attr('data-like');
        document.getElementById('like-btn').href = "/changeSongLike/"+$(this).attr('data-like')
        audio.play()
    });

    document.getElementById("previous").addEventListener("click", function() {
        play = true;
        current--
        if(current == allsongs.length || current < 0)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        document.getElementById('play').src = '/css/img/pause.png';
        title = $("a.song[data-nb='"+current+"']").attr('data-title');
        document.getElementById('title').innerHTML = title
        artist = $("a.song[data-nb='"+current+"']").attr('data-artist');
        document.getElementById('artist').innerHTML = artist
        like = $("a.song[data-nb='"+current+"']").attr('data-like');
        document.getElementById('like-btn').href = "/changeSongLike/"+like
        audio.play()
      }); 

      document.getElementById("next").addEventListener("click", function() {
        play = true;
        current++
        if(current == allsongs.length)
            current = 0
        audio.src = $("a.song[data-nb='"+current+"']").attr("data-file")
        document.getElementById('play').src = '/css/img/pause.png';
        title = $("a.song[data-nb='"+current+"']").attr('data-title');
        document.getElementById('title').innerHTML = title
        artist = $("a.song[data-nb='"+current+"']").attr('data-artist');
        document.getElementById('artist').innerHTML = artist
        like = $("a.song[data-nb='"+current+"']").attr('data-like');
        document.getElementById('like-btn').href = "/changeSongLike/"+like
        audio.play()
      }); 

      var checkbox = document.querySelector("input[name=checkbox]");

      checkbox.addEventListener('change', function() {
        if (this.checked) {
            current = Math.floor(Math.random() * allsongs.length)
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
    function changevolume(amount) {
      var audioobject = document.getElementsByTagName("audio")[0];
      audioobject.volume = amount;
    }

const checkboxDarkMode = document.querySelector('.switch__checkbox');

checkboxDarkMode.addEventListener('change', function() {
  if(this.checked) {
    document.body.dataset.theme = 'dark'
  } else {
    document.body.dataset.theme = 'light'
  }
})