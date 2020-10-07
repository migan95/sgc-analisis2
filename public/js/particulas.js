// No cargar en dispositivos moviles, hacer un condicional con el width
$(document).ready(function(){
    var ancho = $(window).width();
  
    if(ancho > 600){
  
      particlesJS('particles-js', {
        particles: {
          color: '#fff',
          shape: 'circle', // "circle", "edge" or "triangle"
          opacity: 0.8,
          size: 3,
          size_random: true,
          nb: 90,
          line_linked: {
            enable_auto: true,
            distance: 100,
            color: '#fff',
            opacity: 0.8,
            width: 1,
            condensed_mode: {
              enable: false,
              rotateX: 600,
              rotateY: 600
            }
          },
          anim: {
            enable: true,
            speed: 4
          }
        },
        interactivity: {
          enable: false,
          mouse: {
            distance: 300
          },
          detect_on: 'canvas', // "canvas" or "window"
          mode: 'grab',
          line_linked: {
            opacity: .5
          },
          events: {
            onclick: {
              enable: true,
              mode: 'push', // "push" or "remove"
              nb: 4
            }
          }
        },
        /* Retina Display Support */
        retina_detect: true
      });
    }
    
  });