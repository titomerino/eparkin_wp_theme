import Flickity from 'flickity'
import 'flickity-imagesloaded'
import 'flickity-fade'

// Flickity - equal cell height hack
// https://codepen.io/desandro/pen/ZXEGVq
Flickity.prototype._createResizeClass = function () {
  this.element.classList.add('flickity-resize')
}

Flickity.createMethods.push('_createResizeClass')

var resize = Flickity.prototype.resize
Flickity.prototype.resize = function () {
  this.element.classList.remove('flickity-resize')
  resize.call(this)
  this.element.classList.add('flickity-resize')
}

// Fire the resize event when all DOM content loads
// Required because some fonts can take a while to load and cause content shift
window.addEventListener('load', () => {
  const sliders = Array.from(document.querySelectorAll('[data-slider]'))
  sliders.forEach(slider => {
    var flkty = Flickity.data(slider)
    flkty.resize()
  })
  const slidersHtmlConfig = Array.from(
    document.querySelectorAll('[data-flickity]')
  )
  slidersHtmlConfig.forEach(slider => {
    var flkty = Flickity.data(slider)
    flkty.resize()
  })

  // Flickity custom controls
  const sliderControls = document.querySelectorAll('[data-slider-controls]')

  sliderControls.forEach(control => {
    var slider = document.querySelector(control.dataset.sliderControls)
    const buttonPrevious = control.querySelector('[data-slider-previous]')
    const buttonNext = control.querySelector('[data-slider-next]')
    const dots = control.querySelector('[data-slider-dots]')
    const counterDots = dots.querySelectorAll('button').length
    var sliderInstance = Flickity.data(slider)

    if (buttonPrevious) {
      buttonPrevious.classList.add('-disable')
      buttonPrevious.addEventListener('click', function () {
        sliderInstance.previous()
      })
    }

    if (buttonNext) {
      buttonNext.addEventListener('click', function () {
        sliderInstance.next()
      })
    }

    if (dots) {
      dots.querySelectorAll('button').forEach(dot => {
        dot.addEventListener('click', () => {
          sliderInstance.select(dot.dataset.index)
        })
      })
    }

    sliderInstance.on('select', function (index) {
      var activeDot = dots.querySelector('[data-index="' + index + '"]')
      dots.querySelectorAll('button').forEach(button => {
        button.classList.remove('-active')
      })
      if (index === 0) {
        buttonPrevious.classList.add('-disable')
      } else {
        buttonPrevious.classList.remove('-disable')
      }
      if (counterDots - 1 === index) {
        buttonNext.classList.add('-disable')
      } else {
        buttonNext.classList.remove('-disable')
      }
      activeDot.classList.add('-active')
    })
  })
})

export default Flickity
