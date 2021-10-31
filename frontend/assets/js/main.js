//Toggle delivery
const deliverys = document.querySelectorAll('.header-delivery_item')
const searchs = document.querySelectorAll('.header-search')

deliverys.forEach((delivery,index) => {
    const search = searchs[index]
    
    delivery.onclick = () => {
        document.querySelector('.header-delivery_item.active').classList.remove('active')
        document.querySelector('.header-search.block').classList.remove('block')

        delivery.classList.add('active')
        search.classList.add('block')
    }
})


//Slider
const slider=document.querySelector('.slider')
const sliderMain = document.querySelector('.slider-main')
const sliderItems = document.querySelectorAll('.slider-item')
const nextBtn = document.querySelector('.slider-next')
const prevBtn = document.querySelector('.slider-prev')
const sliderItemWidth = sliderItems[0].offsetWidth
const numberOfSliderItems = sliderItems.length 

var slideNumber = 0


//Next Slider
nextBtn.addEventListener('click',() => {
    
    // sliderItems.forEach((slide,index) => {
    //     slide.classList.remove('active')
    // })
    slideNumber++;
    
    if(slideNumber > (numberOfSliderItems-1) ){
        slideNumber=0;
    }

    // sliderItems[slideNumber].classList.add('active')

    sliderMain.style.left = "-"+sliderItemWidth*slideNumber+"px"
})

//Prev Slider
prevBtn.addEventListener('click',() => {
    // sliderItems.forEach((slide,index) => {
    //     slide.classList.remove('active')
    // })
    slideNumber--;
    
    if(slideNumber < 0){
        slideNumber = numberOfSliderItems-1;
    }

    // sliderItems[slideNumber].classList.add('active')

    sliderMain.style.left = "-"+sliderItemWidth*slideNumber+"px"
})

//Auto Play

var playSlider;
var auto = () => {
    playSlider = setInterval(() =>{
        slideNumber++;
        
        if(slideNumber > (numberOfSliderItems-1) ){
            slideNumber=0;
        }
    
        sliderMain.style.left = "-"+sliderItemWidth*slideNumber+"px"
    }, 5000)
}
auto()


