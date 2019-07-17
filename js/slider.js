(function() {
      var cdSlider = document.querySelector('.cd-slider'),
          item = cdSlider.querySelectorAll("li"),
          nav = cdSlider.querySelector("nav");
      item[0].className = "current_slide";
      var ua = window.navigator.userAgent;
          var msie = ua.indexOf("MSIE");
          if ( msie > 0 ) {
              var version = parseInt(ua.substring(msie+ 5, ua.indexOf(".", msie)));
              if (version === 9) { cdSlider.className = "cd-slider ie9";}
      }
      if (item.length <= 1) {
          nav.style.display = "none";
      }
      function prevSlide() {
          var currentSlide = cdSlider.querySelector("li.current_slide"),
              prevElement = currentSlide.previousElementSibling,
              prevSlide = ( prevElement !== null) ? prevElement : item[item.length-1],
              el = document.createElement('span');
          currentSlide.className = "";
          prevSlide.className = "current_slide";
          nav.children[0].appendChild(el);
          var size = ( cdSlider.clientWidth >= cdSlider.clientHeight ) ? cdSlider.clientWidth*2 : cdSlider.clientHeight*2,
              ripple = nav.children[0].querySelector("span");
          ripple.style.height = size + 'px';
          ripple.style.width = size + 'px';
          ripple.addEventListener("webkitTransitionEnd", function() {
              if (this.parentNode) {
                  this.parentNode.removeChild(this);
              }
          });
          ripple.addEventListener("transitionend", function() {
              if (this.parentNode) {
                  this.parentNode.removeChild(this);
              }
          });
      }
      function nextSlide() {
          var currentSlide = cdSlider.querySelector("li.current_slide"),
              nextElement = currentSlide.nextElementSibling,
              nextSlide = ( nextElement !== null ) ? nextElement : item[0],
              el = document.createElement('span');
          currentSlide.className = "";
          nextSlide.className = "current_slide";
          nav.children[1].appendChild(el);
          var size = ( cdSlider.clientWidth >= cdSlider.clientHeight ) ? cdSlider.clientWidth*2 : cdSlider.clientHeight*2,
                ripple = nav.children[1].querySelector("span");
          ripple.style.height = size + 'px';
          ripple.style.width = size + 'px';
          ripple.addEventListener("webkitTransitionEnd", function() {
              if (this.parentNode) {
                  this.parentNode.removeChild(this);
              }
          });
          ripple.addEventListener("transitionend", function() {
              if (this.parentNode) {
                  this.parentNode.removeChild(this);
              }
          });
      }
      nav.querySelector(".next").addEventListener('click', function(event) {
          event.preventDefault();
          nextSlide();
      });
      nav.querySelector(".prev").addEventListener("click", function(event) {
          event.preventDefault();
          prevSlide();
      });
  })();


  // slideralt MAIN
  $('.slider').each(function() {
    var $this = $(this);
    var $group = $this.find('.slide_group');
    var $slides = $this.find('.slide');
    var bulletArray = [];
    var currentIndex = $slides.length-1;
    var timeout;
    
    function move(newIndex) {
      var animateLeft, slideLeft;
  
      if ($group.is(':animated') || currentIndex === newIndex) {
        return;
      }
      
      bulletArray[currentIndex].removeClass('active');
      bulletArray[newIndex].addClass('active');
      
      if (newIndex > currentIndex) {
        slideLeft = '100%';
        animateLeft = '-100%';
      } else {
        slideLeft = '-100%';
        animateLeft = '100%';
      }
      
      $slides.eq(newIndex).css({
        display: 'block',
        left: slideLeft
      });
      $group.animate({
        left: animateLeft
      }, function() {
        $slides.eq(currentIndex).css({
          display: 'none'
        });
        currentIndex = newIndex;
      });
    }       

    // otomatik geçmeyi kapatmak için alt yorum satırına (sınıra) kadar silin
    function a(){
      setInterval(() => {
        if (currentIndex < ($slides.length - 1)) {
          move(currentIndex + 1);
        } else {
          move(0);
        }
      }, 5000);
    }a();
    // sınır


    $('.next_btn').on('click', function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    });
    
    $('.previous_btn').on('click', function() {
      if (currentIndex !== 0) {
        move(currentIndex - 1);
      } else {
        move($slides.length-1);
      }
    });
    
    $.each($slides, function(index) {
      var $button = $('<a class="slide_btn">&bull;</a>');
      
      if (index === currentIndex) {
        $button.addClass('active');
      }
      $button.on('click', function() {
        move(index);
      }).appendTo('.slide_buttons');
      bulletArray.push($button);
    });

  });