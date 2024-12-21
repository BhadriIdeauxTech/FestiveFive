// growing SVGAnimatedNumber
// Function to start the animation when element is in viewport
function startAnimation(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
        }
    });
}

// Intersection Observer to detect when element is in viewport
const observer = new IntersectionObserver(startAnimation);
const elements = document.querySelectorAll('.grow');
elements.forEach(element => observer.observe(element));

// Function to animate the counter
function animateCounter(el) {
    var $el = $(el);
    var max = numeral($el.find('.count').text().replace(/\s/g, '')).value();
    
    var start = 0;
    var refresh = 10; 
    var totalSteps = 100;
    var step = max/totalSteps;
    function calculate(){
        start += step;
        $el.find('.count').text(numeral(Math.round(start)).format('0,0'));
        if(start < max){
            setTimeout(function() {
                calculate();
            }, refresh);
        }
    }
    calculate();
}


// faq
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
  const question = item.querySelector('.faq-question');
  const answer = item.nextElementSibling;
  const icon = item.querySelector('i');

  item.addEventListener('click', () => {
    faqItems.forEach(otherItem => {
      if (otherItem !== item) {
        const otherAnswer = otherItem.nextElementSibling;
        const otherIcon = otherItem.querySelector('i');

        otherAnswer.classList.remove('active');
        otherIcon.classList.remove('active');
        otherAnswer.style.maxHeight = "0";
      }
    });

    answer.classList.toggle('active');
    icon.classList.toggle('active');
    if (answer.classList.contains('active')) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = "0";
    }
  });
});